<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 17/6/17
 * Time: 11:06 AM
 */

namespace AppBundle\Admin;

use AppBundle\Entity\BlogPost;
use AppBundle\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
//        $formMapper
//            ->with('Content', ['class' => 'col-md-9'])
//            ->add('title', 'text')
//            ->add('body', 'textarea')
//            ->end()
//
//            ->with('Meta data', ['class' => 'col-md-3'])
//            ->add('category', 'sonata_type_model', [
//                'class' => Category::class,
//                'property' => 'name',
//            ])
//            ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
//        $listMapper
//            ->addIdentifier('title')
//            ->add('category.name')
//            ->add('draft');
    }

    public function toString($object)
    {
//        return $object instanceof BlogPost
//            ? $object->getTitle()
//            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
//        $datagridMapper
//            ->add('title')
//            ->add('category', null, array(), 'entity', array(
//                'class'    => Category::class,
//                'choice_label' => 'name', // In Symfony2: 'property' => 'name'
//            ));
    }
}