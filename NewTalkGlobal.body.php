<?php

class NewTalkGlobal {
	
	public static function onGetNewMessagesAlert( &$ntl, array $newtalks, User $user, OutputPage $out ){
		
		$ntl = '';
		
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
		
		$sep = str_replace( '_', ' ', wfMessage( 'newtalkseparator' )->escaped() );
		$msgs = array();
		
		foreach ( $newtalks as $newtalk ) {
			$msgs[] = Xml::element(
					'a',
					array( 'href' => $newtalk['link'] ), $newtalk['wiki']
			);
		}
		$parts = implode( $sep, $msgs );
		$ntl = wfMessage( 'youhavenewmessagesmulti' )->rawParams( $parts )->escaped();
		
		return true;
	}
}