<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 28/06/2018
 * Time: 09:48
 */

namespace App\DataFixtures;


use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var string
     */
    private $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed maximus velit justo, non eleifend enim';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++)
        {
            $project = new Project();
            $project->setName('project'.$i);
            $project->setPictRef($project->getName().'_pict.png');
            $project->setAddedOn('Y-m-d');
            $project->setLink('https://github.com/EmilienLetestu');
            $project->setDescription($this->description);

            $project->addTech($this->getReference(TechFixtures::TECH_REFERENCE));
            $manager->persist($project);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
       return [TechFixtures::class] ;
    }
}
