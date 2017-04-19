<?php namespace Arcanedev\LaravelNotes\Traits;

/**
 * Class     ConfigHelper
 *
 * @package  Arcanedev\LaravelNotes\Traits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait ConfigHelper
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get table from config.
     *
     * @param  string       $key
     * @param  string|null  $default
     *
     * @return string
     */
    protected function getTableFromConfig($key, $default = null)
    {
        return $this->getFromConfig("{$key}.table", $default);
    }

    /**
     * Get model from config.
     *
     * @param  string       $key
     * @param  string|null  $default
     *
     * @return string
     */
    protected function getModelFromConfig($key, $default = null)
    {
        return $this->getFromConfig("{$key}.model", $default);
    }

    /**
     * Get the value from the laravel-messenger config file.
     *
     * @param  string       $key
     * @param  string|null  $default
     *
     * @return string
     */
    protected function getFromConfig($key, $default = null)
    {
        return config("notes.{$key}", $default);
    }
}
