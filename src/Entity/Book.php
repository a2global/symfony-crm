<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="books")
 */
class Book
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
	private $aaa;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $cc;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $bbbb;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getAaa()
	{
		return $this->aaa;
	}
	
	public function setAaa($value): self
	{
		$this->aaa = $value;
	
		return $this;
	}
	
	public function getCc()
	{
		return $this->cc;
	}
	
	public function setCc($value): self
	{
		$this->cc = $value;
	
		return $this;
	}
	
	public function getBbbb()
	{
		return $this->bbbb;
	}
	
	public function setBbbb($value): self
	{
		$this->bbbb = $value;
	
		return $this;
	}
}