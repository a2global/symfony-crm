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
	private $title;
	
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
}