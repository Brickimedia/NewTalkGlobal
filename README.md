NewTalkGlobal
=============

A MediaWiki extension for showing new talk page messages on all projects of a wikifarm.

Developed by UltrasonicNXT for Brickimedia (http://www.brickimedia.org), but should work well on any simple wikifarm setup.

There is just one config variable, $newTalkGlobalDatabases. It needs an entry like this for every wiki in the farm:

    "<wikiname>" => array(
        "db" => "<wikidbname>",
        "link" => "<urltoarticle (ie "http://wiki.farm.com/wiki/")>"
    ),
