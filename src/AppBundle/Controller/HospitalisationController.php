<?php


namespace AppBundle\Controller;



use AppBundle\Entity\Hospitalisation;
use AppBundle\Entity\Patient;
use AppBundle\Form\HospitalisationType;
use AppBundle\Form\HospiType;
use AppBundle\Entity\Controle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Common\Persistence\ObjectRepository;
use DateTime;

class HospitalisationController extends Controller

{
    /**
     * @Route("/addHospitalisation",name="addHospitalisation")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {

        $Hospitalisation= new Hospitalisation();

        $form = $this->createform(HospitalisationType::class,$Hospitalisation);

        $form->handleRequest($request);
        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){


            $enregistrement = $this->getDoctrine()->getManager();

            $Hospitalisation->setEntree($a);

            $enregistrement->persist($Hospitalisation);
            
            $enregistrement->flush();

            $this->addFlash('notice', 'Hospitalisation enregistre');

            return $this->redirectToRoute('addHospitalisation');


        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Hospitalisation');

        $Hospitalisations= $repository->findBy([],['id' => 'DESC']);


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');



        return $this->render('HospitalisationAdd.html.twig',['patients'=>$patients,'form'=>$formView,'today'=>$today,'Hospitalisations'=>$Hospitalisations]);
    }

    /**
     * @Route("/listHospitalisation",name="listeHospitalisation")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function listHospitalisationAction()
    {

        $repository= $this->getDoctrine()->getRepository('AppBundle:Hospitalisation');

        $Hospitalisations= $repository->findAll();


        $today=new \DateTime('now');



        return $this->render('HospitalisationList.html.twig',['Hospitalisations'=>$Hospitalisations,'today'=>$today]);
    }


    /**
     *
     *
     * @return Response
     *
     * @Route("/editHospitalisation/{id}",name="edit_Hospitalisation")
     *
     *
     *
     */



    public function edit(Request $request, Hospitalisation $Hospitalisation)
    {

        $form = $this->createform(HospitalisationType::class,$Hospitalisation);

        $form->handleRequest($request);

        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){

            $enregistrement = $this->getDoctrine()->getManager();

            $Hospitalisation->setEntree($a);

            $this->addFlash('notice', 'Hospitalisation Modifie');

            $enregistrement->flush();


            return $this->redirectToRoute('addHospitalisation');


        }

        $formView= $form->createView();

        $today=new \DateTime('now');

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:Hospitalisation');

        $Hospitalisations= $repository->findAll();

        return $this->render('HospitalisationAdd.html.twig',['Hospitalisations'=>$Hospitalisations,'patients'=>$patients,'form'=>$formView,'today'=>$today]);
    }
    /**
     *
     *
     * @return Response
     *
     * @Route("/deleteHospitalisation/{id}",name="supprimer_Hospitalisation")
     *
     *
     *
     */

    public function delete(Hospitalisation $Hospitalisation)
    {

        $enregistrement = $this->getDoctrine()->getManager();
        $enregistrement->remove($Hospitalisation);
        $enregistrement->flush();

        $this->addFlash('notice','Suppression reussie');

        return $this->redirectToRoute('addHospitalisation');



    }


    /**
     *
     *
     * @return Response
     *
     * @Route("/sorti/{id}",name="sorti")
     *
     *
     *
     */

    public function sorti(Hospitalisation $Hospitalisation)
    {

        $enregistrement = $this->getDoctrine()->getManager();
        $a=new \DateTime('now');

        $Hospitalisation->setSortie($a);

        $enregistrement->flush();

        $this->addFlash('notice','Enregistrement reussit');

        return $this->redirectToRoute('addHospitalisation');



    }


    /**
     * @Route("/ajoutHospitalisation/{id}",name="ajoutHospitalisation")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajoutAction(Request $request,Patient $patient)
    {

        $Hospitalisation= new Hospitalisation();

        $form = $this->createform(HospiType::class,$Hospitalisation);

        $form->handleRequest($request);
        $a=new \DateTime('now');

        if($form->isSubmitted() && $form->isValid() ){


            $enregistrement = $this->getDoctrine()->getManager();

            $Hospitalisation->setPatient($patient);

            $Hospitalisation->setEntree($a);

            $enregistrement->persist($Hospitalisation);

            $enregistrement->flush();

            $this->addFlash('notice', 'Hospitalisation enregistre');

            return $this->redirectToRoute('addHospitalisation');


        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Hospitalisation');

        $Hospitalisations= $repository->findAll();


        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        $today=new \DateTime('now');

        $malade=$patient->getId();

        return $this->render('HospiAdd.html.twig',['malade'=>$malade,'patients'=>$patients,'form'=>$formView,'today'=>$today,'Hospitalisations'=>$Hospitalisations]);
    }


}