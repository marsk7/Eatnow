<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Google\Client as GoogleClient;

class AuthController extends Controller
{
    // Protected properties can be accessed within the class and by classes derived from that class
    protected $client;   // Will hold the instance of the Google Client
    protected $base_url; // Will hold the base URL of the app from the environment variables

    /**
     * Class constructor.
     */
    public function __construct()
    {
        // Store the base URL in the class property from the .env file
        $this->base_url = getenv('app.baseURL');

        // Instantiate the Google Client and set it up with the necessary details
        $this->client = new GoogleClient();
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));        // Set the Google Client ID from .env
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET')); // Set the Google Client Secret from .env
        $this->client->setRedirectUri($this->base_url . 'login/callback'); // Set the Redirect URI for Google OAuth callback
        $this->client->addScope("email");   // Request access to user's email
        $this->client->addScope("profile"); // Request access to user's basic profile info
    }
    /**
     * Initiates Google OAuth login process.
     */
    public function google_login()
    {
        // Get the authentication URL from the Google Client
        $authUrl = $this->client->createAuthUrl();
        // Redirect the user to Google's OAuth server
        $session = session();
        // var_dump($session);
        return redirect()->to($authUrl);
    }

    /**
     * Google OAuth callback function.
     */
    public function google_callback()
    {
        // Fetch the access token using the authorization code received from Google
        $token = $this->client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));
        // Set the access token to the Google Client
        $this->client->setAccessToken($token);

        // Create a new Google Oauth2 service instance
        $google_oauth = new \Google\Service\Oauth2($this->client);
        // Get user information from Google
        $google_account_info = $google_oauth->userinfo->get();
        // var_dump($google_account_info);

        // Load the user model to interact with the database
        $userModel = new \App\Models\UserModel();
        // Check if the user's email exists in the database
        $user = $userModel->where('email', $google_account_info->email)->first();

        if (!$user) {
            // If the user doesn't exist, create a new user with the info from Google
            $newData = [
                'email' => $google_account_info->email,
                'username' => $google_account_info->name,
                'first_name' => $google_account_info->given_name,
                'last_name' => $google_account_info->family_name,
                'isAdmin' => false, // Default new user as not an admin
            ];
            $userModel->insert($newData);
            // Retrieve the newly created user info
            $user = $userModel->where('email', $google_account_info->email)->first();
        }

        // Set user information in the session
        session()->set([
            'isLoggedIn' => true,
            'id' => $user['id'],
            'email' => $user['email'],
            'username' => $user['username'],
            'isAdmin' => $user['isAdmin'] // Assumes 'isAdmin' field is a boolean in your user table
        ]);
        // var_dump(session()->get('isAdmin'));
        // Redirect user to the admin dashboard if they are an admin, otherwise to their resume page
        if (session()->get('isAdmin')) {
            return redirect()->to('/admin');
        } else {
            // return redirect()->to('/login/' . session()->get('id'));
            return redirect()->to('/');
        }
    }

    /**
     * Logs the user out by clearing session data.
     */
    public function logout()
    {
        // Access the session service
        $session = session();
        
        // Remove specific session variables
        $session->remove(['isLoggedIn', 'id', 'email', 'username', 'isAdmin']);
        
        // Redirect the user to the homepage
        return redirect()->to('/');
    }

    public function login()
    {
        // Handle login logic
        return view('auth/login');
    }

    public function register()
    {
        // Handle registration logic
        return view('auth/register');
    }
}
