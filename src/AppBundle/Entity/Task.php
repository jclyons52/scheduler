<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task
{
    const PRIORITIES = [
        'high' => 'high',
        'medium' => 'medium',
        'low' => 'low',
    ];

    const STATUSES = [
        'inTransit' => 'In Transit',
        'withRepairer' => 'With Repairer',
        'atHarveyNorman' => 'At Harvey Norman',
        'readyToCollect' => 'Ready To Collect',
    ];

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
     * @var DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var DateTime
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
     * @var string
     *
     * @ORM\Column(name="trackingNumber", type="string", length=255)
     */
    private $trackingNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", columnDefinition="enum('inTransit','withRepairer','atHarveyNorman','readyToCollect')")
     */
    private $status;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="tasks")
     */
    private $category;

    /**
     * @var Contact
     *
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="tasks")
     */
    private $contact;

    /**
     * @var Courier
     *
     * @ORM\ManyToOne(targetEntity="Courier", inversedBy="tasks")
     */
    private $courier;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="tasks")
     */
    private $customer;

    /**
     * @var Product
     *
     * @ORM\OneToOne(targetEntity="Product")
     */
    private $product;

    /**
     * @var Repairer
     *
     * @ORM\ManyToOne(targetEntity="Repairer", inversedBy="tasks")
     */
    private $repairer;

    /**
     * @var WarrantyProvider
     *
     * @ORM\ManyToOne(targetEntity="WarrantyProvider", inversedBy="tasks")
     */
    private $warrantyProvider;

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getCourier(): ?Courier
    {
        return $this->courier;
    }

    public function setCourier(Courier $courier): self
    {
        $this->courier = $courier;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getRepairer(): ?Repairer
    {
        return $this->repairer;
    }

    public function setRepairer(Repairer $repairer): self
    {
        $this->repairer = $repairer;

        return $this;
    }

    public function getWarrantyProvider(): ?WarrantyProvider
    {
        return $this->warrantyProvider;
    }

    public function setWarrantyProvider(WarrantyProvider $warrantyProvider): self
    {
        $this->warrantyProvider = $warrantyProvider;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setStartDate(DateTime $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    public function setEndDate(DateTime $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getEndDate(): ?DateTime
    {
        return $this->endDate;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}

