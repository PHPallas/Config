<?php

namespace PHPallas\Config;

use PHPallas\Buffer\Stock as Buffer;

/**
 * Class ConfigDirector
 * Directs the building of configuration objects.
 */
class ConfigDirector
{
    private $builder;

    /**
     * ConfigDirector constructor.
     *
     * @param ConfigFactory $builder The builder instance used to create configurations.
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    /**
     * Builds the configuration by loading data from the specified directory.
     *
     * @param string $directory The directory containing configuration files.
     * @return Configs The built configuration object.
     */
    public function build($directory)
    {
        $this->builder->createConfig();
        $this->builder->populateConfigs($directory);
        return $this->builder->get();
    }
}
