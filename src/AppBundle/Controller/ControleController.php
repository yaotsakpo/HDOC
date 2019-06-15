<?php
/**
 * Created by PhpStorm.
 * User: elom
 * Date: 11/07/2017
 * Time: 06:36
 */

namespace AppBundle\Controller;



use AppBundle\Entity\Controle;
use AppBundle\Entity\Rdv;
use AppBundle\Entity\Patient;
use AppBundle\Form\ControleType;
use AppBundle\Form\ControType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Common\Persistence\ObjectRepository;
use DateTime;

class ControleController extends Controller

{
    /**
     * @Route("/addControle",name="addControle")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {

        $Controle= new Controle();

        $form = $this->createform(ControleType::class,$Controle);

        $form->handleRequest($request);

        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){


                $enregistrement = $this->getDoctrine()->getManager();

                    $Controle->setDate($a);
                    $Controle->setHeure($a);

                $enregistrement->persist($Controle);
                $enregistrement->flush();

                $this->addFlash('notice', 'Controle enregistre');
             
                    return $this->redirectToRoute('adControle',['id'=>$Controle->getID()]);

              


        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Controle');

        $Controles=$repository->findBy([],['id' => 'DESC']);


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');



        return $this->render('ControleAdd.html.twig',['patients'=>$patients,'form'=>$formView,'today'=>$today,'Controles'=>$Controles]);
    }



    /**
     * @Route("/adControle/{id}",name="adControle")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adAction(Request $request,Controle $Con)
    {

        $Controle= new Controle();
        $form = $this->createform(ControleType::class,$Controle);

        $form->handleRequest($request);
        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){


                $enregistrement = $this->getDoctrine()->getManager();

                    $Controle->setDate($a);
                    $Controle->setHeure($a);

                $enregistrement->persist($Controle);
                $enregistrement->flush();

                $this->addFlash('notice', 'Controle enregistre');
             
                return $this->redirectToRoute('adControle',['id'=>$Controle->getID()]);

              
        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Controle');

        $Controles= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');



        return $this->render('ControleAd.html.twig',['id'=>$Con->getID(),'patients'=>$patients,'form'=>$formView,'today'=>$today,'Controles'=>$Controles]);
    }


    /**
     * @Route("/listControle",name="listeControle")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function listControleAction()
    {

        $repository= $this->getDoctrine()->getRepository('AppBundle:Controle');

        $Controles= $repository->findAll();


        $today=new \DateTime('now');



        return $this->render('ControleList.html.twig',['Controles'=>$Controles,'today'=>$today]);
    }


    /**
     *
     *
     * @return Response
     *
     * @Route("/editControle/{id}",name="edit_Controle")
     *
     *
     *
     */



    public function edit(Request $request, Controle $Controle)
    {

        $form = $this->createform(ControleType::class,$Controle);

        $form->handleRequest($request);

        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){

              $enregistrement = $this->getDoctrine()->getManager();

                    $Controle->setDate($a);
                    $Controle->setHeure($a);

                $this->addFlash('notice', 'Controle Modifie');

                $enregistrement->flush();

                                    return $this->redirectToRoute('addControle');


        }

        $formView= $form->createView();

        $today=new \DateTime('now');

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:Controle');

        $Controles= $repository->findAll();


        return $this->render('ControleAdd.html.twig',['Controles'=>$Controles,'patients'=>$patients,'form'=>$formView,'today'=>$today]);
    }
    /**
     *
     *
     * @return Response
     *
     * @Route("/deleteControle/{id}",name="supprimer_Controle")
     *
     *
     *
     */

    public function delete(Controle $Controle)
    {

        $enregistrement = $this->getDoctrine()->getManager();
        $enregistrement->remove($Controle);
        $enregistrement->flush();

        $this->addFlash('notice','Suppression reussie');

        return $this->redirectToRoute('addControle');



    }



    /**
     * @Route("/ajoutControle/{id}",name="ajoutControle")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajoutAction(Request $request,Patient $patient)
    {

        $Controle= new Controle();

        $form = $this->createform(ControType::class,$Controle);

        $form->handleRequest($request);
        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){


            $enregistrement = $this->getDoctrine()->getManager();
            $Controle->setPatient($patient);
            $Controle->setDate($a);
            $Controle->setHeure($a);

            $enregistrement->persist($Controle);
            $enregistrement->flush();

            $this->addFlash('notice', 'Controle enregistre');

                    return $this->redirectToRoute('adControle',['id'=>$Controle->getID()]);


        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Controle');

        $Controles= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');


        $malade=$patient->getId();

        return $this->render('ControAdd.html.twig',['malade'=>$malade,'patients'=>$patients,'form'=>$formView,'today'=>$today,'Controles'=>$Controles]);
    }


    /**
     * @Route("/finirControle/{id}/{rdv}",name="finControle")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function finirAction(Request $request,Patient $patient,Rdv $rdv)
    {



        $Controle= new Controle();

        $form = $this->createform(ControType::class,$Controle);

        $form->handleRequest($request);
        $a=new \DateTime('now');


        $repository= $this->getDoctrine()->getRepository('AppBundle:Rdv');

        $Rdvs= $repository->findAll();

        foreach ($Rdvs as $r)
            {
                if( $r == $rdv )
                {

                    $enregistrement = $this->getDoctrine()->getManager();

                    $r->setEtat(1);

                    $enregistrement->flush();  
                }
            }

        if($form->isSubmitted() && $form->isValid() ){


            $enregistrement = $this->getDoctrine()->getManager();
            $Controle->setPatient($patient);
            $Controle->setDate($a);
            $Controle->setHeure($a);

            $enregistrement->persist($Controle);
            $enregistrement->flush();

            $this->addFlash('notice', 'Controle enregistre');

                    return $this->redirectToRoute('adControle',['id'=>$Controle->getID()]);


        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Controle');

        $Controles= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');


        $malade=$patient->getId();

        return $this->render('ControAdd.html.twig',['malade'=>$malade,'patients'=>$patients,'form'=>$formView,'today'=>$today,'Controles'=>$Controles]);
    }



}