<!-- Spotifyのカタログを検索する -->
<?php
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    
    $session->requestCredentialsToken();
    $accessToken = $session->getAccessToken();
    $api->setAccessToken($accessToken);

    $result = $api->search('Bon Jovi', 'artist');
    print_r($result);

?>

<pre>
    <?php print_r($result) ?>
</pre>