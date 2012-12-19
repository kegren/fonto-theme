<?php
namespace Demo\Model\Entity;

use DateTime;

/**
 * Entity;
 * @Table(name="guestbook")
 * @Entity(repositoryClass="Demo\Model\Entity\GuestbookRepository")
 */
class Guestbook
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=100)
     */
    protected $title;

    /**
     * @Column(type="text")
     */
    protected $post;

    /**
     * @Column(type="string", length=40)
     */
    protected $user;

    /**
     * @Column(type="datetime")
     */
    protected $date;

    /**
     * Sets multiple values
     *
     * @param array $data
     */
    public function populate($data = array())
    {
        $this->setTitle($data['title']);
        $this->setPost($data['post']);
        $this->setUser($data['user']);
        $this->setDate();
    }

    /**
     * Sets date
     */
    public function setDate()
    {
        $this->date = new DateTime();
    }

    /**
     * Returns date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
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
     * Sets the post
     *
     * @param $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * Returns post
     *
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Sets the title
     *
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets username
     *
     * @param $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Returns username
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}