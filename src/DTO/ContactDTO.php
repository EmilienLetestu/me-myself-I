<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 10:14
 */

namespace App\DTO;


class ContactDTO
{

    /**
     * @var string
     */
    public $fullName;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;

    /**
     * ContactDTO constructor.
     * @param string $fullName
     * @param string $email
     * @param string $subject
     * @param string $message
     */
    public function __construct(
        string $fullName,
        string $email,
        string $subject,
        string $message
    )
    {
        $this->fullName = $fullName;
        $this->email    = $email;
        $this->subject  = $subject;
        $this->message  = $message;
    }
}
