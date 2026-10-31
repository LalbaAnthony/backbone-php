<?php

namespace Backbone\View;

use Backbone\Application;
use Backbone\Exceptions\NotFoundException;
use Backbone\Exceptions\FileException;
use Backbone\Http\Utils;

trait View
{
    use Html;
    use Utils;

    /**
     * Render a view
     * 
     * @param string $name
     * @param mixed $data
     * @return void
     */
    public function view(string $name, mixed $data = [], int $code = 200): void
    {
        $this->prepare($code);

        $path = Application::get()->viewsPath() . '/' . $name . '.php';

        if (!file_exists($path)) throw new NotFoundException("The view $name does not exist.");
        if (!is_readable($path)) throw new FileException("The file $path is not readable.");

        self::openHtml();

        if ($data) {
            extract($data, EXTR_OVERWRITE);
        }

        require $path;

        if ($data) {
            foreach (array_keys($data) as $key) {
                unset($$key);
            }
        }

        self::closeHtml();

        exit;
    }
}
