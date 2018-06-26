<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 10:00
 */

namespace App\Tests\Action\Admin;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UpdateTechActionTest extends WebTestCase
{
    public function testUpdateAction(): void
    {
        $client = static::createClient();

        $client->request('GET', '/update/tech/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}