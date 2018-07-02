<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 02/07/2018
 * Time: 13:55
 */

namespace App\Entity;




use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $password;

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }


    public function setPassWord(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getUsername():? string
    {
        return $this->username;
    }

    /**
     * @return null|string
     */
    public function getPassword():? string
    {
        return $this->password;
    }


    /**
     * @return null|string
     */
    public function getSalt():? string
    {
        return null;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
       return ['ROLE_ADMIN'];
    }

    public function eraseCredentials()
    {
    }

    /**
     * @return string
     */
    public function serialize() :string
    {
        return serialize([
            $this->id,
            $this->username
        ]);
    }

    /**
     * @param $serialized
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }

}