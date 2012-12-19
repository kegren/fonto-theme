<?php
/**
 * Page controller
 */

namespace Demo\Controller;

use Fonto\Core\Controller\Base;
use Demo\Model\Entity;
use Demo\Model\Form;
use Exception;

class Page extends Base
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Shows a page based on id
     *
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function viewAction($id)
    {
        if (!is_numeric($id)) {
            throw new Exception("The id most be numeric");
        }
        $em = $this->EntityManager();

        $data = array(
            'page' => $em->getRepository("Demo\Model\Entity\Content")->findOneById($id),
            'baseUrl' => $this->url()->baseUrl(),
            'session' => $this->session()
        );

        return $this->view()->render('page/index', $data);
    }
}