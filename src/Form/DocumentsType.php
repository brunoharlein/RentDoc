<?php

namespace App\Form;
use App\Entity\Borrower;
use App\Entity\Category;
use App\Entity\Documents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DocumentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('releaseDate')
            ->add('resume')
            ->add('Category', EntityType::class,[
                'class'=>Category::class,
                'choice_label'=>'name',])
            ->add('Borrower', EntityType::class,[
                'class'=>Borrower::class,
                'choice_label'=>'name',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Documents::class,
        ]);
    }
}
