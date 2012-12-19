<?php
/**
 * Part of Fonto Framework
 *
 * Application settings
 */

return array(
    /**
     * language
     */
    'language' => 'en',
    /**
     * Default timezone
     */
    'timezone' => 'Europe/Stockholm',
    /**
     * Database settings
     */
    'database' => array(
        'local' => array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'fontomvc',
            'user' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ),
        'server' => array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'fontomvc',
            'user' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ),
    ),
    /**
     * Application environment
     */
    'environment' => 'local',
    /**
     * Theme: default fonty based on twitter bootstrap
     */
    'theme' => array(
        'themeName' => 'fonty',
        'themeDescription' => 'A theme based on twitter bootstrap',
        'themeFile' => 'web/app/Demo/css/fonty.css',
        'themeTitle' => 'Fonto Framework',
        'themeHeading' => 'Fonto Framework',
        'themeFavicon' => 'web/app/Demo/img/favicon.ico',
        'themeLogo' => 'web/app/Demo/img/fontoLogo.png',
        'themeCopyright' => '&copy; Fonto 2012'
    )
);