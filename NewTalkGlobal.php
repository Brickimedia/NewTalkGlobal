<?php

$wgExtensionCredits['other'][] = array(
		'path' => __FILE__,
		'name' => 'NewTalkGlobal',
		'author' => 'UltrasonicNXT/Adam Carter',
		'url' => '',
		'description' => 'Shows talk page messages recieved on any project of a wikifarm',
		'version'  => 1.0,
);

//require_once( __DIR__ . '/NewTalkGlobal.body.php' );
$wgAutoloadClasses['NewTalkGlobal'] = __DIR__ . '/NewTalkGlobal.body.php';

$wgHooks['GetNewMessagesAlert'][] = 'NewTalkGlobal::onGetNewMessagesAlert';
