<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Controle
 *
 * @ORM\Table(name="Controle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ControleRepository")
 */
class Controle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="datetime")
     */
    private $heure;

    /**
     * @var text
     *
     * @ORM\Column(name="diagnostic", type="text",nullable=true)
     */
    private $diagnostic;

    /**
     * @var text
     *
     * @ORM\Column(name="Observation", type="text",nullable=true)
     */
    private $observation;


    /**
     * @var text
     *
     * @ORM\Column(name="prescription", type="text",nullable=true)
     */
    private $prescription;



    /**
     * @var text
     *
     * @ORM\Column(name="analyses", type="text",nullable=true)
     */
    private $analyses;


    /**
     * @var string
     *
     * @ORM\Column(name="Temperature", type="string", length=255,nullable=true)
     */
    private $Temperature;

    /**
     * @var string
     *
     * @ORM\Column(name="Tension",  type="string",length=255,nullable=true)
     */
    private $Tension;



       /**
     * @var string
     *
     * @ORM\Column(name="Poids", type="string", length=255,nullable=true)
     */
    private $Poids;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient",inversedBy="Controles",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Controle
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure
     *
     * @param \DateTime $heure
     *
     * @return Controle
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Controle
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * @return mixed
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param mixed $patient
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
    }

    /**
     * Set Temperature
     *
     * @param string $Temperature
     *
     * @return Patient
     */
    public function setTemperature($Temperature)
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    /**
     * Get Temperature
     *
     * @return string
     */
    public function getTemperature()
    {
        return $this->Temperature;
    }

    /**
     * @return string
     */
    public function getTension()
    {
        return $this->Tension;
    }

    /**
     * @param string $Tension
     */
    public function setTension($Tension)
    {
        $this->Tension = $Tension;
    }



    /**
     * Set Poids
     *
     * @param string $Poids
     *
     * @return Patient
     */
    public function setPoids($Poids)
    {
        $this->Poids = $Poids;

        return $this;
    }

    /**
     * Get Poids
     *
     * @return string
     */
    public function getPoids()
    {
        return $this->Poids;
    }


    /**
     * @return text
     */
    public function getPrescription()
    {
        return $this->prescription;
    }

    /**
     * @param text $prescription
     */
    public function setPrescription($prescription)
    {
        $this->prescription = $prescription;
    }

    /**
     * @return text
     */
    public function getAnalyses()
    {
        return $this->analyses;
    }

    /**
     * @param text $analyses
     */
    public function setAnalyses($analyses)
    {
        $this->analyses = $analyses;
    }


    /**
     * Set diagnostic
     *
     * @param string $diagnostic
     *
     * @return Controle
     */
    public function setdiagnostic($diagnostic)
    {
        $this->diagnostic = $diagnostic;

        return $this;
    }

    /**
     * Get diagnostic
     *
     * @return string
     */
    public function getdiagnostic()
    {
        return $this->diagnostic;
    }




}

