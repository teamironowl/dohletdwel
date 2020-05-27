<?php

namespace App\GoogleDrive;

use Google_Client; 
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class Push
{
    public function toGoogleDrive()
    {
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        // Get the API client and construct the service object.
        $client = $this->getClient();
        $service = new Google_Service_Drive($client);

        //Insert a file
        $file = new Google_Service_Drive_DriveFile();
        $file->setName(uniqid().'.jpg');
        $file->setDescription('A test document');
        $file->setMimeType('image/jpeg');

        $data = file_get_contents(public_path('logo.jpg'));

        $createdFile = $service->files->create($file, array(
            'data' => $data,
            'mimeType' => 'image/jpeg',
            'uploadType' => 'multipart'
            ));

        print_r($createdFile);
    }

    function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Drive API PHP Quickstart');
        $client->setScopes(Google_Service_Drive::DRIVE_METADATA_READONLY);
        $client->setAuthConfig(app_path('GoogleDrive/credentials.json'));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = app_path('GoogleDrive/token.json');
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }
}