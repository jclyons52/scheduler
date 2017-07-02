<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Customer;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProductAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('sku')
            ->add('purchaseDate')
            ->add('faultDescription')
            ->add('customer', null, array(), 'entity', array(
                'class'    => Customer::class,
                'choice_label' => 'name',
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('sku')
            ->add('purchaseDate')
            ->add('customer.name')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('sku')
            ->add('purchaseDate', 'sonata_type_date_picker', ['format'=>'dd/MM/yyyy'])
            ->add('customer', 'sonata_type_model', array(
                'class'    => Customer::class,
                'property' => 'name',
            ))
            ->add('faultDescription')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('sku')
            ->add('purchaseDate')
            ->add('faultDescription')
        ;
    }
}
