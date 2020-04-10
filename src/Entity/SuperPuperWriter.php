<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="super_puper_writers")
 */
class SuperPuperWriter
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
	private $writer;

	public function getId()
	{
		return $this->id;
	}

	public function getWriter()
	{
		return $this->writer;
	}
	
	public function setWriter($value): self
	{
		$this->writer = $value;
	
		return $this;
	}

	public function __toString()
	{
		return sprintf('%s #%s', 'Super puper writer', $this->getId());
	}
}