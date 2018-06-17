<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 21:45
 */

namespace App\Action\Admin;


use App\Entity\Skill;
use App\Responder\Admin\DeleteSkillResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class DeleteSkillAction
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * DeleteSkillAction constructor.
     * @param EntityManagerInterface $doctrine
     * @param SessionInterface $session
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        SessionInterface       $session,
        UrlGeneratorInterface  $urlGenerator
    )
    {
        $this->doctrine     = $doctrine;
        $this->session      = $session;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param Request $request
     * @param DeleteSkillResponder $responder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route(
     *     "/delete/skill/{id}",
     *     name = "deleteSkill",
     *     requirements={"id"="\d+"}
     * )
     */
    public function __invoke(Request $request, DeleteSkillResponder $responder)
    {
       $skill = $this->doctrine->getRepository(Skill::class)
            ->findSkillWithId($request->get('id'))
       ;

       $this->doctrine->remove($skill);
       $this->doctrine->flush();

       $this->session->getFlashBag()
        ->add('success','Compétence supprimé avec succès')
       ;

       return $responder(
           $this->urlGenerator->generate("home")
       );
    }
}
