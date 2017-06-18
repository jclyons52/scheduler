<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 18/6/17
 * Time: 11:37 AM
 */

namespace AppBundle\Block;

use AppBundle\Entity\Task;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Block\Service\AbstractBlockService;
use Symfony\Component\Routing\Route;

class CalendarBlock extends AbstractBlockService
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct($name, $templating, EntityManager $entityManager)
    {
        parent::__construct($name, $templating);
        $this->em = $entityManager;
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'url'      => false,
            'title'    => 'Insert the rss title',
            'template' => 'block_calendar.html.twig',
        ]);
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        // merge settings
        $settings = $blockContext->getSettings();
        $settings['title'] = 'Tasks Calendar';

        $repo = $this->em->getRepository(Task::class);
        $tasks = $repo->findAll();
        $tasks = array_map(function(Task $task){ return [
            'title' => $task->getSubject(),
            'start' => $task->getStartDate()->format('Y-m-d'),
            'description' => $task->getDescription(),
            'end' => $task->getendDate()->format('Y-m-d'),
            'url' => "/admin/app/task/".$task->getId()."/show"
        ];}, $tasks);

        return $this->renderResponse('block_calendar.html.twig', [
            'block'     => $blockContext->getBlock(),
            'settings'  => $settings,
            'tasks' => $tasks,
        ], $response);
    }
}