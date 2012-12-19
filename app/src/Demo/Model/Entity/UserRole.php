<?php

namespace Demo\Model\Entity;

/**
 * @Entity;
 * @Table(name="userroles")
 */
class UserRole
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="integer", name="user_id")
     */
    protected $userId;

    /**
     * @Column(type="integer", name="role_id")
     */
    protected $roleId;

    /**
     * Sets role id
     *
     * @param $roleId
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }

    /**
     * Returns role id
     *
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Sets user id
     *
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Returns user id
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }
}