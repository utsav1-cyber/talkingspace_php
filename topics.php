<?php require('core/init.php'); ?>

<?php
//Create Topics Object
$thor = new Thor;

//Get category From URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get user From URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

//Get Template & Assign Vars
$template = new Template('templates/topics.php');

//Assign Template Variables
if(isset($category)){
	$template->topics = $thor->getByCategory($category);
	$template->title = 'Posts In "'.$thor->getCategory($category)->name.'"';
}

//Check For User Filter
if(isset($user_id)){
	$template->topics = $thor->getByUser($user_id);
	//$template->title = 'Posts By "'.$user->getUser($user_id)->username.'"';
}

//Check For Category Filter
if(!isset($category) && !isset($user_id)){
	$template->topics = $thor->getAllTopics();
}

$template->totalTopics = $thor->getTotalTopics();
$template->totalCategories = $thor->getTotalCategories();

//Display template
echo $template;