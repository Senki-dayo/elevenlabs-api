<!-- アーティストIDからアルバム情報を取得する -->
<?php

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    $albums = $api->getArtistAlbums('6n4SsAp5VjvIBg3s9QCcPX');
    foreach ($albums->items as $album) {
        echo '<b>' . $album->name . '</b> <br>';
    }

} else {
    $options = [
        'scope' => [
            'user-read-email',
        ],
    ];

    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}

?>