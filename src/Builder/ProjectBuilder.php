<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 21:12
 */

namespace App\Builder;


use App\Entity\Project;
use App\Entity\Tech;
use Doctrine\Common\Collections\ArrayCollection;

class ProjectBuilder
{
    /**
     * @var
     */
    private $project;

    /**
     * @param string $name
     * @param string $addedOn
     * @param string $pictRef
     * @param string $description
     * @param ArrayCollection $techs
     * @param string $link
     * @return ProjectBuilder
     */
    public function edit(string $name, string $addedOn, string $pictRef, string $description, string $link, ArrayCollection $techs) :self
    {
        $this->project = new Project($name, $addedOn, $pictRef, $description, $link, $techs);

        return $this;
    }

    /**
     * @return Project
     */
    public function getProject() :Project
    {
        return $this->project;
    }
}