<?php

if (!function_exists('base_path')) {
    function base_path()
    {
        return __DIR__ . '/../..';
    }
}
if (!function_exists('app_path')) {
    function app_path()
    {
        return base_path() . '/app';
    }
}
if (!function_exists('config_path')) {
    function config_path()
    {
        return app_path() . '/config';
    }
}
