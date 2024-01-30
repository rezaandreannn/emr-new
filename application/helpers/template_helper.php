<?php

function add_assets($pos, $params)
{
    $ci = &get_instance();
    if (!is_array($params)) {
        $params = array($params);
    }
    $ci->config->set_item($pos, $params);
    return;
}

if (!function_exists('header_assets')) {
    function header_assets($headers = array())
    {
        $str = '';
        foreach ($headers as $item) {
            // Tambahkan base_url ke path jika bukan link eksternal
            // $item = strpos($item, 'http') === 0 ? $item : $base_url . $item;
            $str .= $item . "\n";
        }
        return $str;
    }
}

if (!function_exists('footer_assets')) {
    function footer_assets($footers = array())
    {
        $str = '';
        foreach ($footers as $item) {
            // Tambahkan base_url ke path jika bukan link eksternal
            // $item = strpos($item, 'http') === 0 ? $item : $base_url . $item;
            $str .= $item . "\n";
        }
        return $str;
    }
}

// function header_assets($str = '')
// {
//     $ci = &get_instance();
//     $headers = $ci->config->item('header');
//     var_dump($headers);
//     die;

//     foreach ($headers as $item) {
//         $str .= $item . "\n";
//     }
//     echo $str;
// }
