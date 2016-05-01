<?php

namespace CoreBundle\Manager;

use Doctrine\ORM\EntityManager;
use CoreBundle\Repository\OrganizationRepository;
use CoreBundle\Entity\Organization;

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
    
    public function __construct(EntityManager $em, OrganizationRepository $repo)
    {
        $this->em   = $em;
        $this->repo = $repo;
    }
    
    public function test()
    {
        return "titi";
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
            $this->get('session')->getSession()
                ->getFlashBag()
                ->add('error', 'Organization already exists')
            ;
            return $exist;
        }
        
        $this->em->persist($orga);
        $this->em->flush();
        
        $this->get('session')->getSession()
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
}