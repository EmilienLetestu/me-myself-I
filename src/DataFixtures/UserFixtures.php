<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 02/07/2018
 * Time: 14:33
 */

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setPassWord('adminTest');
        $user->setUsername('admin@gmail.com');

        $manager->persist($user);
        $manager->flush();
    }
}