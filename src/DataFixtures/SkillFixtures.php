<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 28/06/2018
 * Time: 09:26
 */

namespace App\DataFixtures;


use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    /**
     * @var array
     */
    private $skills = [
        'PHP' => 80,
        'JavaScript' => 70,
        'Symfony' => 70,
        'MySql' => 70
    ];


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        foreach ($this->skills as $key=>$value)
        {
            $skill = new Skill();
            $skill->setName($key);
            $skill->setLevel($value);

            $manager->persist($skill);
        }

        $manager->flush();
    }
}
