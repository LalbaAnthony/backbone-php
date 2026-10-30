<?php

/**
 * Routing settings
 */

define('APP_ROUTING_ALLOW_METHODS', (bool) getenv('APP_ROUTING_ALLOW_METHODS') ?? true);
define('APP_ROUTING_ALLOW_ORIGIN', (string) getenv('APP_ROUTING_ALLOW_ORIGIN') ?? '*');
