<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2018
 * Time: 09:48
 */

namespace App\Tests\Action;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeActionTest extends WebTestCase
{
    public function testHomeAction(): void
    {
        $client = static::createClient();

        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}