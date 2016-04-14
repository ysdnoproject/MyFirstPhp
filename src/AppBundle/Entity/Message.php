<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 * @Vich\Uploadable
 */
class Message
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
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * Many-To-One, Unidirectional
     *
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var datetime
     *
     * @ORM\Column(name="createtime", type="datetime")
     */
    private $createtime;

    /**
     * One-To-Many, Unidirectional
     *
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserFile", mappedBy="message", cascade={"persist"})
     */
    private $file;

    public function __construct()
    {
        $this->file = new ArrayCollection();
    }

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
     * Set content
     *
     * @param string $content
     *
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Message
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set createtime
     *
     * @param datetime $createtime
     *
     * @return Message
     */
    public function setCreatetime($createtime)
    {
        $this->createtime = $createtime;

        return $this;
    }

    /**
     * Get createtime
     *
     * @return datetime
     */
    public function getCreatetime()
    {
        return $this->createtime;
    }

    /**
     * Set file
     *
     * @param ArrayCollection $file
     *
     * @return Message
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return ArrayCollection
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Message
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }
}

