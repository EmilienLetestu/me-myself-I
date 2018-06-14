<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 19:02
 */

namespace App\Builder;


use App\Entity\Skill;

class SkillBuilder
{
    /**
     * @var
     */
    private $skill;

    /**
     * @param string $name
     * @param int $level
     * @return SkillBuilder
     */
    public function edit(string $name, int $level) :self
    {
        $this->skill = new Skill($name, $level);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkill() :Skill
    {
        return $this->skill;
    }


}