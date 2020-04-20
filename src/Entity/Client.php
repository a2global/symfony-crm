<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 * @ORM\Table(name="clients")
 */
class Client
{
    const CHOICES_CHOICE_GENDER = [
        'Male',
        'Female',
        'Other',
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stringUsername;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $integerAge;

    /**
     * @ORM\Column(type="float", nullable=true, nullable=true)
     */
    private $floatWeight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $choiceGender;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $booleanMarried;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateBirthday;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datetimeRegisteredAt;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $relationCompany;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return Client
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return Client
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStringUsername()
    {
        return $this->stringUsername;
    }

    /**
     * @param mixed $stringUsername
     * @return Client
     */
    public function setStringUsername($stringUsername)
    {
        $this->stringUsername = $stringUsername;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIntegerAge()
    {
        return $this->integerAge;
    }

    /**
     * @param mixed $integerAge
     * @return Client
     */
    public function setIntegerAge($integerAge)
    {
        $this->integerAge = $integerAge;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFloatWeight()
    {
        return $this->floatWeight;
    }

    /**
     * @param mixed $floatWeight
     * @return Client
     */
    public function setFloatWeight($floatWeight)
    {
        $this->floatWeight = $floatWeight;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChoiceGender()
    {
        return $this->choiceGender;
    }

    /**
     * @param mixed $choiceGender
     * @return Client
     */
    public function setChoiceGender($choiceGender)
    {
        $this->choiceGender = $choiceGender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBooleanMarried()
    {
        return $this->booleanMarried;
    }

    /**
     * @param mixed $booleanMarried
     * @return Client
     */
    public function setBooleanMarried($booleanMarried)
    {
        $this->booleanMarried = $booleanMarried;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateBirthday()
    {
        return $this->dateBirthday;
    }

    /**
     * @param mixed $dateBirthday
     * @return Client
     */
    public function setDateBirthday($dateBirthday)
    {
        $this->dateBirthday = $dateBirthday;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatetimeRegisteredAt()
    {
        return $this->datetimeRegisteredAt;
    }

    /**
     * @param mixed $datetimeRegisteredAt
     * @return Client
     */
    public function setDatetimeRegisteredAt($datetimeRegisteredAt)
    {
        $this->datetimeRegisteredAt = $datetimeRegisteredAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRelationCompany()
    {
        return $this->relationCompany;
    }

    /**
     * @param mixed $relationCompany
     * @return Client
     */
    public function setRelationCompany($relationCompany)
    {
        $this->relationCompany = $relationCompany;
        return $this;
    }
}
