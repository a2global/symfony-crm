<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="boogs")
 */
class Boog
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
	private $title;
	
	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/
	private $about;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($value): self
	{
		$this->title = $value;
	
		return $this;
	}
	
	public function getAbout()
	{
		return $this->about;
	}
	
	public function setAbout($value): self
	{
		$this->about = $value;
	
		return $this;
	}
}