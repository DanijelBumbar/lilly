<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\RegForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{

    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);

        $users = $repository->findAll();

//        $form = $this->createForm(RegForm::class, $users);


        // replace this example code with whatever you need
        return $this->render('regform/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'users' => $users,

        ]);
    }

}
