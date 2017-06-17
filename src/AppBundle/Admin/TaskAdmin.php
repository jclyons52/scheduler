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
use AppBundle\Entity\Task;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TaskAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->with('Content', ['class' => 'col-md-9'])
            ->add('subject', 'text')
            ->add('priority', 'choice',  array(
                'choices' => array(
                    'high' => 'high',
                    'medium' => 'medium',
                    'low' => 'low',
                )
            ))
            ->add('description', 'textarea')
            ->add('startDate', 'datetime')
            ->add('endDate', 'datetime')
            ->end()
            ->with('Meta data', ['class' => 'col-md-3'])
            ->add('category', 'sonata_type_model', [
                'class' => Category::class,
                'property' => 'name',
            ])
            ->add('contact', 'sonata_type_model', [
                'class' => Contact::class,
                'property' => 'name',
            ])
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
            ));
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('subject')
            ->add('startDate')
            ->add('endDate')
            ->add('category.name')
            ->add('contact.name')
        ;
    }

}