<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 17/6/17
 * Time: 1:03 PM
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Category;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Courier;
use AppBundle\Entity\Customer;
use AppBundle\Entity\Product;
use AppBundle\Entity\Repairer;
use AppBundle\Entity\Task;
use AppBundle\Entity\WarrantyProvider;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TaskAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->with('Content', ['class' => 'col-md-12'])
            ->add('subject', 'text')
            ->add('startDate', 'sonata_type_datetime_picker', ['format'=>'dd/MM/yyyy'])
            ->add('endDate', 'sonata_type_datetime_picker', ['format'=>'dd/MM/yyyy'])
            ->add('description', 'textarea')
            ->add('trackingNumber')
            ->add('priority', 'choice',  [
                'choices' => Task::PRIORITIES
            ])
            ->add('status', 'choice', [
                'choices' => array_flip(Task::STATUSES)
            ])
            ->add('contact', 'sonata_type_model', [
                'class' => Contact::class,
                'property' => 'name',
            ])

            ->add('courier', 'sonata_type_model', array(
                'class'    => Courier::class,
                'property' => 'name',
            ))
            ->add('product', 'sonata_type_model', array(
                'class'    => Product::class,
                'property' => 'sku',
            ))
            ->add('repairer', 'sonata_type_model', array(
                'class'    => Repairer::class,
                'property' => 'name',
            ))
            ->add('warrantyProvider', 'sonata_type_model', array(
                'class'    => WarrantyProvider::class,
                'property' => 'name',
            ))
            ->add('category', 'sonata_type_model', [
                'class' => Category::class,
                'property' => 'name',
            ])
            ->add('customer', 'sonata_type_model', array(
                'class'    => Customer::class,
                'property' => 'name',
            ))
            ->end();
        ;
    }

    public function toString($object)
    {
        return $object instanceof Task
            ? $object->getSubject()
            : 'Task'; // shown in the breadcrumb on the create view
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('subject')
            ->add('category', null, array(), 'entity', array(
                'class'    => Category::class,
                'choice_label' => 'name',
            ))
            ->add('contact', null, array(), 'entity', array(
                'class'    => Contact::class,
                'choice_label' => 'name',
            ))
            ->add('customer', null, array(), 'entity', array(
                'class'    => Customer::class,
                'choice_label' => 'name',
            ))
            ->add('courier', null, array(), 'entity', array(
                'class'    => Courier::class,
                'choice_label' => 'name',
            ))
            ->add('product', null, array(), 'entity', array(
                'class'    => Product::class,
                'choice_label' => 'name',
            ))
            ->add('repairer', null, array(), 'entity', array(
                'class'    => Repairer::class,
                'choice_label' => 'name',
            ))
            ->add('warrantyProvider', null, array(), 'entity', array(
                'class'    => WarrantyProvider::class,
                'choice_label' => 'name',
            ))
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('subject')
            ->add('startDate')
            ->add('endDate')
            ->add('category.name')
            ->add('contact.name')
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
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('subject')
            ->add('startDate')
            ->add('endDate')
            ->add('category.name')
            ->add('contact.name')
        ;
    }

}