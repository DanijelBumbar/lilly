<?php
/**
 * Created by PhpStorm.
 * User: Danijel
 * Date: 23.03.2018
 * Time: 12:37
 */

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;



class RegForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('firstname', TextType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('lastname', TextType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('address', TextType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('postal', TextType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('place', TextType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('country', CountryType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('telephone', TextType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('birthday', TextType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('email', EmailType::class, array(
                'required' => true,
                'label' => false,
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Speichern',
            ))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
//        $resolver->setDefaults(array(

//        ));
    }

}
