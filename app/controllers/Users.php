<?php

class Users extends Controller{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /**
     * @Route('users/register/$token')
     */
    public function register(){
        $token = explode('/',$_GET['url'])[2];
        // Search for the unique token
        $user = $this->userModel->getUserByToken($token);
        // var_dump($user->id);
        if($user->token==$token){
            // if the request method is post then save the details in users table
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $fn = $_POST['first_name'];
                $ln = $_POST['last_name'];
                $p = $_POST['password'];
                // Validations
                if(isset($fn) && !empty($fn) && isset($ln) && !empty($ln) && isset($p) && !empty($p)){
                    var_dump($fn,$ln,$p);
                    $this->userModel->confirmUser($fn, $ln, $p, $user->id);
                }else{
                    // Token have been found keep the user in the registeration from
                    // $user = $this->userModel
                    $data = [
                        'title'=> 'Patient Type',
                        'icon' => 'fas fa-notes-medical text-success',
                        'user' => $user,
                        'error_msg' => 'Fill all fields correctly.'
                    ];
                    $this->view('user/register', $data);
                }
            }else{
                // Token have been found keep the user in the registeration from
                // $user = $this->userModel
                $data = [
                    'title'=> 'Patient Type',
                    'icon' => 'fas fa-notes-medical text-success',
                    'user' => $user
                ];
                $this->view('user/register', $data);
            }

        }else{
            // token is incorrect then redirect to home page
            header("Location:".URLROOT);
        }
    }


}