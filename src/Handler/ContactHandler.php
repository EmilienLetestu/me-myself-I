<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 16:29
 */

namespace App\Handler;


use App\Entity\Contact;
use App\Handler\Interfaces\ContactHandlerInterface;
use App\Service\ContactMailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class ContactHandler implements ContactHandlerInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var ContactMailService
     */
    private $mailService;

    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var Contact
     */
    private $contact;


    /**
     * ContactHandler constructor.
     * @param \Swift_Mailer $mailer
     * @param ContactMailService $mailService
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(
        \Swift_Mailer          $mailer,
        ContactMailService     $mailService,
        EntityManagerInterface $doctrine
    )
    {
        $this->mailer      = $mailer;
        $this->mailService = $mailService;
        $this->contact     = new Contact();
        $this->doctrine    = $doctrine;
    }

    /**
     * @param FormInterface $form
     * @return bool
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handle(FormInterface $form): bool
    {
       if($form->isSubmitted() && $form->isValid())
       {
           $this->contact->setFullName($form->get('fullName')->getData());
           $this->contact->setEmail($form->get('email')->getData());
           $this->contact->setSubject($form->get('subject')->getData());
           $this->contact->setMessage($form->get('message')->getData());
           $this->contact->setContactedOn('Y-m-d');

           $this->doctrine->persist($this->contact);

           $this->mailer->send(
               $this->mailService->contactMail($this->contact)
           );

           $this->doctrine->flush();

           return true;
       }

       return false;
    }

}
