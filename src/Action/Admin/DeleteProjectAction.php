<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 09:42
 */

namespace App\Action\Admin;


use App\Entity\Project;
use App\Manager\ProjectManager;
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
     * @var FileService
     */
    private $fileService;

    private $projectManager;

    /**
     * DeleteProjectAction constructor.
     * @param EntityManagerInterface $doctrine
     * @param FileService $fileService
     * @param ProjectManager $projectManager
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        FileService            $fileService,
        ProjectManager         $projectManager
    )
    {
        $this->doctrine            = $doctrine;
        $this->fileService         = $fileService;
        $this->projectManager      = $projectManager;

    }


    /**
     * @param Request $request
     * @param DeleteProjectResponder $responder
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     *  * @Route(
     *     "admin/delete/project/{id}",
     *     name = "deleteProject",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function __invoke(Request $request, DeleteProjectResponder $responder)
    {
        return $responder(
            $this->projectManager->deleteProject(
                $this->doctrine, $request->get('id'), $this->fileService)
        );
    }


}
