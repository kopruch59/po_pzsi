<?php
/**
 * Model for Google integration.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
class GoogleModel extends Model {
    
    private static $instance;
    
    /**
     * @var Google_Client Google client object.
     */
    public $client;
    
    /**
     * @var Google_Service_Calendar Google Calendar service.
     */
    public $calendarService;
    
    /**
     * Returns single instance of class. If instance is not invoke create a new one.
     * 
     * @return GoogleModel Instance.
     * 
     * @static
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public static function getInstance() {

        if (is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    public function __construct() {
        parent::__construct();
        /**
         * @var string Uri to where fetch response from Google API.
         */
        define('GOOGLE_API_AUTH_RESPONSE_REDIRECT', APPLICATION_URL_IP . 'user/loginWithGoogle');
        /**
         * @var string Path to credentials in Google.
         */
        define('GOOGLE_API_CREDENTIALS_PATH', '~/.credentials/calendar-php-quickstart.json');
        /**
         * @var string Absolute path to Google API client secret file.
         */
        define('GOOGLE_API_CLIENT_SECRET_PATH', DIR_CONFIG . 'googleAPI_clientSecret.json');
        // If modifying these scopes, delete your previously saved credentials
        // at ~/.credentials/calendar-php-quickstart.json
        define(
            'GOOGLE_API_SCOPES',
            implode(' ', [
                Google_Service_Calendar::CALENDAR,
                Google_Service_Oauth2::USERINFO_PROFILE,
            ])
        );

        date_default_timezone_set('America/New_York');
        
        $client = new Google_Client();
        $client->setApplicationName('PO pzsi student schedule');
        $client->setScopes(GOOGLE_API_SCOPES);
        $client->setAuthConfig($this->prepareAuthConfig(GOOGLE_API_CLIENT_SECRET_PATH));
        $client->setAccessType('offline');
        $this->client = $client;
        $this->calendarService = new Google_Service_Calendar($this->client);
        
        static::$instance = $this;
    }
    
    /**
     * Expands the home directory alias '~' to the full path.
     * 
     * @param string $path the path to expand.
     * @return string the expanded path.
     * 
     * @editor theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    private function expandHomeDirectory(string $path) {
        $homeDirectory = getenv('HOME');
        if (empty($homeDirectory)) {
            $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
        }
        
        return str_replace('~', realpath($homeDirectory), $path);
    }

    /**
     * Returns an authorized API client.
     * 
     * @return Google_Client the authorized client object
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
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
    
    /**
     * Prepares Google Auth configuration from JSON file received from Google API Console.
     * Modifications are made to the configuration based on this file.
     * 
     * @return array Array with Auth configuration received from JSON file and modified.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    private function prepareAuthConfig(string $configFilePath) {
        
        if (!file_exists($configFilePath)) {
            throw new InvalidArgumentException('Google Auth config file does not exist!');
        }
        
        $jsonAuthConfig = file_get_contents($configFilePath);
        
        if (!$config = json_decode($jsonAuthConfig, true)) {
            throw new LogicException('Invalid JSON for auth config.');
        }
        
        //Fix for Google response error with Auth code "redirect_uri_mismatch" on localhost IP address.
        $config['installed']['redirect_uris'] = [GOOGLE_API_AUTH_RESPONSE_REDIRECT];
        
        return $config;
    }
}
