<?php

/**
 * Database settings
 */

define('DB_USER', (string) getenv('DB_USER') ?? '');
define('DB_PASSWORD', (string) getenv('DB_PASSWORD') ?? '');
define('DB_HOST', (string) getenv('DB_HOST') ?? '');
define('DB_NAME', (string) getenv('DB_NAME') ?? '');
