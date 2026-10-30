<?php

/**
 * Database settings
 */

define('DB_USER', (string) getenv('DB_USER') ?? '');
define('DB_PASS', (string) getenv('DB_PASS') ?? '');
define('DB_HOST', (string) getenv('DB_HOST') ?? '');
define('DB_NAME', (string) getenv('DB_NAME') ?? '');
