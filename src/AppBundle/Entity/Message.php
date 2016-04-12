<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

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
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    /**
     * @var datetime
     *
     * @ORM\Column(name="createtime", type="datetime")
     */
    private $createtime;

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

//    /**
//     * @Vich\UploadableField(mapping="upload_image", fileNameProperty="imageName")
//     * @Assert\File( maxSize="2M", mimeTypes={"image/png", "image/jpeg", "image/gif"} )
//     * @var File
//     */
//    private $image;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="imageName", type="string", length=255, nullable=true)
//     */
//    private $imageName;



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
     * @param string $user
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
     * @return string
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
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return Message
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
     * @return Message
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

//    public function setImage(File $image = null)
//    {
//        $this->image = $image;
//    }
//
//    public function getImage()
//    {
//        return $this->image;
//    }

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

