<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Organization;
use CoreBundle\Form\OrganizationType;

class OrganizationController extends Controller
{
    /**
     * createOrganizationAction
     */
    public function createOrganizationAction(Request $request)
    {
        // If user is not logged throw exception
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            throw new \Exception();
        }
        
        $orgManager     = $this->get('core.manager.organization');
        $organization   = new Organization();
        $form           = $this->get('form.factory')->create(new OrganizationType, $organization);
        
        if ($form->handleRequest($request)->isValid()) {
            $organization = $orgManager->create($organization);

            return $this->redirect(
                $this->generateUrl(
                    'organization_show',
                    [
                        'organizationId' => $organization->getId()
                    ]
                )
            );
        } 
        // If form is not valid then show again form with data already set
        return $this->render(
            'CoreBundle:Organization:create.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
    
    /**
     * showOrganizationAction
     */
    public function showOrganizationAction($organizationId)
    {
        $orgManager     = $this->get('core.manager.organization');
        $organization   = $orgManager->findOrga($organizationId);
        
        return $this->render(
            'CoreBundle:Organization:show.html.twig',
            [
                'organization'  => $organization
            ]
        );
    }
    
    /**
     * showAllOrganizationAction
     */
    public function showAllOrganizationAction()
    {
        $orgManager     = $this->get('core.manager.organization');
        $organizations  = $orgManager->findAll();
        
        return $this->render(
            'CoreBundle:Organization:list.html.twig',
            [
                'organizations'  => $organizations
            ]
        );
    }
}
