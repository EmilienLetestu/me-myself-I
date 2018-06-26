<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 09:57
 */

namespace App\Tests\Action\Admin;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EditTechActionTest extends WebTestCase
{
    public function testEditTechAction()
    {
        $client = static::createClient();

        $client->request('GET', '/edit/tech');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}