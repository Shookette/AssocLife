<?php

namespace CoreBundle\Manager;

use Doctrine\ORM\EntityManager;
use CoreBundle\Repository\OrganizationRepository;
use CoreBundle\Entity\Organization;
use Symfony\Component\HttpFoundation\Session\Session;

class OrganizationManager
{
    /**
     * @var EntityManager 
     */
    private $em;
    
    /**
     * @var OrganizationRepository
     */
    private $repo;
    
    /**
     * @var Session
     */
    private $session;
    
    public function __construct(EntityManager $em, OrganizationRepository $repo, Session $session)
    {
        $this->em   = $em;
        $this->repo = $repo;
        $this->session = $session;
    }
  
    /**
     * Persist an organization from organization object
     * @param Organization $orga
     * @return Organization $orga
     */
    public function create(Organization $orga)
    {
        $exist = $this->repo->findOneByName($orga->getName());
        
        if ($exist) {
            $this->session
                ->getFlashBag()
                ->add('error', 'Organization already exists')
            ;
            return $exist;
        }
        
        $this->em->persist($orga);
        $this->em->flush();
        
        $this->session
            ->getFlashBag()
            ->add('success', 'Organization has been successfully created')
        ;
        
        return $orga;
    }
    
    /**
     * Find an organization by id
     * @param int $id
     * @return Organization $orga
     */
    public function findOrga($id)
    {
        $orga = $this->repo->findOneById($id);
        
        if (!$orga) {
            throw \Exception();
        }
        
        return $orga;
    }
    
    public function findAll()
    {
        return $this->repo->findAll();
    }
}