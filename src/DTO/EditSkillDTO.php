<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 19:09
 */

namespace App\DTO;


class EditSkillDTO
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $level;

    /**
     * EditSkillDTO constructor.
     * @param string $name
     * @param int $level
     */
    public function __construct(
        string $name,
        int    $level
    )
    {
        $this->name  = $name;
        $this->level = $level;
    }
}