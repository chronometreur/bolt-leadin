<?php

namespace Bolt\Extension\ChronoLabs\LeadIn\Config;

/**
 * Class Config
 * @package Bolt\Extension\ChronoLabs\LeadIn\Config
 * Config class that holds the configuration of the extension
 */
class Config
{
  
    private $leadinId;

    /**
     * Config constructor.
     * @param $config
     * Setup the configuration from the config array
     */
    public function __construct($config)
    {
        $this->setLeadinId($config['leadin_id']);
    }

    /**
     * @return string
     */
    public function getLeadinId()
    {
        return $this->leadinId;
    }

    /**
     * @param string $leadinId
     * @return Config
     */
    public function setLeadinId($leadinId)
    {
        $this->leadinId = $leadinId;
        return $this;
    }
}

