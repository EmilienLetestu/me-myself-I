<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 10:04
 */

namespace App\Tests\Action\Admin;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EditSkillActionTest extends WebTestCase
{
    public function testEditSkillAction()
    {
        $client= static::createClient();

        $client->request('GET', '/edit/skill');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}