<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validation\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\OrganizationRepository")
 * @ORM\Table(name="organization")
 * @UniqueEntity("name")
 */
class Organization
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=150, unique=true)
     */
    private $name;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $creationDate;
    
    /**
     * @ORM\Column(type="text", length=1000, nullable=true)
     */
    private $description;
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="organization")
     */
    private $members;
    private $template;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;    
 
    public function __construct($name, $creationDate)
    {
        $this->name = $name;
        $this->creationDate = $creationDate;
        $this->logo = "";
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
}