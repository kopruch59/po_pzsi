<?php
/**
 * Model for Google integration prototype.
 */
class GoogleModel extends Model {
    
    /**
     * @var Google_Client Google client object.
     */
    public $client;
    
    /**
     * @var Google_Service_Calendar Google Calendar service.
     */
    public $service;

    public function __construct() {
        parent::__construct();
        /**
         * @var string Path to credentials in Google.
         */
        define('GOOGLE_API_CREDENTIALS_PATH', '~/.credentials/calendar-php-quickstart.json');
        /**
         * @var string Absolute path to Google API client secret file.
         */
        define('GOOGLE_API_CLIENT_SECRET_PATH', DIR_CONFIG . 'clientSecretGoogleAPI.json');
        // If modifying these scopes, delete your previously saved credentials
        // at ~/.credentials/calendar-php-quickstart.json
        define('GOOGLE_API_SCOPES', implode(' ', [Google_Service_Calendar::CALENDAR_READONLY]));

        date_default_timezone_set('America/New_York'); // Prevent DateTime tz exception
        
        $this->client = $this->getClient();
        $this->service = new Google_Service_Calendar($this->client);
    }
    
    /**
     * Expands the home directory alias '~' to the full path.
     * @param string $path the path to expand.
     * @return string the expanded path.
     */
    private function expandHomeDirectory($path) {
        $homeDirectory = getenv('HOME');
        if (empty($homeDirectory)) {
            $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
        }
        
        return str_replace('~', realpath($homeDirectory), $path);
    }

    /**
     * Returns an authorized API client.
     * @return Google_Client the authorized client object
     */
    private function getClient() {
        
        $client = new Google_Client();
        $client->setApplicationName('PO pzsi student schedule');
        $client->setScopes(GOOGLE_API_SCOPES);
        $client->setAuthConfig(GOOGLE_API_CLIENT_SECRET_PATH);
        $client->setAccessType('offline');

        // Load previously authorized credentials from a file.
        $credentialsPath = $this->expandHomeDirectory(GOOGLE_API_CREDENTIALS_PATH);
        if (file_exists($credentialsPath)) {
            $accessToken = json_decode(file_get_contents($credentialsPath), true);
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

            // Store the credentials to disk.
            if (!file_exists(dirname($credentialsPath))) {
                mkdir(dirname($credentialsPath), 0700, true);
            }
            file_put_contents($credentialsPath, json_encode($accessToken));
            printf("Credentials saved to %s\n", $credentialsPath);
        }
        $client->setAccessToken($accessToken);

        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
        }
        
        return $client;
    }
}
