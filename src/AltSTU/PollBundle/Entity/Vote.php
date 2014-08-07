<?php
namespace AltSTU\PollBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="vote")
 */
class Vote
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="QOption", inversedBy="votes")
     * @ORM\JoinColumn(name="qoption_id", referencedColumnName="id")
     */
    private $qoption;
	
	/**
	 * @var datetime $created
	 *
	 * @ORM\Column(name="created", type="datetime")
	 * @Gedmo\Timestampable(on="create")
	 */
	private $created;


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
     * Set qoption
     *
     * @param \AltSTU\PollBundle\Entity\QOption $qoption
     * @return Vote
     */
    public function setQoption(\AltSTU\PollBundle\Entity\QOption $qoption = null)
    {
        $this->qoption = $qoption;
    
        return $this;
    }

    /**
     * Get qoption
     *
     * @return \AltSTU\PollBundle\Entity\QOption 
     */
    public function getQoption()
    {
        return $this->qoption;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Vote
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
}
