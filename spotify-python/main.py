import spotipy
from spotipy.oauth2 import SpotifyClientCredentials
import configparser

config = configparser.ConfigParser()
config.read('spotify-python/config.ini')

uri = 'spotify:artist:36QJpDe2go2KgaRleHCDTp'

my_id = config.get('SpotifyAPI','client_id')
my_secret = config.get('SpotifyAPI','client_secret')
ccm = SpotifyClientCredentials(client_id = my_id, client_secret = my_secret)
spotify = spotipy.Spotify(client_credentials_manager = ccm)
results = spotify.artist_top_tracks(uri)

for track in results['tracks'][:10]:
    print('track    : ' + track['name'])
    print('audio    : ' + track['preview_url'])
    print('cover art: ' + track['album']['images'][0]['url'])
    print()