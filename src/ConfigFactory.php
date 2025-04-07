<?php

namespace PHPallas\Config;

use PHPallas\AbstractTypes\Factory;
use PHPallas\Utilities\FileUtility;

/**
 * Class ConfigFactory
 * Responsible for creating and loading configuration objects.
 */
class ConfigFactory extends Factory
{
    protected static $mode = Factory::FACTORY_BUILDER;

    /**
     * ConfigFactory constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new Configs instance.
     */
    protected function createConfig()
    {
        $this->product = new Configs();
    }

    /**
     * Loads configuration data from JSON files in the specified directory.
     *
     * @param string $directory The directory containing JSON configuration files.
     */
    protected function populateConfigs($directory)
    {
        foreach (glob("$directory/*.json") as $file)
        {
            $name = pathinfo($file, PATHINFO_FILENAME);
            $value = FileUtility::readFromJson($file);
            $this->product->set($name, $value);
            $this->product->protect($name);
        }
    }
}
