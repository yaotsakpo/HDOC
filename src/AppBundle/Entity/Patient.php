<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PatientRepository")
 */
class Patient
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
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255,nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255,nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100,nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=100,nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="Age", type="string", length=100 ,nullable=true)
     */
    private $Age;


    /**
     * @var text
     *
     * @ORM\Column(name="antecedant", type="text",nullable=true)
     */
    private $antecedant;



    /**
     * @return string
     */
    public function getAge()
    {
        return $this->Age;
    }

    /**
     * @param string $Age
     */
    public function setAge($Age)
    {
        $this->Age = $Age;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1,nullable=true)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="Groupe_sanguin", type="string", length=10,nullable=true)
     */
    private $groupeSanguin;


    /**
     * @var string
     *
     * @ORM\Column(name="NomPrenom", type="string", length=255)
     *
     *
     *
     */
    private $NomPrenom;



        /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Rdv",mappedBy="patient",cascade={"remove"})
     */

    private $Rdvs;



    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Consultation",mappedBy="patient",cascade={"remove"})
     */

    private $consultations;


        /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Hospitalisation",mappedBy="patient",cascade={"remove"})
     */

    private $hospitalisations;

    /**
     * @return string
     */
    public function getNomPrenom()
    {
        return $this->NomPrenom;
    }

    /**
     * @param string $NomPrenom
     */
    public function setNomPrenom($NomPrenom)
    {
        $this->NomPrenom = $NomPrenom;
    }


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Patient
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Patient
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Patient
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }


    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Patient
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set groupeSanguin
     *
     * @param string $groupeSanguin
     *
     * @return Patient
     */
    public function setGroupeSanguin($groupeSanguin)
    {
        $this->groupeSanguin = $groupeSanguin;

        return $this;
    }

    /**
     * Get groupeSanguin
     *
     * @return string
     */
    public function getGroupeSanguin()
    {
        return $this->groupeSanguin;
    }

    /**
     * @return mixed
     */
    public function getRdvs()
    {
        return $this->Rdvs;
    }

    /**
     * @param mixed $Rdvs
     */
    public function setRdvs($Rdvs)
    {
        $this->Rdvs = $Rdvs;
    }

    /**
     * @return mixed
     */
    public function getConsultations()
    {
        return $this->Consultations;
    }

    /**
     * @param mixed $Consultations
     */
    public function setConsultations($Consultations)
    {
        $this->Consultations = $Consultations;
    }

        /**
     * Set antecedant
     *
     * @param string $antecedant
     *
     * @return Consultation
     */
    public function setantecedant($antecedant)
    {
        $this->antecedant = $antecedant;

        return $this;
    }

    /**
     * Get antecedant
     *
     * @return string
     */
    public function getantecedant()
    {
        return $this->antecedant;
    }

    /**
     * @return mixed
     */
    public function getHospitalisations()
    {
        return $this->hospitalisations;
    }

    /**
     * @param mixed $hospitalisations
     */
    public function setHospitalisations($hospitalisations)
    {
        $this->hospitalisations = $hospitalisations;
    }



}

