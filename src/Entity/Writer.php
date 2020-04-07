<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="writers")
 */
class Writer
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
	private $firstName;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $lastName;
	
	public function getId()
	{
		return $this->id;
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
}