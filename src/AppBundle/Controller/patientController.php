<?php
/**
 * Created by PhpStorm.
 * User: elom
 * Date: 11/07/2017
 * Time: 06:36
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Patient;
use AppBundle\Entity\Rdv;
use AppBundle\Form\PatientType;
use AppBundle\Entity\Controle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Common\Persistence\ObjectRepository;

class patientController extends Controller

{
    /**
     * @Route("/addPatient",name="addpatient")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {

        $patient= new patient();

        $malade=$patient->getId();

        $form = $this->createform(patientType::class,$patient);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

            $patients= $repository->findAll();

            $bool=0;
            foreach ($patients as $p)
            {
                if( ($p->getNom()==$patient->getNom()) && ($p->getPrenom()==$patient->getPrenom() )  )
                {
                    $bool=1;
                }
            }

            if($bool==0)
            {
                        $enregistrement = $this->getDoctrine()->getManager();
                        $patient->setNomPrenom($patient->getNom(). " " . ' ' . " " . $patient->getPrenom());
                        $enregistrement->persist($patient);
                        $enregistrement->flush();
                        $malade=$patient->getId();

                        $this->addFlash('notice', 'Enregistrement reussi');

                return $this->redirectToRoute('nouveaupatient',['id'=>$malade]);



            }else
            {
                $this->addFlash('notice', 'Patient deja existant!!');

                return $this->redirectToRoute('addpatient');

            }

        }

        $formView= $form->createView();

        $today=new \DateTime('now');

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();
        
        

        return $this->render('patientadd.html.twig',['malade'=>$malade,'patients'=>$patients,'form'=>$formView,'today'=>$today,'patients'=>$patients]);
    }



        /**
     * @Route("/nouveauPatient/{id}",name="nouveaupatient")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function NouveauAction(Request $request,patient $ancien)
    {

        $patient= new patient();

        $malade=$patient->getId();

        $form = $this->createform(patientType::class,$patient);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

            $patients= $repository->findAll();

            $bool=0;
            foreach ($patients as $p)
            {
                if( ($p->getNom()==$patient->getNom()) && ($p->getPrenom()==$patient->getPrenom() )  )
                {
                    $bool=1;
                }
            }

            if($bool==0)
            {
                        $enregistrement = $this->getDoctrine()->getManager();
                        $patient->setNomPrenom($patient->getNom(). " " . ' ' . " " . $patient->getPrenom());
                        $enregistrement->persist($patient);
                        $enregistrement->flush();
                        $malade=$patient->getId();

                        $this->addFlash('notice', 'Enregistrement reussi');

                return $this->redirectToRoute('nouveaupatient',['id'=>$malade]);



            }else
            {
                $this->addFlash('notice', 'Patient deja existant!!');

                return $this->redirectToRoute('addpatient');

            }

        }

        $formView= $form->createView();

        $today=new \DateTime('now');

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();
        
        $malade=$ancien->getId();


        return $this->render('patienAjout.html.twig',['malade'=>$malade,'patients'=>$patients,'form'=>$formView,'today'=>$today,'patients'=>$patients]);
    }

    /**
     * @Route("/listPatient",name="Listepatient")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function listpatientAction()
    {

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();

        $today=new \DateTime('now');

        return $this->render('patientList.html.twig',['patients'=>$patients,'today'=>$today]);
    }


    /**
     *
     *
     * @return Response
     *
     * @Route("/editPatient/{id}",name="edit_patient")
     *
     *
     *
     */



    public function edit(Request $request, patient $patient)
    {

        $form = $this->createform(patientType::class,$patient);

        $malade=$patient->getId();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

            $patients= $repository->findAll();

            $bool=0;
            foreach ($patients as $p)
            {
                if( ( $p->getNom()==$patient->getNom() ) && ($p->getPrenom()==$patient->getPrenom() )   && ( $p->getId()!=$patient->getId() ) )
                {
                    $bool=1;
                }
            }

            if($bool==0)
            {




                        $enregistrement = $this->getDoctrine()->getManager();

                        $patient->setNomPrenom($patient->getNom(). " " . ' ' . " " . $patient->getPrenom());
                        $this->addFlash('notice', 'Edition reussie');
                        $enregistrement->flush();
                        $malade=$patient->getId();
                return $this->redirectToRoute('nouveaupatient',['id'=>$malade]);


            }else
            {
                $this->addFlash('notice', 'Patient deja existant!!');

                return $this->redirectToRoute('addpatient');

            }


        }

        $formView= $form->createView();



        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');

        return $this->render('patientadd.html.twig',['malade'=>$malade,'patients'=>$patients,'form'=>$formView,'today'=>$today]);
    }
    /**
     *
     *
     * @return Response
     *
     * @Route("/deletePatient/{id}",name="supprimer_patient")
     *
     *
     *
     */

    public function delete(patient $patient)
    {


        $enregistrement = $this->getDoctrine()->getManager();
        $enregistrement->remove($patient);
        $enregistrement->flush();

        $this->addFlash('notice','Suppression reussie');

        return $this->redirectToRoute('addpatient');



    }


    /**
     * @Route("/recherchePatient/{id}",name="Recherchepatient")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function RecherchepatientAction(patient $patient)
    {

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Hospitalisation');

        $Hospitalisations= $repository->findBy(array(),array('id'=>'DESC'));

        $repository= $this->getDoctrine()->getRepository('AppBundle:Consultation');

        $Consultations= $repository->findBy(array(),array('id'=>'DESC'));

        $repository= $this->getDoctrine()->getRepository('AppBundle:Controle');

        $Controles= $repository->findBy(array(),array('id'=>'DESC'));

        $today=new \DateTime('now');

        $malade=$patient->getId();

        return $this->render('patientList.html.twig',['malade'=>$malade,'Hospitalisations'=>$Hospitalisations,'Consultations'=>$Consultations,'Controles'=>$Controles,'patients'=>$patients,'today'=>$today]);
    }


}