<?php
namespace AltSTU\PollBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="qoption")
 */
class QOption
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="qoptions")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;

	/**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="qoption")
     */
    protected $votes;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $numv;

    public function __construct()
    {
        $this->votes = new ArrayCollection();
    }

    public function incNumv()
    {
        $this->numv = $this->numv + 1;
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
     * Set text
     *
     * @param string $text
     * @return QOption
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
     * Set question
     *
     * @param \AltSTU\PollBundle\Entity\Question $question
     * @return QOption
     */
    public function setQuestion(\AltSTU\PollBundle\Entity\Question $question = null)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return \AltSTU\PollBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Add votes
     *
     * @param \AltSTU\PollBundle\Entity\Vote $votes
     * @return QOption
     */
    public function addVote(\AltSTU\PollBundle\Entity\Vote $votes)
    {
        $this->votes[] = $votes;
    
        return $this;
    }

    /**
     * Remove votes
     *
     * @param \AltSTU\PollBundle\Entity\Vote $votes
     */
    public function removeVote(\AltSTU\PollBundle\Entity\Vote $votes)
    {
        $this->votes->removeElement($votes);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set numv
     *
     * @param integer $numv
     * @return QOption
     */
    public function setNumv($numv)
    {
        $this->numv = $numv;

        return $this;
    }

    /**
     * Get numv
     *
     * @return integer 
     */
    public function getNumv()
    {
        return $this->numv;
    }
}
