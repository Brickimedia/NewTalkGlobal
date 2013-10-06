<?php

class NewTalkGlobal {
	
	public static function onGetNewMessagesAlert( &$ntl, array $newtalks, User $user, OutputPage $out ){
		
		$ntl = '';
		
		global $newTalkGlobalDatabases;
		
		$msgs = array();
		
		foreach( $newTalkGlobalDatabases as $wiki => $data ){
			$dbr = wfGetDB( DB_SLAVE, array(), $data['db'] );
				
			if( $user -> isAnon() ){
				$res = $dbr -> select(
						"user_newtalk",
						"user_last_timestamp",
						array( "user_ip" => $user -> getName() )
				);
			} else {
				$res = $dbr -> select(
						"user_newtalk",
						"user_last_timestamp",
						array( "user_id" => $user -> getId() )
				);
			}
				
			if( $res -> numRows() != 0 ){
				$msgs[] = Xml::element(
						'a',
						array( 'href' => "{$data['url']}User_talk:$user" ),
						$wiki
				);
			}
		}
		
		$sep = str_replace( '_', ' ', wfMessage( 'newtalkseparator' )->escaped() );
		$parts = implode( $sep, $msgs );
		
		if( count( $msgs )){
			$ntl = wfMessage( 'youhavenewmessagesmulti' )->rawParams( $parts )->escaped();
		}
		return true;
	}
}