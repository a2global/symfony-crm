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

	/**
	 * @ORM\Column(type="boolean", nullable=true)
	 */
	private $isBestseller;

	/**
	 * @ORM\Column(type="date", nullable=true)
	 */
	private $publishedAt;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $aaaa;

	const ASD_CHOICES = [
		'11',
		'22',
		'33',
	];
	
	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $asd;

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

	public function getIsBestseller()
	{
		return $this->isBestseller;
	}
	
	public function setIsBestseller($value): self
	{
		$this->isBestseller = $value;
	
		return $this;
	}

	public function getPublishedAt()
	{
		return $this->publishedAt;
	}
	
	public function setPublishedAt($value): self
	{
		$this->publishedAt = $value;
	
		return $this;
	}

	public function getAaaa()
	{
		return $this->aaaa;
	}
	
	public function setAaaa($value): self
	{
		$this->aaaa = $value;
	
		return $this;
	}

	public function getAsd()
	{
		return $this->asd;
	}
	
	public function setAsd($value): self
	{
		$this->asd = $value;
	
		return $this;
	}

	public function __toString()
	{
		return sprintf('%s #%s', 'Book', $this->getId());
	}
}