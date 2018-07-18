<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 09:42
 */

namespace App\Action\Admin;


use App\Entity\Project;
use App\Responder\Admin\DeleteProjectResponder;
use App\Service\FileService;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class DeleteProjectAction
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
     * @var FileService
     */
    private $fileService;

    /**
     * DeleteProjectAction constructor.
     * @param EntityManagerInterface $doctrine
     * @param SessionInterface $session
     * @param UrlGeneratorInterface $urlGenerator
     * @param FileService $fileService
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        SessionInterface       $session,
        UrlGeneratorInterface  $urlGenerator,
        FileService            $fileService
    )
    {
        $this->doctrine            = $doctrine;
        $this->session             = $session;
        $this->urlGenerator        = $urlGenerator;
        $this->fileService         = $fileService;
    }


    /**
     * @param Request $request
     * @param DeleteProjectResponder $responder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @Route(
     *     "admin/delete/project/{id}",
     *     name = "deleteProject",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function __invoke(Request $request, DeleteProjectResponder $responder)
    {
        $project = $this->doctrine->getRepository(Project::class)
            ->findProjectWithId($request->get('id'))
        ;

        $this->fileService->eraseFile($project->getPictRef());

        $this->doctrine->remove($project);
        $this->doctrine->flush();

        $this->session->getFlashBag()
            ->add('success','Projet supprimé avec succès')
        ;

        return $responder(
            $this->urlGenerator->generate('adminDashboard')
        );
    }


}
