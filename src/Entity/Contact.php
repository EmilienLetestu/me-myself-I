<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 16:55
 */

namespace App\Entity;

/**
 * Class Contact
 * @package App\Entity
 */
class Contact
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $fullName;

    /**
     * @var
     */
    private $email;

    /**
     * @var
     */
    private $subject;

    /**
     * @var
     */
    private $contactedOn;

    /**
     * @var
     */
    private $message;

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @param string $format
     */
    public function setContactedOn(string $format): void
    {
        $this->contactedOn = new \DateTime(date($format));
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return \DateTime
     */
    public function getContactedOn(): \DateTime
    {
        return $this->contactedOn;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}