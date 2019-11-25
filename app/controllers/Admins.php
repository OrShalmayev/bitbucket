<?php

class Admins extends Controller {
    /**
     * getting data from models using constructor
     */
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
    }

    /**
     * @GET /admins
     * 
     */
    public function index(){
        // if admin then allow viewing the admin page
        if($_SESSION['isAdmin']){
            $_SESSION['current_url']=NULL;
            $data = [
                'title' => 'Admin Control Panel',
                'icon' => 'fas fa-tachometer-alt'
            ];

            $this->view('admin/index', $data);

        }else{
            // Not admin => redirect to login page
            header("Location:".URLROOT."admins/login");
        }

    }

    public function all_patients(){
        // if admin then allow viewing the admin page
        if($_SESSION['isAdmin']){
            $_SESSION['current_url']="all_patients";
            // var_dump($this->userModel->getUsers());
            $data = [
                'title' => 'All Patients',
                'icon' => 'fas fa-users',
                'users' => $this->userModel->getUsers()
            ];

            $this->view('admin/index', $data);

        }else{
            // Not admin => redirect to login page
            header("Location:".URLROOT."admins/login");
        }
        
    }

    
    public function add_patient(){
        // if admin then allow viewing the admin page
        if($_SESSION['isAdmin']){
            $_SESSION['current_url']="add_patient";
            $data = [
                'title' => 'Add Patient',
                'icon' => 'fas fa-user-plus'
            ];
            // check for POST action
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $patient_type = $_POST['patient_type'];
                $patient_email = $_POST['patient_email'];
                $this->userModel->addUser($patient_type, $patient_email);
                // redirect to all patients
                header("Location:".URLROOT.'admins/all_patients');
            }

            $this->view('admin/index', $data);

        }else{
            // Not admin => redirect to login page
            header("Location:".URLROOT."admins/login");
        }
        
    }


    /**
     * @GET /user/login && @POST
     */
    public function login(){
        // Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $e = $_POST['email'];
            $p = $_POST['password'];
            if($this->adminModel->getAdmin($e, $p)){
                // Email and Password correct
                // Create a session 
                $_SESSION['isAdmin'] = true;
                
                // redirect to admin pannel
                header("Location:".URLROOT."admins");
            }else{
                // details incorrect

                // Show error message
                $data = [
                    'title'=> 'Admin Login',
                    'error_msg' => 'Email or password incorrect.'
                    
                ];
            }
        }else{
            $data = [
                'title'=> 'Admin Login',
                'error_msg' => ''
                
            ];
        }


        $this->view('admin/login', $data);
    }


    /**
     * @GET admins/logout
     */
    public function logout(){
        if($_SESSION['isAdmin']){
            // destroy all sessions
            session_destroy();
            // redirect to home page
            header("Location:". URLROOT);

        }else{
            header("Location:". URLROOT . "admins/login");
        }
    }



}

