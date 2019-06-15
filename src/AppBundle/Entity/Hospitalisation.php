<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hospitalisation
 *
 * @ORM\Table(name="hospitalisation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HospitalisationRepository")
 */
class Hospitalisation
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
     * @ORM\Column(name="Entree", type="date")
     */
    private $entree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Sortie", type="date", nullable=true)
     */
    private $sortie;

    /**
     * @var string
     *
     * @ORM\Column(name="Temperature", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $temperature;

    /**
     * @var string
     *
     * @ORM\Column(name="Poids", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="Tension", type="string", length=5, nullable=true)
     */
    private $tension;

    /**
     * @var string
     *
     * @ORM\Column(name="Chambre", type="string", length=30, nullable=true)
     */
    private $chambre;

    /**
     * @var string
     *
     * @ORM\Column(name="Lit", type="string", length=30, nullable=true)
     */
    private $lit;

    /**
     * @var string
     *
     * @ORM\Column(name="Diagnostic", type="text", nullable=true)
     */
    private $diagnostic;

    /**
     * @var string
     *
     * @ORM\Column(name="Traitement", type="text", nullable=true)
     */
    private $traitement;

    /**
     * @var string
     *
     * @ORM\Column(name="Analyse", type="text", nullable=true)
     */
    private $analyse;

        /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient",inversedBy="hospitalisations",cascade={"persist"})
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
     * Set entree
     *
     * @param \DateTime $entree
     *
     * @return Hospitalisation
     */
    public function setEntree($entree)
    {
        $this->entree = $entree;

        return $this;
    }

    /**
     * Get entree
     *
     * @return \DateTime
     */
    public function getEntree()
    {
        return $this->entree;
    }

    /**
     * Set sortie
     *
     * @param \DateTime $sortie
     *
     * @return Hospitalisation
     */
    public function setSortie($sortie)
    {
        $this->sortie = $sortie;

        return $this;
    }

    /**
     * Get sortie
     *
     * @return \DateTime
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    /**
     * Set temperature
     *
     * @param string $temperature
     *
     * @return Hospitalisation
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * Get temperature
     *
     * @return string
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set poids
     *
     * @param string $poids
     *
     * @return Hospitalisation
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return string
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set tension
     *
     * @param string $tension
     *
     * @return Hospitalisation
     */
    public function setTension($tension)
    {
        $this->tension = $tension;

        return $this;
    }

    /**
     * Get tension
     *
     * @return string
     */
    public function getTension()
    {
        return $this->tension;
    }

    /**
     * Set chambre
     *
     * @param string $chambre
     *
     * @return Hospitalisation
     */
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;

        return $this;
    }

    /**
     * Get chambre
     *
     * @return string
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * Set lit
     *
     * @param string $lit
     *
     * @return Hospitalisation
     */
    public function setLit($lit)
    {
        $this->lit = $lit;

        return $this;
    }

    /**
     * Get lit
     *
     * @return string
     */
    public function getLit()
    {
        return $this->lit;
    }

    /**
     * Set diagnostic
     *
     * @param string $diagnostic
     *
     * @return Hospitalisation
     */
    public function setDiagnostic($diagnostic)
    {
        $this->diagnostic = $diagnostic;

        return $this;
    }

    /**
     * Get diagnostic
     *
     * @return string
     */
    public function getDiagnostic()
    {
        return $this->diagnostic;
    }

    /**
     * Set traitement
     *
     * @param string $traitement
     *
     * @return Hospitalisation
     */
    public function setTraitement($traitement)
    {
        $this->traitement = $traitement;

        return $this;
    }

    /**
     * Get traitement
     *
     * @return string
     */
    public function getTraitement()
    {
        return $this->traitement;
    }

    /**
     * Set analyse
     *
     * @param string $analyse
     *
     * @return Hospitalisation
     */
    public function setAnalyse($analyse)
    {
        $this->analyse = $analyse;

        return $this;
    }

    /**
     * Get analyse
     *
     * @return string
     */
    public function getAnalyse()
    {
        return $this->analyse;
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



}

