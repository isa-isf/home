<?php

/**
 * Plugin Name: ISF/WP SMTP
 */

use ISF\WP\SMTP\SMTP;

require_once __DIR__ . '/vendor/autoload.php';

SMTP::register();
