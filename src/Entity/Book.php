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
	private $pages;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $genre;

	public function getId()
	{
		return $this->id;
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

	public function getPages()
	{
		return $this->pages;
	}
	
	public function setPages($value): self
	{
		$this->pages = $value;
	
		return $this;
	}

	public function getGenre()
	{
		return $this->genre;
	}
	
	public function setGenre($value): self
	{
		$this->genre = $value;
	
		return $this;
	}

	public function __toString()
	{
		return sprintf('%s #%s', 'Book', $this->getId());
	}
}