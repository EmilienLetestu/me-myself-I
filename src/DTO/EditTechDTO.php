<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 18:10
 */

namespace App\DTO;


class EditTechDTO
{
    /**
     * @var string
     */
    public $name;

    /**
     * EditTechDTO constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

}