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
     * Project constructor.
     * @param string $name
     * @param string $addedOn
     * @param string $pictRef
     * @param string $description
     * @param string $link
     * @param Tech $techs
     */
    public function __construct(
        string $name,
        string $addedOn,
        string $pictRef,
        string $description,
        string $link,
        ArrayCollection $techs
    )
    {
        $this->name = $name;
        $this->addedOn = new \DateTime(date($addedOn));
        $this->pictRef = $pictRef;
        $this->description = $description;
        $this->link = $link;
        $this->techs = $techs;
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

    /**
     * @return ArrayCollection
     */
    public function getTechs() :ArrayCollection
    {
         return $this->techs;
    }

    /**
     * @param Tech $tech
     */
    public function addTech(Tech $tech)
    {
        $this->techs = $tech;
    }
}
