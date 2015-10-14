<?php
/**
 * Config-file for Herbert. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Define Herbert paths.
 *
 */
define('HERBERT_INSTALL_PATH', __DIR__ . '/..');
define('HERBERT_THEME_PATH', HERBERT_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(HERBERT_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();


/**
 * Create the Herbert variable.
 *
 */
$herbert = array();


/**
 * Settings for the database.
 *
 */
$herbert['db']['dsn']            = 'sqlite::memory:';
$herbert['db']['username']       = '';
$herbert['db']['password']       = '';
$herbert['db']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");


/**
 * Site wide settings.
 *
 */
$herbert['lang'] = 'sv';
$herbert['title_append'] = ' | Herbert';

$herbert['header'] = <<<EOD
<a href='./' class='sitelogo'><img src='img/me.png' alt=''/></a>
<span class='sitetitle'>JavaScript</span>
<span class='siteslogan'>Min webbplats för dbwebb.se/javascript</span>
EOD;

$herbert['menu'] = array(
  'callback' => 'modifyNavbar',
  'items' => array(
    'home' => array('text'=>'HEM', 'url'=>'./', 'class'=>null),
    'playground' => array('text'=>'LEKPLATS', 'url'=>'playground.php', 'class'=>null),
    'report' => array('text'=>'REDOVISNING', 'url'=>'report.php', 'class'=>null),
    'lightbox' => array('text'=>'LIGHTBOX-PLUGIN', 'url'=>'lightbox.php', 'class'=>null)
  )
);

$herbert['footer'] = <<<EOD
<footer>
	<p>© 2015 Marcus Törnroth | <a href='https://github.com/rcus/javascript'>GitHub</a> | <a href='http://jsfiddle.net/user/rcus/'>JSFiddle</a></p>
</footer>
EOD;


/**
 * Theme related settings.
 *
 */
$herbert['stylesheets'] = array('css/style.css');
$herbert['favicon']    = 'favicon.ico';


/**
 * Settings for JavaScript.
 *
 */
$herbert['modernizr'] = 'js/modernizr.min.js';
$herbert['jquery'] = 'js/jquery.js'; // Set to null to disable jQuery 
$herbert['javascript_include'] = array('js/jquery-lightbox.js');
//$herbert['javascript_include'] = array('js/main.js'); // To add extra javascript files


/**
 * Google analytics.
 *
 */
$herbert['google_analytics'] = null; // Enter your Google Analytics ID 'UA-XXXXXXXX-X'
