<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', null, ['label'=>$options['firstname_label']])
            ->add('lastname', null, ['label'=>$options['lastname_label']])
            ->add('description', TextareaType::class, ['label'=>$options['description_label']])
            ->add('save', SubmitType::class, ['label'=>$options['save_label']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
            'firstname_label' => 'Firstnames',
            'lastname_label' => 'Lastname',
            'description_label' => 'Description',
            'save_label' => 'Save',
        ]);
    }

}
