--TEST--
Test for PHP-543: Mongo::connect() should return a bool value.
--SKIPIF--
<?php require dirname( __FILE__ ) . "/skipif.inc" ?>
--FILE--
<?php
require dirname( __FILE__ ) . "/../utils.inc";

$m = mongo(null, true, true, array( 'connect' => false ) );
var_dump($m->connect());

try
{
	$m = new Mongo("mongodb://totallynonsense/", array( 'connect' => false ) );
	var_dump($m->connect());
}
catch ( Exception $e )
{
	echo $e->getMessage(), "\n";
}
?>
--EXPECTF--
bool(true)
Failed to connect to: %s:%d: %s
