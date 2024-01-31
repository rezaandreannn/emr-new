<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('active_link')) {
    function activate_menu($menu)
    {
        $CI = get_instance();
        $class = $CI->router->fetch_class();
        return ($class == $menu) ? 'active' : '';
    }
}
