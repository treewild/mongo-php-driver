--TEST--
MongoGridFS::put() throws exception for nonexistent file
--SKIPIF--
<?php require dirname(__FILE__) . "/skipif.inc";?>
--FILE--
<?php
require_once dirname(__FILE__) . "/../utils.inc";
$mongo = mongo();
$db = $mongo->selectDB(dbname());

$gridfs = $db->getGridFS();

try {
    $gridfs->put('/does/not/exist');
    var_dump(false);
} catch (MongoGridFSException $e) {
    var_dump(true);
}
--EXPECT--
bool(true)
