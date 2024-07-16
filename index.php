<?php
require './vendor/autoload.php';

use Smarty\Smarty;

// Initializing Smarty template engine
$smarty = new Smarty();
$smarty->setTemplateDir('templates');   // Setting directory for templates
$smarty->setCompileDir('templates_c');  // Setting directory for compiled templates
$smarty->setCacheDir('cache');          // Setting directory for cached templates
$smarty->setConfigDir('confsigs');      // Setting directory for configuration files

// Displaying register template
$smarty->display('register.tpl');
