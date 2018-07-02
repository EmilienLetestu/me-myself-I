<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 28/06/2018
 * Time: 09:33
 */

namespace App\DataFixtures;


use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    /**
     * @var string
     */
    private $message =  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies libero orci, 
    vitae imperdiet est scelerisque id. Nulla a porta mauris. Aenean in ipsum euismod.';

    /**
     * @var string
     */
    private $subject = 'test';

    /**
     * @var string
     */
    private $fullName = 'Toto Letoucan';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++)
        {
            $contact = new Contact();
            $contact->setMessage($this->message);
            $contact->setFullName($this->fullName);
            $contact->setSubject($this->subject.$i);
            $contact->setEmail('toto'.$i.'@gmail.com');
            $contact->setContactedOn('Y-m-d');

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
