<?php
/**
 * Created by PhpStorm.
 * User: elom
 * Date: 11/07/2017
 * Time: 06:36
 */

namespace AppBundle\Controller;



use AppBundle\Entity\Consultation;
use AppBundle\Entity\Rdv;
use AppBundle\Entity\Patient;
use AppBundle\Form\ConsultationType;
use AppBundle\Form\ConsulType;
use AppBundle\Entity\Controle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Common\Persistence\ObjectRepository;
use DateTime;

class ConsultationController extends Controller

{
    /**
     * @Route("/addConsultation",name="addConsultation")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {

        $Consultation= new Consultation();

        $form = $this->createform(ConsultationType::class,$Consultation);

        $form->handleRequest($request);

        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){


                $enregistrement = $this->getDoctrine()->getManager();

                    
                    $Consultation->setDate($a);
                    $Consultation->setHeure($a);

                $enregistrement->persist($Consultation);
                $enregistrement->flush();

                    if($Consultation->getControle()!=null)
                    {
                    $Rdv= new Rdv();
                    $Rdv->setEtat(0);
                    $Rdv->setDate($Consultation->getControle());
                    $Rdv->setPatient($Consultation->getPatient());
                    $Rdv->setMotif('controle');

                    $enregistrement->persist($Rdv);
                    $enregistrement->flush();
                    }
                    

                $this->addFlash('notice', 'Consultation enregistre');
             
                    return $this->redirectToRoute('adConsultation',['id'=>$Consultation->getID()]);

              


        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Consultation');

        $Consultations= $repository->findBy([],['id' => 'DESC']);


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');



        return $this->render('ConsultationAdd.html.twig',['patients'=>$patients,'form'=>$formView,'today'=>$today,'Consultations'=>$Consultations]);
    }



    /**
     * @Route("/adConsultation/{id}",name="adConsultation")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adAction(Request $request,Consultation $Con)
    {

        $Consultation= new Consultation();
        $form = $this->createform(ConsultationType::class,$Consultation);

        $form->handleRequest($request);
        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){


                $enregistrement = $this->getDoctrine()->getManager();

                    $Consultation->setDate($a);
                    $Consultation->setHeure($a);

                $enregistrement->persist($Consultation);
                $enregistrement->flush();


                 if($Consultation->getControle()!=null)
                    {
                    $Rdv= new Rdv();
                    $Rdv->setEtat(0);
                    $Rdv->setDate($Consultation->getControle());
                    $Rdv->setPatient($Consultation->getPatient());
                    $Rdv->setMotif('controle');

                    $enregistrement->persist($Rdv);
                    $enregistrement->flush();
                    }

                $this->addFlash('notice', 'Consultation enregistre');
             
                return $this->redirectToRoute('adConsultation',['id'=>$Consultation->getID()]);

              
        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Consultation');

        $Consultations= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');



        return $this->render('ConsultationAd.html.twig',['id'=>$Con->getID(),'patients'=>$patients,'form'=>$formView,'today'=>$today,'Consultations'=>$Consultations]);
    }


    /**
     * @Route("/listConsultation",name="listeConsultation")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function listConsultationAction()
    {

        $repository= $this->getDoctrine()->getRepository('AppBundle:Consultation');

        $Consultations= $repository->findAll();


        $today=new \DateTime('now');



        return $this->render('ConsultationList.html.twig',['Consultations'=>$Consultations,'today'=>$today]);
    }


    /**
     *
     *
     * @return Response
     *
     * @Route("/editConsultation/{id}",name="edit_Consultation")
     *
     *
     *
     */



    public function edit(Request $request, Consultation $Consultation)
    {

        $form = $this->createform(ConsultationType::class,$Consultation);

        $form->handleRequest($request);

        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){

              $enregistrement = $this->getDoctrine()->getManager();

                    $Consultation->setDate($a);
                    $Consultation->setHeure($a);

                $this->addFlash('notice', 'Consultation Modifie');

                $enregistrement->flush();

                return $this->redirectToRoute('addConsultation');


        }

        $formView= $form->createView();

        $today=new \DateTime('now');

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:Consultation');

        $Consultations= $repository->findAll();


        return $this->render('ConsultationAdd.html.twig',['Consultations'=>$Consultations,'patients'=>$patients,'form'=>$formView,'today'=>$today]);
    }
    /**
     *
     *
     * @return Response
     *
     * @Route("/deleteConsultation/{id}",name="supprimer_Consultation")
     *
     *
     *
     */

    public function delete(Consultation $Consultation)
    {

        $enregistrement = $this->getDoctrine()->getManager();
        $enregistrement->remove($Consultation);
        $enregistrement->flush();

        $this->addFlash('notice','Suppression reussie');

        return $this->redirectToRoute('addConsultation');



    }



    /**
     * @Route("/ajoutConsultation/{id}",name="ajoutConsultation")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajoutAction(Request $request,Patient $patient)
    {

        $Consultation= new Consultation();

        $form = $this->createform(ConsulType::class,$Consultation);

        $form->handleRequest($request);
        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){


            $enregistrement = $this->getDoctrine()->getManager();
            $Consultation->setPatient($patient);
            $Consultation->setDate($a);
            $Consultation->setHeure($a);

            $enregistrement->persist($Consultation);
            $enregistrement->flush();


             if($Consultation->getControle()!=null)
                    {
                    $Rdv= new Rdv();
                    $Rdv->setEtat(0);
                    $Rdv->setDate($Consultation->getControle());
                    $Rdv->setPatient($Consultation->getPatient());
                    $Rdv->setMotif('controle');

                    $enregistrement->persist($Rdv);
                    $enregistrement->flush();
                    }

            $this->addFlash('notice', 'Consultation enregistre');

                    return $this->redirectToRoute('adConsultation',['id'=>$Consultation->getID()]);


        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Consultation');

        $Consultations= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');


        $malade=$patient->getId();

        return $this->render('ConsulAdd.html.twig',['malade'=>$malade,'patients'=>$patients,'form'=>$formView,'today'=>$today,'Consultations'=>$Consultations]);
    }


     /**
     * @Route("/Ordonnance/{id}",name="Ordonnance")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function OrdonnanceAction(Request $request,Consultation $consultation)
    {


        $repository= $this->getDoctrine()->getRepository('AppBundle:Consultation');

        $Consultations= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();


        $today=new \DateTime('now');

        return $this->render('Ordonnance.html.twig',['patients'=>$patients,'today'=>$today,'Consultations'=>$Consultations,'Consultation'=>$consultation]);
    }









}