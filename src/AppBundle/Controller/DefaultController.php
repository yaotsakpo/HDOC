<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        $repository= $this->getDoctrine()->getRepository('AppBundle:Rdv');

        $Rdvs= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Consultation');

        $Consultations= $repository->findAll();


        $today=new \DateTime('now');

        return $this->render('default/index.html.twig', ['Consultations'=>$Consultations,'patients'=>$patients,'Rdvs'=>$Rdvs,'today'=>$today,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
