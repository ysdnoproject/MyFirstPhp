<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * UserFile
 *
 * @ORM\Table(name="user_file")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserFileRepository")
 * @Vich\Uploadable
 */
class UserFile
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
     * Many-To-One, Unidirectional
     *
     * @var Message
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Message")
     * @ORM\JoinColumn(name="message_id", referencedColumnName="id")
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="mimeType", type="string", length=255, nullable=true)
     */
    private $mimeType;

    /**
     * @Vich\UploadableField(mapping="upload_file", fileNameProperty="fileName")
     * @Assert\File( maxSize="10M", mimeTypes={"application/pdf", "application/zip", "image/png", "image/jpeg", "image/gif"} )
     * @var File
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="fileName", type="string", length=255, nullable=true)
     */
    private $fileName;


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
     * Set message
     *
     * @param Message $message
     *
     * @return UserFile
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return UserFile
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    public function setFile(File $file = null)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set fileName
     *
     * @param string $fileName
     *
     * @return UserFile
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }
}

