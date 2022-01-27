<?php

namespace App\Form;

use App\Entity\Movimentacao;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MovimentacaoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipo', ChoiceType::class, [
                'choices'  => [
                    'EMBARQUE' => 'EMBARQUE',
                    'DESCARGA' => 'DESCARGA',
                    'GATE IN' => 'GATE IN',
                    'GATE OUT' => 'GATE OUT',
                    'REPOSICIONAMENTO' => 'REPOSICIONAMENTO',
                    'PESAGEM' => 'PESAGEM',
                    'SCANNER' => 'SCANNER'
                    ]])
            ->add('inicio')
            ->add('fim')
            ->add('conteiner')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movimentacao::class,
        ]);
    }
}
