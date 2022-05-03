<?php
/**
 * Fractal loader plugin for Craft CMS 4.x
 *
 * @link      https://madebyraygun.com/
 * @copyright Copyright (c) 2022 Raygun Design, LLC
 */

namespace madebyraygun\fractal;

use Craft;
use craft\base\Plugin;
use craft\web\View;
use madebyraygun\fractal\web\twig\FractalTemplateLoader;

class Fractal extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * Fractal::$plugin
     *
     * @var Fractal
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * To execute your plugin’s migrations, you’ll need to increase its schema version.
     *
     * @var string
     */
    public string $schemaVersion = '4.0.0';

    // Public Methods
    // =========================================================================

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * Fractal::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        $view = null;

        if ( !Craft::$app->request->isCpRequest ) {
            $twig = Craft::$app->getView()->getTwig()->setLoader(new FractalTemplateLoader(new View));
        }
        
    }
}