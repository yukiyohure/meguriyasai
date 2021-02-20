<?php
require 'vendor/autoload.php';
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

$config = Configuration::instance();

$account = parse_url(getenv('CLOUDINARY_URL'));
$config->cloud->cloudName = $account['host'];
$config->cloud->apiKey = $account['user'];
$config->cloud->apiSecret = $account['pass'];
$config->url->secure = true;
