<?php

use PHPallas\Config\Configs;
use PHPUnit\Framework\TestCase;
use PHPallas\Config\ConfigFactory;
use PHPallas\Config\ConfigDirector;

class ConfigManagerTest extends TestCase
{
    private $configFactory;
    private $configDirector;
    private $testDirectory;

    public function testFuntionality()
    {
        $builder = new ConfigFactory();
        $director = new ConfigDirector($builder);
        $config = $director->build(__DIR__."/configs");
        $this->assertInstanceOf(Configs::class, $config);
        $this->assertEquals("root", $config->get("test.database.user"));
        $config->set("test.database.user","root");
    }
}
