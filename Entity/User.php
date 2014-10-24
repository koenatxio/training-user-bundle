<?php


namespace Xio\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 *
 * use ctrl + n to auto-generate code
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", nullable=true, length=100)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", nullable=true, length=100)
     */
    private $lastName;

    /**
     * @ORM\ManyToMany(targetEntity="UserGroup", mappedBy="users")
     */
    private $groups;



    public function __construct($username, $password) {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->groups = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
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
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getGroups() {
        return $this->groups;
    }

    public function addGroup(UserGroup $group)
    {
        $group->addUser($this); //om te forceren dat de associatie in de owning site wordt gezet (waar mappedBy staat)
        $this->groups[] = $group;
    }
} 