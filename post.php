<?php

include('conf/s3_post_config.php'); // get your variables from pre-existing source 

$year = date(Y) + 10;
$policy = '{ 
	"expiration": "'.$year.'-12-01T12:00:00.000Z",
	"conditions": [
		{"bucket": "'.$bucket.'"},
		["starts-with", "$key", "'.str_replace($filename, '', $key).'"],
		{"acl": "'.$acl.'"},
		{"success_action_redirect": "'.$success_action_redirect.'"},
		["starts-with", "$Content-Type", "'.$content_type.'"],
		{"x-amz-meta-uuid": "123"},
		["starts-with", "$x-amz-meta-tag", ""]
	]
}';
?> <html>
	<h3>Leave a Message</h3>
	<br />
	<form action="https://s3-us-west-2.amazonaws.com/<?php echo $bucket; ?>/" method="post" enctype="multipart/form-data">
		<input type="hidden" name="key" value="<?php echo $key; ?>">
		<input type="hidden" name="acl" value="<?php echo $acl; ?>">
		<input type="hidden" name="success_action_redirect" value="<?php echo $success_action_redirect; ?>">
		<input type="hidden" name="Content-Type" value="<?php echo $content_type; ?>">
		<input type="hidden" name="x-amz-meta-uuid" value="123">
		<input type="hidden" name="x-amz-meta-tag" value="">
		<input type="hidden" name="AWSAccessKeyId" value="<?php echo $awsAccessKey; ?>">
		<input type="hidden" name="Policy" value="<?php echo base64_encode($policy); ?>">
		<input type="hidden" name="Signature" value="<?php echo base64_encode(hash_hmac('sha1', base64_encode($policy), $awsSecretKey, true)); ?>
"> 

<br />Message:<br />
<textarea name="file" cols="60" rows="20" value="Leave a message" required></textarea>
	<br />
    <input type="submit" name="submit" value="Send your Message" />
	</form> </body>
</html>
