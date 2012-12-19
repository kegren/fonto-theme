<?php
/**
 * Theme controller
 */

namespace Demo\Controller;

use Fonto\Core\Controller\Base;

class Theme extends Base
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Shows a test page
     *
     * @return mixed
     */
    public function indexAction()
    {
        return $this->view()->render(
            'theme/index',
            array(
                'baseUrl' => $this->url()->baseUrl(),
                'session' => $this->session(),
                'someDummyData' => $this->getDummyData(),
            )
        );
    }

    /**
     * Returns an array with data for testing purpose
     *
     * @return mixed
     */
    private function getDummyData()
    {
        $dummy = array('Some content', 'Another content box', 'More content', 'Demo box');
        return $dummy[array_rand($dummy)];
    }
}