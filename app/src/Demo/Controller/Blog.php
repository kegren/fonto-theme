<?php
/**
 * Blog controller
 */

namespace Demo\Controller;

use Fonto\Core\Controller\Base;
use Demo\Model\Entity;
use Demo\Model\Form;

class Blog extends Base
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns a view with all the data needed for the blog
     *
     * @return mixed
     */
    public function indexAction()
    {
        $em = $this->EntityManager();

        $data = array(
            'listAll' => $em->getRepository("Demo\Model\Entity\Content")->findBy(array('type' => 'post')),
            'baseUrl' => $this->url()->baseUrl(),
            'session' => $this->session()
        );

        return $this->view()->render('blog/index', $data);
    }
}