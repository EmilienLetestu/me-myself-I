<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 10:39
 */

namespace App\Entity;

/**
 * Class Tech
 * @package App\Entity
 */
class Tech
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
     * @param string $name
     */
    public function setName(string $name) :void
    {
        $this->name = $name;
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
}
