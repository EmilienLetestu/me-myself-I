<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 16:55
 */

namespace App\Entity;


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


    public function getId(): int
    {
        return $this->id;
    }


    public function getFullName(): string
    {
        return $this->fullName;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }


    public function getContactedOn(): \DateTime
    {
        return $this->contactedOn;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}