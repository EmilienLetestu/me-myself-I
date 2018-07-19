<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/07/2018
 * Time: 13:05
 */

namespace App\Action\Admin;


use App\Manager\ProjectManager;
use App\Responder\Admin\UpdateProjectStatusResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateProjectStatusAction
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var
     */
    private $projectManager;

    /**
     * UpdateProjectStatusAction constructor.
     * @param EntityManagerInterface $doctrine
     * @param ProjectManager $projectManager
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        ProjectManager         $projectManager
    )
    {
        $this->doctrine       = $doctrine;
        $this->projectManager = $projectManager;
    }

    /**
     * @param Request $request
     * @param UpdateProjectStatusResponder $responder
     * @return Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @Route(
     *     "admin/update/project-status/{id}",
     *     name = "updateStatus",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function __invoke(Request $request, UpdateProjectStatusResponder $responder): Response
    {
        return $responder(
            $this->projectManager
                ->updatePublicationStatus($this->doctrine, $request->get('id'))
        );
    }
}