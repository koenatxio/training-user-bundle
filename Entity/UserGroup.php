<?php


namespace Xio\Bundle\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 *
 * use ctrl + n to auto-generate code
 */
class UserGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="groups")
     */
    private $users;

    public function __construct($name) {
        $this->setName($name);
        $this->users = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUsers() {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users) {
        $this->users = $users;
    }


    public function addUser(User $user) {
        $this->users[] = $user;
    }

} 