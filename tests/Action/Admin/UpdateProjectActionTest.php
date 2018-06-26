<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 09:54
 */

namespace App\Tests\Action\Admin;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UpdateProjectActionTest extends WebTestCase
{
    public function testUpdateProjectAction(): void
    {
        $client = static::createClient();

        $client->request('GET', '/update/project/7');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}