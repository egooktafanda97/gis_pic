<?php
function api_url($url = null)
{
    return base_url("app/api/" . $url);
}

function base_api($url = null)
{
    return base_url("app/api/" . $url);
}

function auth()
{
    $CI = &get_instance();
    $CI->load->library('session');
    $sesion = $CI->session->userdata("login");
    return $sesion;
}

function table_active()
{
    return [
        "industri",
        "pendidikan"
    ];
}

function dump($data)
{
    echo json_encode($data);
}
