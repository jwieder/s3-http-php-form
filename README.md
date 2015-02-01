# s3-http-php-form v0.01
###A simple HTTP form to POST text to Amazon S3 using PHP without installing the Amazon SDK

by Josh Wieder 

* ©2015
* http://joshwieder.blogspot.com
* josh.wieder@live.com

This project will allow you to save text input from a form into an Amazon S3 bucket of your choice. The code is based on the [AWS Signature v2 specification appendix](http://docs.aws.amazon.com/AmazonS3/latest/dev/HTTPPOSTExamples.html#HTTPPOSTExamplesTextArea).

| **Prerequisites** | **Description** |
| ------------- | ----------- |
| PHP | confirmed with version 5.4.16, but anything above version 4.4 with probably work fine |
| Amazon S3 | You must have an Amazon S3 bucket and IAM user Access Keys |

###Instructions

A single configuration file is located in `conf/s3_conf.php`. You must update this file with the name of your Amazon S3 bucket, and your IAM user access keys. If you have not already setup keys for an IAM user, check out the ["Managing Access Keys for IAM Users" Amazon User Guide](http://docs.aws.amazon.com/IAM/latest/UserGuide/ManagingCredentials.html).

Implementing the form is as simple as a quick PHP include into a pre-existing HTML page like so: 

```
<?php include("post.php") ?>
```

Alternatively, you can build around `post.php` to create a brand new age. Bear in mind that as it stands `post.php` does not include a complete `<head>` section. Amazon also requires that requests to the S3 service be formatted using UTF-8.