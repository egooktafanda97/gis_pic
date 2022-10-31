<?php
defined('BASEPATH') or exit('No direct script access allowed');

$hook['pre_system'] = function () {
    $dotenv = new Symfony\Component\Dotenv\Dotenv();
    $dotenv->load(__DIR__ . '/../../.env');
};
