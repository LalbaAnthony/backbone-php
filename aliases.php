<?php

use App\Util\Helpers;
use App\View\Component;
use App\Http\Router;
use App\View\Icon;

if (!function_exists('dump')) {
    function dump(mixed ...$vars): void
    {
        Helpers::dump(...$vars);
    }
}

if (!function_exists('dd')) {
    function dd(mixed ...$vars): void
    {
        Helpers::dd(...$vars);
    }
}

if (!function_exists('dataGet')) {
    function dataGet(mixed ...$vars): mixed
    {
        return Helpers::dataGet(...$vars);
    }
}

if (!function_exists('e')) {
    function e(mixed ...$vars): string
    {
        return Helpers::e(...$vars);
    }
}

if (!function_exists('line')) {
    function line(mixed ...$vars): string
    {
        return Helpers::line(...$vars);
    }
}

if (!function_exists('lorem')) {
    function lorem(mixed ...$vars): string
    {
        return Helpers::lorem(...$vars);
    }
}

if (!function_exists('jsonDecode')) {
    function jsonDecode(mixed ...$vars): mixed
    {
        return Helpers::jsonDecode(...$vars);
    }
}

if (!function_exists('pluck')) {
    function pluck(mixed ...$vars): array
    {
        return Helpers::pluck(...$vars);
    }
}

if (!function_exists('comp')) {
    function component(mixed ...$vars): void
    {
        Component::display(...$vars);
    }
}

if (!function_exists('icon')) {
    function icon(mixed ...$vars): void
    {
        Icon::display(...$vars);
    }
}

if (!function_exists('methodInputTag')) {
    function methodInputTag(mixed ...$vars): string
    {
        return Router::methodInputTag(...$vars);
    }
}
