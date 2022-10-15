<?php

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '65642dc772644f7e8a32d405fbb7774b',
    '016b036d3e2543aca63f65d7f1baf725',
    'http://localhost:8080/callback'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    print_r($api->me());
} else {
    $options = [
        'scope' => [
            'user-read-email',
        ],
    ];

    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}