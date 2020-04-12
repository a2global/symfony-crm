<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="books")
 */
class Book
{
	const GENRE_CHOICES = [
		'Fantasy',
		'Detective',
	];

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
	private $bestseller;

	/**
	 * @ORM\ManyToOne(targetEntity="Writer")
	 * @ORM\JoinColumn(name="writer_id", referencedColumnName="id")
	 */
	private $author;

	/**
	 * @ORM\Column(type="date", nullable=true)
	 */
	private $publishedAt;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $genre;

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

	public function getBestseller()
	{
		return $this->bestseller;
	}
	
	public function setBestseller($value): self
	{
		$this->bestseller = $value;
	
		return $this;
	}

	public function getAuthor()
	{
		return $this->author;
	}
	
	public function setAuthor($value): self
	{
		$this->author = $value;
	
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