<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UserController extends BaseController
{

    public function __construct()
    {
        // Load the URL helper, it will be useful in the next steps
        // Adding this within the __construct() function will make it 
        // available to all views in the ResumeController
        helper('url'); 

        $this->session = session();
    }

    public function admin()
    {
        // Create an instance of the Model
        $userModel = new \App\Models\UserModel();

        // Get the value of the 'search' query parameter from the request
        $search = $this->request->getGet('search');
        
        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the MenuItemModel
            foreach ($userModel->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            // Retrieve items matching the search conditions, order by name in ascending order
            $users = $userModel->where($whereClause)->orderBy('username', 'ASC')->findAll();
        } else {
            // If no search query is provided
            
            // Retrieve all items, order by id in ascending order
            $users = $userModel->orderBy('id', 'ASC')->findAll();
        }
        
        // Store the retrieved items in the $data array
        $data['users'] = $users;

        
        // Load the 'Admin' view and pass the $data array to it
        return view('UserAdmin', $data);
    }

    public function addedit($id = null)
    {   
        $userModel = new \App\Models\UserModel();
        // var_dump($this->request->getMethod());
    
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();
    
            if ($id === null) {
                if ($userModel->insert($data)) {
                    $this->session->setFlashdata('success', 'User added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add User. Please try again.');
                }
            } else {
                if ($userModel->update($id, $data)) {
                    $this->session->setFlashdata('success', 'User updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update User. Please try again.');
                }
            }
            return redirect()->to('/admin/user');
        }
    
        $data['users'] = ($id === null) ? null : $userModel->find($id);
    
        return view('EditUser', $data);
    }

    public function delete($id)
    {
        $userModel = new \App\Models\UserModel();

        if ($userModel->delete($id)) {
            $this->session->setFlashdata('success', 'User deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete User. Please try again.');
        }

        return redirect()->to('/admin/user');
    }

    public function showuser($id)
    {
        // Create an instance of the Model
        $userModel = new \App\Models\UserModel();

        // Fetch user details by id
        $user = $userModel->find($id);
    
        // Ensure user exists
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User Not Found');
        }
    
        // Fetch related data
        $data['user'] = $user;

        return view('ShowUser', $data);
    }

    public function register()
    {
        // Show registration form
        return view('Register');
    }

    public function store()
    {
        // Handle form submission to register new user
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'created_at' => date('Y-m-d H:i:s'), // Current time
            'created_from' => 'web', // Assuming registration from web
        ];
        // Insert data into database
        $this->userModel->insert($data);
        // Redirect to login page
        return redirect()->to('/login');
    }

    public function login()
    {
        // Show login form
        return view('Login');
    }

    // Implement login method to handle login form submission and authentication

    // Implement viewMenu method to display menu items

    // Implement createOrder method to handle order creation

    // Implement other methods as needed
}
