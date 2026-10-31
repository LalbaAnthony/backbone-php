<?php

namespace Backbone;

use Backbone\Exceptions\AppException;
use Backbone\Exceptions\NotFoundException;

/**
 * Class Application
 *
 * Holds the project root and resolves every framework path from it.
 */
final class Application
{
    /**
     * Application version
     */
    public const VERSION = '1.0.0';

    /**
     * Application start time
     */
    public string|float $startTime = 0;

    /**
     * Singleton instance of Application
     */
    private static ?self $instance = null;

    /**
     * Absolute path to the project root, without trailing separator.
     */
    private string $basePath;

    /**
     * @param string $basePath Absolute path to the project root.
     * @throws NotFoundException If the base path is not an existing directory.
     */
    private function __construct(string $basePath)
    {
        if ($this->startTime === 0) $this->startTime = microtime(true);

        $resolved = realpath($basePath);

        if ($resolved === false || !is_dir($resolved)) throw new NotFoundException("The application base path does not exist : " . $basePath);

        $this->basePath = $resolved;
    }

    /**
     * Initialize the Application instance.
     *
     * @param string $basePath Absolute path to the project root.
     * @return self
     * @throws AppException If the application is already initialized.
     * @throws NotFoundException If the base path is not an existing directory.
     */
    public static function init(string $basePath): self
    {
        if (self::$instance !== null) throw new AppException('Application already initialized');

        self::$instance = new self($basePath);

        return self::$instance;
    }

    /**
     * Get the Application instance.
     *
     * @return self
     * @throws AppException If the application is not initialized.
     */
    public static function get(): self
    {
        if (self::$instance === null) throw new AppException('Application not initialized');

        return self::$instance;
    }

    /**
     * Get the project root, optionally joined with a relative path.
     *
     * @param string $path Path relative to the project root.
     * @return string
     */
    public function basePath(string $path = ''): string
    {
        if ($path === '') return $this->basePath;

        return $this->basePath . '/' . ltrim($path, '/\\');
    }

    /**
     * Path to the migrations directory.
     */
    public function migrationsPath(): string
    {
        return $this->basePath('app/Migrations');
    }

    /**
     * Path to the seeds directory.
     */
    public function seedsPath(): string
    {
        return $this->basePath('app/Seeds');
    }

    /**
     * Path to the views directory.
     */
    public function viewsPath(): string
    {
        return $this->basePath('ressources/views');
    }

    /**
     * Path to the components directory.
     */
    public function componentsPath(): string
    {
        return $this->basePath('ressources/components');
    }

    /**
     * Path to the icons directory.
     */
    public function iconsPath(): string
    {
        return $this->basePath('ressources/icons');
    }

    /**
     * Path to the log files directory.
     */
    public function logsPath(): string
    {
        return $this->basePath('logs');
    }
}
