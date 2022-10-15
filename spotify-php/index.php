<?php

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '65642dc772644f7e8a32d405fbb7774b',
    '016b036d3e2543aca63f65d7f1baf725',
    'http://localhost:8080/callback'
);

require('script4.php');

?>