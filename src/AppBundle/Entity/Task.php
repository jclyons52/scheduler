<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="priority", type="string", length=255)
     */
    private $priority;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="tasks")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="tasks")
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity="Courier", inversedBy="tasks")
     */
    private $courier;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="tasks")
     */
    private $customer;

    /**
     * @ORM\OneToOne(targetEntity="Product", inversedBy="task")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Repairer", inversedBy="tasks")
     */
    private $repairer;

    /**
     * @ORM\ManyToOne(targetEntity="WarrantyProvider", inversedBy="tasks")
     */
    private $warrantyProvider;

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return Courier
     */
    public function getCourier()
    {
        return $this->courier;
    }

    /**
     * @param Courier $courier
     */
    public function setCourier($courier)
    {
        $this->courier = $courier;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return Repairer
     */
    public function getRepairer()
    {
        return $this->repairer;
    }

    /**
     * @param Repairer $repairer
     */
    public function setRepairer($repairer)
    {
        $this->repairer = $repairer;
    }

    /**
     * @return WarrantyProvider
     */
    public function getWarrantyProvider()
    {
        return $this->warrantyProvider;
    }

    /**
     * @param WarrantyProvider $warrantyProvider
     */
    public function setWarrantyProvider($warrantyProvider)
    {
        $this->warrantyProvider = $warrantyProvider;
    }

    public function getContact()
    {
        return $this->contact;
    }
    
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
        
        return $this;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
        
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Task
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Task
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Task
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}

