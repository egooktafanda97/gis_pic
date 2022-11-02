<?php
function api_url()
{
    return base_url("bin/rest/api/");
}

function base_api($url = null)
{
    return base_url("bin/rest/api/" . $url);
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
