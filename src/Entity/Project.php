<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 10:25
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

class Project
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $addedOn;

    /**
     * @var
     */
    private $pictRef;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $techs;

    /**
     * @return int
     */
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) :void
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getName() :?string
    {
        return $this->name;
    }

    /**
     * @param string $format
     */
    public function setAddedOn(string $format) :void
    {
        $this->addedOn = new \DateTime(date($format));
    }


    /**
     * @return \DateTime|null
     */
    public function getAddedOn() :?\DateTime
    {
        return $this->addedOn;
    }

    /**
     * @param mixed $pictRef
     */
    public function setPictRef(string $pictRef) :void
    {
        $this->pictRef = $pictRef;
    }

    /**
     * @return null|string
     */
    public function getPictRef() :?string
    {
        return $this->pictRef;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(string $description) :void
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getDescription() :?string
    {
        return $this->description;
    }

    /**
     * Project constructor.
     */
    public function __construct()
    {
        $this->techs = new ArrayCollection();
    }

    /**
     * @param Tech $tech
     */
    public function addTech(Tech $tech)
    {
        $this->techs[] = $tech;
    }

    /**
     * @param Tech $tech
     */
    public function removeTech(Tech $tech)
    {
        $this->techs->removeElement($tech);
    }

    /**
     * @return ArrayCollection
     */
    public function getTechs() :ArrayCollection
    {
        return $this->techs;
    }

}
