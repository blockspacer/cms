<?php
/**
 * Alexya Framework - The intelligent Loli Framework
 *
 * This file will act as front controller, will load
 * bootstrap.php and call router.
 *
 * In this file you can add your custom routes (if you don't want
 * to add them through [the configuration file](config/routes.php)),
 * define constants, add global variables to the view and so on.
 *
 * The last statement of the file is the call to the router, it should
 * stay the last since (by default) Alexya will finnish the execution once
 * the router has finnished.
 *
 * @author Manulaiko <manulaiko@gmail.com>
 */

error_reporting(E_ALL);
ini_set("display_errors", true);

/**
 * Load composer.
 */
if(!require_once("vendor/autoload.php")) {
    die("Please, execute `composer update` in order to install dependencies");
}

\Alexya\Container::Logger()->debug("Request URI: ". \Alexya\Http\Request::main()->uri);

foreach(\Alexya\Container::Settings()->get("application.view_vars") as $key => $value) {
    \Alexya\Foundation\View::global($key, $value);
}

\Alexya\Container::Router()->route();
