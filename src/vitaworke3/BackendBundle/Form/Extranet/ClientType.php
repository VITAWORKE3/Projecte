<?php

namespace vitaworke3\BackendBundle\Form\Extranet;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Nick')
            ->add('TipusClient')
            ->add('Associat', 'collection',
            array('label' => 'Associat',
                'data_class' => 'vitaworke3\ClientBundle\Entity\Client',
                 
                )
              )

            ->add('Mail')
            ->add('DataAccesAutoritzat')
            ->add('Baixa')
          ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'vitaworke3\ClientBundle\Entity\Client'
        ));
    }

    public function getName()
    {
        return 'vitaworke3_clienttbundle_clienttype';
    }
}
