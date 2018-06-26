<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 08:30
 */

namespace App\Tests\Entity;


use App\Entity\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{

    public function testProject(): void
    {
        $project = new Project();

        $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempor tortor id 
        sapien scelerisque, at interdum ipsum sodales. Integer consequat, odio sed aliquam dapibus, elit leo 
        lobortis libero, et sagittis nisl urna sit amet arcu.';


        $project->setName('test');
        $project->setDescription($description);
        $project->setLink('https://symfony.com/doc/current/testing.html');
        $project->setAddedOn('Y-m-d');
        $project->setPictRef($project->getName().'_pict.png');

        $this->assertEquals('test', $project->getName());
        $this->assertEquals($description, $project->getDescription());
        $this->assertEquals('https://symfony.com/doc/current/testing.html', $project->getLink());
        $this->assertEquals(new \DateTime(date('Y-m-d')), $project->getAddedOn());
        $this->assertEquals('test_pict.png', $project->getPictRef());
    }
}