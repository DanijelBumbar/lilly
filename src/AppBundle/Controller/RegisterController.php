<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\RegForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function indexAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(RegForm::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($data);

            $entityManager->flush();

            return $this->redirectToRoute('thankyou');
        }

        // replace this example code with whatever you need
        return $this->render('regform/register.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'form' => $form->createView(),

        ]);
    }

    /**
     * @Route("/edit", name="edit")
     */
    public function editAction(Request $request)
    {
        $id = $request->get('id');

        $repository = $this->getDoctrine()->getRepository(User::class);

        $user = $repository->findOneBy(
            ['id' => $id]
        );

        $form = $this->createForm(RegForm::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($data);

            $entityManager->flush();

            return $this->redirectToRoute('thankyou', ['type' => '1' ]);
        }

        return $this->render('regform/edit.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete", name="delete")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');

        $repository = $this->getDoctrine()->getRepository(User::class);

        $user = $repository->findOneBy(
            ['id' => $id]
        );

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($user);

        $entityManager->flush();

        return $this->redirectToRoute('thankyou', ['type' => '2' ]);

    }
    /**
     * @Route("/thankyou", name="thankyou")
     */
    public function thankyouAction(Request $request, $parameters = [])
    {

        $type = $request->get('type', 0);

        switch ($type) {
            case 1:
                $message = 'User wurde erfolgreich geändert';
                break;
            case 2:
                $message = 'User wurde entfernt';
                break;
            default:
                $message = 'Vielen Dank';
        }

        return $this->render('partials/message.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'message' => $message
        ]);

    }
}
