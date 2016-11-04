<?php

namespace Bolt\Extension\ChronoLabs\LeadIn;

use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\Target;
use Bolt\Controller\Zone;
use Bolt\Extension\ChronoLabs\LeadIn\Provider\LeadInProvider;
use Bolt\Extension\SimpleExtension;
use Bolt\Menu\MenuEntry;
use Bolt\Translation\Translator as Trans;

/**
 * LeadIn extension class.
 *
 * @author Victor Rodriguez <victor.rodriguez@chrono-labs.com>
 */
class LeadInExtension extends SimpleExtension
{

    /**
     * @return array
     */
    protected function getDefaultConfig()
    {
        return [
            'leadin_id' => '1111111'
        ];
    }

    /**
     * @return array
     */
    public function getServiceProviders()
    {
        return [
            $this,
            new LeadInProvider($this->getConfig(), $this->getBaseDirectory())
        ];
    }

    /**
     * @return array
     * If backend is set to false, don't load the menu link.
     */
    protected function registerMenuEntries()
    {
        $menu = (new MenuEntry('hubspot', '/bolt/extensions/leadin'))
            ->setLabel(Trans::__('Statistics'))
            ->setIcon('fa:area-chart');

        return [
            $menu
        ];
    }

    /**
     * @return array
     */
    protected function registerAssets()
    {
        $app = $this->getContainer();
        $tagCode = (new Snippet())
            ->setZone(Zone::FRONTEND)
            ->setLocation(Target::END_OF_HEAD)
            ->setCallback([$app['leadin.snippet.leadin'], "insertTag"]);
        $assets = [ $tagCode ];
        return $assets;
    }

    /**
     * @return array
     */
    protected function registerTwigPaths()
    {
        return ['templates'];
    }
}

