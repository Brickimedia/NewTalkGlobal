<?php

class NewTalkGlobal {

	public static function onUserRetrieveNewTalks( &$user, &$talks ) {
		//$talks = array(); will prevent any old style new talk messages appearing
	}
	
	public static function onGetNewMessagesAlert( string &$newMessagesAlert, array $newtalks, User $user, OutputPage $out ){

		$newMessagesAlert = ""; //prevent alert showing before we change it
		
		global $newTalkGlobalDatabases;
		
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
				$newtalks[] = array(
						"link" => "{$data['url']}User_talk:$user",
						"wiki" => $wiki
				);
			}
		}
		
		return true;
	}
}