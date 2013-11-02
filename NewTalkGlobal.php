<?php

$wgExtensionCredits['other'][] = array(
		'path' => __FILE__,
		'name' => 'NewTalkGlobal',
		'author' => 'UltrasonicNXT/Adam Carter',
		'url' => 'https://github.com/Brickimedia/NewTalkGlobal',
		'descriptionmsg' => 'newtalkglobal-desc',
		'version'  => 1.0,
);

$wgAutoloadClasses['NewTalkGlobal'] = __DIR__ . '/NewTalkGlobal.body.php';

$wgHooks['GetNewMessagesAlert'][] = 'NewTalkGlobal::onGetNewMessagesAlert';

$wgExtensionMessagesFiles['NewTalkGlobal'] = __DIR__ . '/NewTalkGlobal.i18n.php';