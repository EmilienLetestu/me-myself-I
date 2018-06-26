<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 10:06
 */

namespace App\Tests\Action\Admin;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UpdateSkillActionTest extends WebTestCase
{
    public function testUpdateSkillAction(): void
    {
        $client = static::createClient();

        $client->request('GET', '/update/skill/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}