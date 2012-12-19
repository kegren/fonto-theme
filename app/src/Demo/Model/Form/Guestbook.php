<?php

namespace Demo\Model\Form;

use Fonto\Core\FormModel\Base;

class Guestbook extends Base
{
    /**
     * Validation rules and messages for guestbook form
     *
     * @return array
     */
    public function rules()
    {
        return array(
            'title' => array(
                'rules' => 'required|max{32}|min{2}',
            ),
            'post' => array(
                'rules' => 'required|min{2}',
            ),
            'user' => array(
                'rules' => 'required',
            ),
        );
    }
}