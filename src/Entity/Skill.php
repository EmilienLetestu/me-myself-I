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
     * Skill constructor.
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
