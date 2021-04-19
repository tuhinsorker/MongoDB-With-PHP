# MongoDB Configaretion with PHP

After installing the mongodb you To use MongoDB PHP driver download it from the following site: https://pecl.php.net/package/mongodb. You should download the latest version of it. Now unzip the archive and put php_mongo.dll in your PHP extension directory.

after that go to your php ini file and put the extension = php_mongo.dll 
then restart your apache, mysql

### Connect MongoDB with PHP

The preferred method of installing the PHP library is with Composer by running the following from your project root:

open the composer and hit it 'composer require mongodb/mongodb'


For connecting to the MongoDB database you need to specify the name of the database, if the database does not exist then MongoDB will create it automatically.

### Following is the code for that:

<?php 
	require "vendor/autoload.php";

	// connect to mongodb
	$con = new MongoDB\Client("mongodb://localhost:27017");


