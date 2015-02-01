<?php

$awsAccessKey = ''; 				//  Amazon IAM Access Key ID
$awsSecretKey = ''; 				//  Amazon IAM Secret Access Key
$bucket = ''; 						//  Amazon S3 Bucket 
$success_action_redirect = '201'; 	//  HTTP Access Code, or post-upload URL
$acl = 'private'; 					//  ACL for file once uploaded, either private or public-read
$key = 'uploads/'.$filename; 		//  The path files will be saved to inside of your S3 bucket. By default files will be saved to a folder named uploads.
									//  	To save to the root of your bucket, simply remove 'uploads/'. - including the period. The folder saved must exist.
$content_type = 'text/plain'; 		//  Specify upload file's content type. Set to ''; to not specify a file type.
$filename = date(YmdHis); 	  		//  Filename to assign - by default will use a timestamp. Can be any PHP function or you can use {$filename} if using
									//		an alternate function
?>
