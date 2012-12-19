<?php
/**
 * Fonto - PHP framework
 *
 * @author      Kenny Damgren <kenny.damgren@gmail.com>
 * @package     Fonto.Core
 * @link        https://github.com/kenren/fonto
 * @version     0.5
 */

namespace Fonto\Core\Authentication;

use Fonto\Core\Http\Session;
use Fonto\Core\Security\Hash;
use Doctrine\ORM\EntityManager;


class Auth
{
    /**
     * @var
     */
    protected $user;

    /**
     * @var \Fonto\Core\Http\Session
     */
    protected $session;

    /**
     * @var \Fonto\Core\Security\Hash
     */
    protected $hash;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var
     */
    protected $model;

    /**
     * Constructor
     *
     * @param \Fonto\Core\Http\Session $session
     * @param \Fonto\Core\Security\Hash $hash
     */
    public function __construct(Session $session, Hash $hash)
    {
        $this->session = $session;
        $this->hash = $hash;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        $this->model = get_class($model); // Namespace rather
    }

    /**
     * Logs user in based on input credentials
     *
     * @param array $credentials
     * @return bool
     */
    public function login($credentials = array())
    {
        $this->user = $this->em->getRepository($this->model)->findOneBy(
            array('username' => $credentials['username'])
        );

        if ($this->user) {

            $matched = $this->hash->checkPassword($credentials['password'], $this->user->getPassword());

            if ($matched) {

                $roles = $this->user->getRoles(); // Get user roles

                if ($roles != null) {
                    $rolesArray = array();
                    foreach ($roles as $role) {
                        $rolesArray[$role->getName()] = $role->getName();
                    }
                }

                // Save user credentials to session
                $this->session->save(
                    'user',
                    array(
                        'id' => $this->user->getId(),
                        'username' => $this->user->getUsername(),
                        'email' => $this->user->getEmail(),
                        'name' => $this->user->getName(),
                        'roles' => $rolesArray
                    )
                );

                return true;
            } else {
                return false;
            }

        }

        return false;
    }

    /**
     * Checks if an user is logged in
     *
     * @return mixed
     */
    public function isAuthenticated()
    {
        return $this->session->has('user');
    }

    /**
     * Destroys session
     *
     * @return void
     */
    public function logout()
    {
        $this->user = null;
        $this->session->forgetAll();
    }

    public function getAuthedId()
    {
        $user = $this->session->get('user');
        $userId = $user['id'];
        return $userId;
    }

}