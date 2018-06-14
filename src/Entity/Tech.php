<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 10:39
 */

namespace App\Entity;


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

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
