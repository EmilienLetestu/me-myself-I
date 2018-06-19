<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 16:00
 */

namespace App\Service;


use App\Entity\Contact;
use Twig\Environment;

class ContactMailService
{
    /***
     * @var Environment
     */
    private $twig;

    /**
     * ContactMail constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @param Contact $contact
     * @return \Swift_Message
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function contactMail(Contact $contact) :\Swift_Message
    {
        $message = (new \Swift_Message('Contact Email'))
            ->setFrom($contact->getEmail())
            ->setTo('contact@emilien-letestu.fr')
            ->setSubject($contact->getSubject())
            ->setBody(
                $this->twig->render('email/contactEmail.html.twig',[
                    'fullName' => $contact->getFullName(),
                    'email'    => $contact->getEmail(),
                    'date'     => $contact->getContactedOn(),
                    'message'  => $contact->getMessage()
                ]),
                'text/html'
            );

        return $message;
    }
}