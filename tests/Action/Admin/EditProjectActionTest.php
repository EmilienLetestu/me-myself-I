<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 09:50
 */

namespace App\Tests\Action\Admin;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EditProjectActionTest extends WebTestCase
{
    public function testEditProjectAction(): void
    {
        $client = static::createClient();

        $client->request('GET', '/edit/project');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}