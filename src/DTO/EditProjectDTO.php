<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 21:18
 */

namespace App\DTO;

use Doctrine\Common\Collections\ArrayCollection;

class EditProjectDTO
{
    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $addedOn;

    /**
     * @var
     */
    public $pictRef;

    /**
     * @var
     */
    public $description;

    /**
     * @var
     */
    public $techs;

    /**
     * @var
     */
    public $link;

    public $publish;

    /**
     * EditProjectDTO constructor.
     * @param string $name
     * @param string $description
     * @param string $link
     * @param ArrayCollection $techs
     * @param bool $publish
     */
    public function __construct(
        string $name,
        string $description,
        string $link,
        ArrayCollection $techs,
        bool $publish
    )
    {
        $this->name        = $name;
        $this->description = $description;
        $this->link        = $link;
        $this->techs       = $techs;
        $this->publish     = $publish;
    }

}
