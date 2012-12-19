<?php
/**
 * Guestbook controller
 */
namespace Demo\Controller;

use Fonto\Core\Controller\Base;
use Demo\Model\Entity;
use Demo\Model\Form;

class Guestbook extends Base
{
    private $baseUrl;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->baseUrl = $this->url()->baseUrl();
    }

    /**
     * Shows guestbook overview
     *
     * @return mixed
     */
    public function getIndexAction()
    {
        $em = $this->EntityManager();

        return $this->view()->render(
            'guestbook/index',
            array(
                'baseUrl' => $this->baseUrl,
                'listAll' => $em->getRepository("Demo\Model\Entity\Guestbook")->findAllOrderByDate(),
                'session' => $this->session(),
                'form'    => $this->form(),
            )
        );
    }

    /**
     * Processes a post request
     *
     * @return mixed
     */
    public function postNewAction()
    {
        $formModel = new Form\Guestbook();
        $validation = $this->validation();
        $session = $this->session();

        $validation->validate($formModel->rules(), $this->request()->getParameters());

        if ($validation->isValid()) {
            $em = $this->EntityManager();
            $model = new Entity\Guestbook();
            $model->populate($this->request()->getParameters());
            $em->persist($model);
            $em->flush();

            $session->save('Success', 'Your post has been created!');
            return $this->response()->redirect('guestbook');
        } else {
            return $this->response()->redirect('guestbook', array('validation' => $validation, 'posted' => $this->request()->getParameters()));
        }
    }
}