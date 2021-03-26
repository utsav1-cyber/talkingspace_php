<?php require('core/init.php'); ?>

<?php
//Create Topic Object
$thor = new Thor;

//Create User Object
$user = new User;


//Get Template & Assign Vars
$template = new Template('templates/frontpage.php');

//Assign Vars
$template->topics = $thor->getAllTopics();
$template->totalTopics = $thor->getTotalTopics();
$template->totalCategories = $thor->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
//Display template
echo $template;