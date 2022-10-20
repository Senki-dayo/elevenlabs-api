<?php

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'id',
    'secret',
    'redirect-uri'
);

require('script4.php');

?>