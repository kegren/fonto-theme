<?php

namespace Demo\Model\Entity;

/**
 * @Entity;
 * @Table(name="roles")
 */
class Role
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @Column(type="string")
     */
    protected $description;

    /**
     * Many to many relationship
     *
     * @ManyToMany(targetEntity="Demo\Model\Entity\User", mappedBy="roles")
     */
    protected $userRoles;

    /**
     * Sets description for the role
     *
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a new name for a role
     *
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns role name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}