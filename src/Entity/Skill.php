<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 10:17
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Skill
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
    private $level;

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
     * @param int $level
     */
    public function setLevel(int $level) :void
    {
        $this->level = $level;
    }

    /**
     * @return int|null
     */
    public function getLevel() :?int
    {
        return $this->level;
    }

}
