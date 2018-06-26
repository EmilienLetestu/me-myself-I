<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 08:59
 */

namespace App\Tests\Entity;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testContact(): void
    {
        $contact = new Contact();

        $message = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempor tortor id sapien scelerisque, 
        at interdum ipsum sodales. Integer consequat, odio sed aliquam dapibus, elit leo lobortis libero, 
        et sagittis nisl urna sit amet arcu.';

        $contact->setEmail('test.contact@gmail.com');
        $contact->setSubject('unit test');
        $contact->setContactedOn('Y-m-d');
        $contact->setFullName('Toto LeToucan');
        $contact->setMessage($message);

        $this->assertEquals('test.contact@gmail.com', $contact->getEmail());
        $this->assertEquals('unit test', $contact->getSubject());
        $this->assertEquals(new \DateTime(date('Y-m-d')), $contact->getContactedOn());
        $this->assertEquals('Toto LeToucan', $contact->getFullName());
        $this->assertEquals($message, $contact->getMessage());

    }
}