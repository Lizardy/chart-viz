<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__ .'/../vendor/autoload.php';

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';
	require_once __DIR__.'/../vendor/technic.com/tcpdf/tcpdf.php';
	
	$loader->add('Stof',__DIR__ . '/../vendor/bundles');
	$loader->add('Gedmo',__DIR__ . '/../vendor/gedmo-doctrine-extensions/lib');
	$loader->add('Sonata',__DIR__ . '/../vendor/bundles');
	$loader->add('Knp\Bundle',__DIR__. '/../vendor/bundles');
    $loader->add('Knp\Menu',__DIR__. '/../vendor/knp/menu/src');
	//$loader->add('TCPDF',__DIR__. '/../vendor/tcpdf/tcpdf.php');
}

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
