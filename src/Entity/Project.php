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
     * @var
     */
    private $link;

    /**
     * @param string $name
     */
    public function setName(string $name) :void
    {
        $this->name = $name;
    }

    /**
     * @param string $addedOn
     */
    public function setAddedOn(string $addedOn): void
    {
        $this->addedOn = new \DateTime(date($addedOn));
    }

    /**
     * @param string $pictRef
     */
    public function setPictRef(string $pictRef): void
    {
        $this->pictRef = $pictRef;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return int
     */
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getName() :?string
    {
        return $this->name;
    }

    /**
     * @return \DateTime|null
     */
    public function getAddedOn() :?\DateTime
    {
        return $this->addedOn;
    }

    /**
     * @return null|string
     */
    public function getPictRef() :?string
    {
        return $this->pictRef;
    }

    /**
     * @return null|string
     */
    public function getDescription() :?string
    {
        return $this->description;
    }

    /**
     * @return null|string
     */
    public function getLink() :?string
    {
        return $this->link;
    }

    public function __construct()
    {
        $this->techs = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getTechs()
    {
         return $this->techs;
    }

    /**
     * @param Tech $tech
     * @return $this
     */
    public function addTech(Tech $tech)
    {
        $this->techs[] = $tech;

        return $this;
    }
}
