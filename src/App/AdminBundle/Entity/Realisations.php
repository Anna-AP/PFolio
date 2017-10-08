<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Realisations
 *
 * @ORM\Table(name="realisations")
 * @ORM\Entity(repositoryClass="App\AdminBundle\Repository\RealisationsRepository")
 */
class Realisations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="image_un", type="string", length=255)
     */
    private $imageUn;

    /**
     * @var string
     *
     * @ORM\Column(name="image_deux", type="string", length=255, nullable=true)
     */
    private $imageDeux;

    /**
     * @var string
     *
     * @ORM\Column(name="image_trois", type="string", length=255, nullable=true)
     */
    private $imageTrois;

    /**
     * @var string
     *
     * @ORM\Column(name="image_quatre", type="string", length=255, nullable=true)
     */
    private $imageQuatre;

    /**
     * @var string
     *
     * @ORM\Column(name="image_cinq", type="string", length=255, nullable=true)
     */
    private $imageCinq;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text")
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="publish", type="integer")
     */
    private $publish;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     */
    private $deleted;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Realisations
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Realisations
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Realisations
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set imageUn
     *
     * @param string $imageUn
     *
     * @return Realisations
     */
    public function setImageUn($imageUn)
    {
        $this->imageUn = $imageUn;

        return $this;
    }

    /**
     * Get imageUn
     *
     * @return string
     */
    public function getImageUn()
    {
        return $this->imageUn;
    }

    /**
     * Set imageDeux
     *
     * @param string $imageDeux
     *
     * @return Realisations
     */
    public function setImageDeux($imageDeux)
    {
        $this->imageDeux = $imageDeux;

        return $this;
    }

    /**
     * Get imageDeux
     *
     * @return string
     */
    public function getImageDeux()
    {
        return $this->imageDeux;
    }

    /**
     * Set imageTrois
     *
     * @param string $imageTrois
     *
     * @return Realisations
     */
    public function setImageTrois($imageTrois)
    {
        $this->imageTrois = $imageTrois;

        return $this;
    }

    /**
     * Get imageTrois
     *
     * @return string
     */
    public function getImageTrois()
    {
        return $this->imageTrois;
    }

    /**
     * Set imageQuatre
     *
     * @param string $imageQuatre
     *
     * @return Realisations
     */
    public function setImageQuatre($imageQuatre)
    {
        $this->imageQuatre = $imageQuatre;

        return $this;
    }

    /**
     * Get imageQuatre
     *
     * @return string
     */
    public function getImageQuatre()
    {
        return $this->imageQuatre;
    }

    /**
     * Set imageCinq
     *
     * @param string $imageCinq
     *
     * @return Realisations
     */
    public function setImageCinq($imageCinq)
    {
        $this->imageCinq = $imageCinq;

        return $this;
    }

    /**
     * Get imageCinq
     *
     * @return string
     */
    public function getImageCinq()
    {
        return $this->imageCinq;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Realisations
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set publish
     *
     * @param integer $publish
     *
     * @return Realisations
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;

        return $this;
    }

    /**
     * Get publish
     *
     * @return integer
     */
    public function getPublish()
    {
        return $this->publish;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Realisations
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Realisations
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return Realisations
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return \DateTime
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}

