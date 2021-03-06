<?php

 namespace vitaworke3\ClientBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
class CampanyaAdmin extends Admin
{
	
	protected function configureListFields(ListMapper $mapper)
	{	
		$mapper
		->add('Client')
		->add('DataInicial')
		->add('DataFinal')
		->add('Baixa')
        ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                         )
            ))
        
		;
	}
	protected function configureDatagridFilters(DatagridMapper $mapper)
	{
		$mapper
		->add('Client')
		->add('DataInicial')
		->add('DataFinal')
		->add('Baixa')
		;
        
	}
	protected function configureFormFields(FormMapper $mapper)
	{
		$mapper
		->add('Client')
		->add('DataInicial')
		->add('DataFinal')
		->add('Baixa')
        ;
	}
}