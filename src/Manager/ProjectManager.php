<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/07/2018
 * Time: 18:16
 */

namespace App\Manager;


use App\Entity\Project;
use App\Service\FileService;
use Doctrine\ORM\EntityManagerInterface;
class ProjectManager
{

    /**
     * @param EntityManagerInterface $doctrine
     * @param int $id
     * @param FileService $fileService
     * @return string
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function deleteProject(EntityManagerInterface $doctrine, int $id, FileService $fileService): string
    {
        $project = $doctrine->getRepository(Project::class)
            ->findProjectWithId($id)
        ;

        if(!$project)
        {
            return 'Aucune correpondance trouvée';
        }


        $fileService->eraseFile($project->getPictRef());

        $doctrine->remove($project);
        $doctrine->flush();

        return 'Projet supprimé avec succès';

    }

    /**
     * @param EntityManagerInterface $doctrine
     * @param int $id
     * @return string
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function updatePublicationStatus(EntityManagerInterface $doctrine, int $id): string
    {
        $project = $doctrine->getRepository(Project::class)
            ->findProjectWithId($id)
        ;

        if(!$project)
        {
            return 'Aucune correpondance trouvée';
        }

        //var_dump($project->getPublish()); die();

        $project->getPublish() === true ?
            $project->setPublish(false) : $project->setPublish(true)
        ;

        $doctrine->flush();

        return $project->getPublish() === true ?
            'Projet publié' : 'Publication retirée'
        ;
    }



}