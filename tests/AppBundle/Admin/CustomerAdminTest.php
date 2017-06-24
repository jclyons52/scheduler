<?php
/**
 * Created by PhpStorm.
 * User: joseph
 * Date: 24/06/17
 * Time: 12:35 PM
 */

namespace Tests\AppBundle\Admin;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CustomerAdminTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/admin/app/task/list');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}