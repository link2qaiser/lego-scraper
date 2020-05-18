<?php
$bucketName = "testbucket";
if(@$_SERVER['SERVER_NAME'] == "localhost" || php_uname("n") == "DIXEAM")	{
	$node = "couchbase://localhost:8091";
	
}else{
	$node = "ec2-52-15-237-147.us-east-2.compute.amazonaws.com:8091";
}
$cluster = new \CouchbaseCluster($node);
$bucket = $cluster->openBucket($bucketName);

$bucket->upsert("smsoutreach_footprint_count", ['smsoutreach_footprint_count'=>0]);
$bucket->upsert("seooutreach_link_count", ['seooutreach_link_count'=>0]);




