<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 09:22
 */

namespace App\Action\Admin;

use App\Entity\Tech;
use App\Responder\Admin\DeleteTechResponder;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class DeleteTechAction
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
     * DeleteTechAction constructor.
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
    public function __invoke(Request $request, DeleteTechResponder $responder)
    {
        $tech = $this->doctrine->getRepository(Tech::class)
            ->findTechWithId($request->get('id'))
        ;

        $this->doctrine->remove($tech);
        $this->doctrine->flush();

        $this->session->getFlashBag()
            ->add('success', 'techno supprimée avec suuccès')
        ;

        return $responder(
            $this->urlGenerator->generate('adminDashboard')
        );
    }
}
