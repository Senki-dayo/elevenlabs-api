<!-- ユーザ情報からよく聞く曲の情報を取り出す -->
<?php

    $api = new SpotifyWebAPI\SpotifyWebAPI();

    if (isset($_GET['code'])) {
        $session->requestAccessToken($_GET['code']);
        $api->setAccessToken($session->getAccessToken());

    } else {
        header('Location: ' . $session->getAuthorizeUrl(array(
            'scope' => array( 
                'playlist-read-private', 
                'playlist-modify-private', 
                'user-read-private',
                'playlist-modify',
                'user-top-read'
            )
        )));
        die();
    }

    $top = $api->getMyTop('tracks', ['limit' => 4]);
    print_r($top);