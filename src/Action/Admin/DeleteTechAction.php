<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 09:22
 */

namespace App\Action\Admin;

use App\Manager\TechManager;
use App\Responder\Admin\DeleteTechResponder;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteTechAction
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    private $techManager;


    /**
     * DeleteTechAction constructor.
     * @param EntityManagerInterface $doctrine
     * @param TechManager $techManager
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        TechManager            $techManager

    )
    {
        $this->doctrine     = $doctrine;
        $this->techManager  = $techManager;
    }

    /**
     * @param Request $request
     * @param DeleteTechResponder $responder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @Route(
     *     "admin/delete/tech/{id}",
     *     name = "deleteTech",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function __invoke(Request $request, DeleteTechResponder $responder): Response
    {
        return $responder(
           $this->techManager->deleteTech(
               $this->doctrine, $request->get('id')
           )
        );
    }
}
