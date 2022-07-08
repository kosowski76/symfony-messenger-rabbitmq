<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;

class SendFileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Title file',
            ])
            ->add('text')
            ->add('photo', FileType::class, [
                'required' => true,
                'mapped' => false,
                'constraints' => [
                        new Image(['maxSize' => '1024k'])
                ],
            ])
            ->add('submit', SubmitType::class);
    }
}