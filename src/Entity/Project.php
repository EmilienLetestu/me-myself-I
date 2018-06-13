<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 10:25
 */

namespace App\Entity;

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
    private $tech;

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
     * @param string $tech
     */
    public function setTech(string $tech) :void
    {
        $this->tech = $tech;
    }

    /**
     * @return null|string
     */
    public function getTech() :?string
    {
        return $this->tech;
    }
}
