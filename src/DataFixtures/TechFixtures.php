<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 28/06/2018
 * Time: 09:17
 */

namespace App\DataFixtures;


use App\Entity\Tech;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TechFixtures extends Fixture
{
    public const TECH_REFERENCE = 'tech';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $tech = new Tech();
        $tech->setName('Symfony 4');
        $manager->persist($tech);
        $manager->flush();

        $this->addReference(self::TECH_REFERENCE, $tech);

    }
}
