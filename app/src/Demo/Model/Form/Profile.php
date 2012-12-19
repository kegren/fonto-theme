<?php

namespace Demo\Model\Form;

use Fonto\Core\FormModel\Base;

class Profile extends Base
{
    /**
     * Validation rules for the profile form
     *
     * @return array
     */
    public function rules()
    {
        return array(
            'username' => array(
                'rules' => 'required|max{32}|min{2}',
            ),
            'password' => array(
                'rules' => 'required|max{32}|min{8}',
            ),
            'password_repeat' => array(
                'rules' => 'required|identical{password}|max{32}|min{8}',
            ),
            'email' => array(
                'rules' => 'email',
            )
        );
    }
}