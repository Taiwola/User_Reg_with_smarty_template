<?php
// Including Composer autoload and UserRegistration class
require './vendor/autoload.php';
require './model/user.class.php';

use Smarty\Smarty; // Importing Smarty namespace

// Handling POST request for form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieving form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Creating UserRegistration object with provided data
    $userRegistration = new UserRegistration($username, $email, $password);

    // Initializing Smarty template engine
    $smarty = new Smarty();
    $smarty->setTemplateDir('templates');   // Setting directory for templates
    $smarty->setCompileDir('templates_c');  // Setting directory for compiled templates
    $smarty->setCacheDir('cache');          // Setting directory for cached templates
    $smarty->setConfigDir('confsigs');      // Setting directory for configuration files

    // Validating user input and saving if valid
    if ($userRegistration->validate() && $userRegistration->save()) {
        // Assigning username to Smarty for confirmation template
        $smarty->assign('username', $username);
        // Displaying confirmation template
        $smarty->display('confirmation.tpl');
    } else {
        // Retrieving validation errors if validation fails
        $errors = $userRegistration->getErrors();
        // Assigning errors to Smarty for register template
        $smarty->assign('errors', $errors);
        // Displaying register template with errors
        $smarty->display('register.tpl');
    }
} else {
    // Redirecting to index.php if not a POST request
    header('Location: index.php');
    exit(); // Exiting to prevent further execution
}
