<?php
namespace AltSTU\PollBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="question")
 */
class Question
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $title;

	/**
     * @ORM\Column(type="string", length=300)
     */
    protected $text;

	/**
     * @ORM\OneToMany(targetEntity="QOption", mappedBy="question")
     */
    protected $qoptions;

    public function __construct()
    {
        $this->qoptions = new ArrayCollection();
    }
	
	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Question
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
     * @return Question
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
     * Add qoptions
     *
     * @param \AltSTU\PollBundle\Entity\QOption $qoptions
     * @return Question
     */
    public function addQoption(\AltSTU\PollBundle\Entity\QOption $qoptions)
    {
        $this->qoptions[] = $qoptions;
    
        return $this;
    }

    /**
     * Remove qoptions
     *
     * @param \AltSTU\PollBundle\Entity\QOption $qoptions
     */
    public function removeQoption(\AltSTU\PollBundle\Entity\QOption $qoptions)
    {
        $this->qoptions->removeElement($qoptions);
    }

    /**
     * Get qoptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQoptions()
    {
        return $this->qoptions;
    }
}
