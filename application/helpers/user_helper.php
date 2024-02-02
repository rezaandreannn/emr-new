<?php

if (!function_exists('full_name')) {
    function full_name($user_id, $role_id)
    {
        $CI = &get_instance();

        $CI->load->model('LoginModel');

        $profile_user_login = $CI->LoginModel->get_user_profil(array($user_id, $role_id));

        return $profile_user_login['NamaLengkap'];
    }
}
