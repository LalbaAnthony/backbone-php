<?php

/**
 * App settings
 */

define('APP_NAME_LONG', (string) getenv('APP_NAME_LONG') ?? '');
define('APP_NAME_SHORT', (string) getenv('APP_NAME_SHORT') ?? '');
define('APP_NAME_URL', (string) getenv('APP_NAME_URL') ?? '');
define('APP_DESCRIPTION', (string) getenv('APP_DESCRIPTION') ?? '');
define('APP_AUTHOR', (string) getenv('APP_AUTHOR') ?? '');
define('APP_VERSION', (string) getenv('APP_VERSION') ?? '');
define('APP_LANG', (string) getenv('APP_LANG') ?? '');

/**
 * App configuration
 */

define('APP_URL', (string) getenv('APP_URL') ?? '/');
define('APP_ENV', (string) getenv('APP_ENV') ?? 'production');
define('APP_DEBUG', (defined('APP_ENV') && APP_ENV === 'dev') ? true : false); // 'dev' or 'prod'
