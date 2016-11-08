<?php

namespace Bolt\Extension\ChronoLabs\LeadIn\Snippet;

use Bolt\Extension\ChronoLabs\LeadIn\Config\Config;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig_Environment;

/**
 * Class LeadInSnippet
 * @package Bolt\Extension\ChronoLabs\LeadIn\Snippet
 * Snippet class to insert hubspot tag on every page
 */
class LeadInSnippet
{
    /** @var Twig_Environment $view */
    protected $view;

    /** @var RequestStack $request */
    protected $request;

    /** @var Config $config */
    protected $config;

    public function __construct(
        Twig_Environment $view,
        RequestStack $request,
        Config $config
    )
    {
        $this->view = $view;
        $this->request = $request;
        $this->config = $config;
    }

    /**
     * @return string
     * Code snippet to display on every page to keep track of users
     */
    public function insertTag()
    {
        //Set the webproperty to be used whether or not universal is used or not
        $data = [
            'leadin_id' => $this->config->getLeadinId()
        ];

        return $this->view->render("leadin.twig", $data);
    }
}

