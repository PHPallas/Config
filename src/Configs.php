<?php

namespace PHPallas\Config;

use Exception;
use PHPallas\Buffer\Stock as Buffer;

/**
 * Class Configs
 * Represents a collection of configuration settings.
 */
class Configs
{
    protected $buffer;
    protected static $scope = "configs";

    /**
     * Configs constructor.
     */
    public function __construct()
    {
        $this->buffer = Buffer::getInstance();
    }

    /**
     * Retrieves a configuration value by name.
     *
     * @param string $name The name of the configuration setting.
     * @return mixed The value of the configuration setting.
     */
    public function get($name)
    {
        return $this->buffer->get($name, static::$scope);
    }

    /**
     * Sets a configuration value by name.
     *
     * @param string $name The name of the configuration setting.
     * @param mixed $value The value to set for the configuration setting.
     */
    public function set($name, $value)
    {
        $this->buffer->set($name, $value, static::$scope);
    }

    public function notify($scope, $name, $oldValue, $value)
    {
        if (static::$scope === $scope && $oldValue !== $value)
        {
            throw new Exception("Changing application configuration is not permitted! Another program is trying to change the part `$name` of configuration");
        }
    }

    public function protect($name)
    {
        $this->buffer->attachObserver($name, $this,static::$scope);
    }
}
