<?php

namespace App\Form;

use App\Entity\Conteiner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConteinerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero')
            ->add('tipo',  ChoiceType::class, [
                'choices'  => [
                    '20' => '20',
                    '40' => '40'
                    ]])
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    'CHEIO' => 'CHEIO',
                    'VAZIO' => 'VAZIO'
                    ]])
            ->add('categoria', ChoiceType::class, [
                'choices'  => [
                    'IMPORTAÇÃO' => 'IMPORTAÇÃO',
                    'EXPORTAÇÃO' => 'EXPORTAÇÃO'
                    ]])
            ->add('cliente')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Conteiner::class,
        ]);
    }
}
