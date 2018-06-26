<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 08:56
 */

namespace App\Tests\Entity;


use App\Entity\Tech;
use PHPUnit\Framework\TestCase;

class TechTest extends TestCase
{
    public function testTech(): void
    {
        $tech = new Tech();

        $tech->setName('Symfony 4.1');

        $this->assertEquals('Symfony 4.1', $tech->getName());
    }
}