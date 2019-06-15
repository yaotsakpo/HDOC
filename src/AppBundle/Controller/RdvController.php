<?php
/**
 * Created by PhpStorm.
 * User: elom
 * Date: 11/07/2017
 * Time: 06:36
 */

namespace AppBundle\Controller;



use AppBundle\Entity\Rdv;
use AppBundle\Form\RdvType;
use AppBundle\Entity\Controle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Common\Persistence\ObjectRepository;
use DateTime;

class RdvController extends Controller

{
    /**
     * @Route("/addRdv",name="addRdv")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {

        $Rdv= new Rdv();

        $form = $this->createform(RdvType::class,$Rdv);

        $form->handleRequest($request);
        $a=new \DateTime('now');
        if($form->isSubmitted() && $form->isValid() ){

            if($Rdv->getDate()>=new \DateTime('now') or $Rdv->getDate()->format('d-m-Y')==$a->format('d-m-Y')) {

                $enregistrement = $this->getDoctrine()->getManager();
                $Rdv->setEtat(0);
                $enregistrement->persist($Rdv);
                $enregistrement->flush();

                $this->addFlash('notice', 'Rendez-vous enregistre');

                return $this->redirectToRoute('addRdv');
            }else
            {
                $this->addFlash('notice', 'La date du rendez-vous doit etre superieur a la date du jour!!');

                return $this->redirectToRoute('addRdv');
            }

        }

        $formView= $form->createView();

        $repository= $this->getDoctrine()->getRepository('AppBundle:Rdv');

        $Rdvs= $repository->findBy([],['date' => 'DESC']);


        $today=new \DateTime('now');

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();



        return $this->render('Rdvadd.html.twig',['patients'=>$patients,'form'=>$formView,'today'=>$today,'Rdvs'=>$Rdvs]);
    }

    /**
     * @Route("/listRdv",name="ListeRdv")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function listRdvAction()
    {

        $repository= $this->getDoctrine()->getRepository('AppBundle:Rdv');

        $Rdvs= $repository->findAll();


        $today=new \DateTime('now');



        return $this->render('RdvList.html.twig',['Rdvs'=>$Rdvs,'today'=>$today]);
    }


    /**
     *
     *
     * @return Response
     *
     * @Route("/editRdv/{id}",name="edit_Rdv")
     *
     *
     *
     */



    public function edit(Request $request, Rdv $Rdv)
    {
        $a=new \DateTime('now');
        $form = $this->createform(RdvType::class,$Rdv);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            if($Rdv->getDate()>=new \DateTime('now') or $Rdv->getDate()->format('d-m-Y')==$a->format('d-m-Y')) {

                $enregistrement = $this->getDoctrine()->getManager();
                $Rdv->setEtat(0);
                $this->addFlash('notice', 'Rendez-vous Modifie');

                $enregistrement->flush();


                return $this->redirectToRoute('addRdv');

            }
            else{
                $this->addFlash('notice', 'La date du rendez-vous doit etre superieur a la date du jour!!');

                return $this->redirectToRoute('addRdv');
            }
        }

        $formView= $form->createView();

        $today=new \DateTime('now');

         $repository= $this->getDoctrine()->getRepository('AppBundle:Rdv');

        $Rdvs= $repository->findAll();

        $repository= $this->getDoctrine()->getRepository('AppBundle:patient');

        $patients= $repository->findAll();

        return $this->render('Rdvadd.html.twig',['form'=>$formView,'today'=>$today,'Rdvs'=>$Rdvs,'patients'=>$patients]);
    }
    /**
     *
     *
     * @return Response
     *
     * @Route("/deleteRdv/{id}",name="supprimer_Rdv")
     *
     *
     *
     */

    public function delete(Rdv $Rdv)
    {

        $enregistrement = $this->getDoctrine()->getManager();
        $enregistrement->remove($Rdv);
        $enregistrement->flush();

        $this->addFlash('notice','Suppression reussie');

        return $this->redirectToRoute('addRdv');



    }

    /**
     *
     *
     * @return Response
     *
     * @Route("/valider/{id}",name="valider")
     *
     *
     *
     */

    public function valier(Rdv $Rdv)
    {

        $enregistrement = $this->getDoctrine()->getManager();
        $Rdv->setEtat(1);
        $enregistrement->flush();

        $this->addFlash('notice','Rendez-vous effectue');

        return $this->redirectToRoute('addRdv');



    }



       /**
     *
     *
     * @return Response
     *
     * @Route("/valide/{id}",name="valide")
     *
     *
     *
     */

    public function val(Rdv $Rdv)
    {

        $enregistrement = $this->getDoctrine()->getManager();
        $Rdv->setEtat(1);
        $enregistrement->flush();

        $this->addFlash('notice','Rendez-vous effectue');

        return $this->redirectToRoute('homepage');



    }
}