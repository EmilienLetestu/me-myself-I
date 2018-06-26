<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 08:49
 */

namespace App\Tests\Entity;


use App\Entity\Skill;
use PHPUnit\Framework\TestCase;

class SkillTest extends TestCase
{
    public function testSkill(): void
    {
        $skill = new Skill();

        $skill->setName('PHP');
        $skill->setLevel(80);

        $this->assertEquals('PHP', $skill->getName());
        $this->assertEquals(80, $skill->getLevel());
    }
}