<?php

$wgExtensionCredits['other'][] = array(
		'path' => __FILE__,
		'name' => 'NewTalkGlobal',
		'author' => 'UltrasonicNXT/Adam Carter',
		'url' => '',
		'description' => 'Shows talk page messages recieved on any project of a wikifarm',
		'version'  => 1.0,
);

$wgAutoloadClasses['NewTalkGlobalHooks'] = __DIR__ . '/NewTalkGlobal.hooks.php';

$wgHooks['UserClearNewTalkNotification'][] = 'NewTalkGlobalHooks::onUserClearNewTalkNotification';