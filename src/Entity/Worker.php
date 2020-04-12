<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkerRepository")
 * @ORM\Table(name="workers")
 */
class Worker
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $gender;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $addressRegistration;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $addressCzech;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $phone;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $idProvider;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $nationality;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $citizenship;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $visa;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $education;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $invitation;
	
	/**
	* @ORM\Column(type="boolean", nullable=true)
	*/
	private $activity;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $attachment;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $informationVasya;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $createdBy;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $firstName;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $lastName;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $idCode;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $idNumber;
	
	/**
	* @ORM\Column(type="date", nullable=true)
	*/
	private $birthday;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $details;
	
	public function getId(): ?int
	{
		return $this->id;
	}
	
	public function getGender()
	{
		return $this->gender;
	}
	
	public function setGender($value): self
	{
		$this->gender = $value;
	
		return $this;
	}
	
	public function getAddressRegistration()
	{
		return $this->addressRegistration;
	}
	
	public function setAddressRegistration($value): self
	{
		$this->addressRegistration = $value;
	
		return $this;
	}
	
	public function getAddressCzech()
	{
		return $this->addressCzech;
	}
	
	public function setAddressCzech($value): self
	{
		$this->addressCzech = $value;
	
		return $this;
	}
	
	public function getPhone()
	{
		return $this->phone;
	}
	
	public function setPhone($value): self
	{
		$this->phone = $value;
	
		return $this;
	}
	
	public function getIdProvider()
	{
		return $this->idProvider;
	}
	
	public function setIdProvider($value): self
	{
		$this->idProvider = $value;
	
		return $this;
	}
	
	public function getNationality()
	{
		return $this->nationality;
	}
	
	public function setNationality($value): self
	{
		$this->nationality = $value;
	
		return $this;
	}
	
	public function getCitizenship()
	{
		return $this->citizenship;
	}
	
	public function setCitizenship($value): self
	{
		$this->citizenship = $value;
	
		return $this;
	}
	
	public function getVisa()
	{
		return $this->visa;
	}
	
	public function setVisa($value): self
	{
		$this->visa = $value;
	
		return $this;
	}
	
	public function getEducation()
	{
		return $this->education;
	}
	
	public function setEducation($value): self
	{
		$this->education = $value;
	
		return $this;
	}
	
	public function getInvitation()
	{
		return $this->invitation;
	}
	
	public function setInvitation($value): self
	{
		$this->invitation = $value;
	
		return $this;
	}
	
	public function getActivity()
	{
		return $this->activity;
	}
	
	public function setActivity($value): self
	{
		$this->activity = $value;
	
		return $this;
	}
	
	public function getAttachment()
	{
		return $this->attachment;
	}
	
	public function setAttachment($value): self
	{
		$this->attachment = $value;
	
		return $this;
	}
	
	public function getInformationVasya()
	{
		return $this->informationVasya;
	}
	
	public function setInformationVasya($value): self
	{
		$this->informationVasya = $value;
	
		return $this;
	}
	
	public function getCreatedBy()
	{
		return $this->createdBy;
	}
	
	public function setCreatedBy($value): self
	{
		$this->createdBy = $value;
	
		return $this;
	}
	
	public function getFirstName()
	{
		return $this->firstName;
	}
	
	public function setFirstName($value): self
	{
		$this->firstName = $value;
	
		return $this;
	}
	
	public function getLastName()
	{
		return $this->lastName;
	}
	
	public function setLastName($value): self
	{
		$this->lastName = $value;
	
		return $this;
	}
	
	public function getIdCode()
	{
		return $this->idCode;
	}
	
	public function setIdCode($value): self
	{
		$this->idCode = $value;
	
		return $this;
	}
	
	public function getIdNumber()
	{
		return $this->idNumber;
	}
	
	public function setIdNumber($value): self
	{
		$this->idNumber = $value;
	
		return $this;
	}
	
	public function getBirthday()
	{
		return $this->birthday;
	}
	
	public function setBirthday($value): self
	{
		$this->birthday = $value;
	
		return $this;
	}
	
	public function getDetails()
	{
		return $this->details;
	}
	
	public function setDetails($value): self
	{
		$this->details = $value;
	
		return $this;
	}

	public function __toString()
	{
		return 'Worker #' . $this->getId();
	}
}