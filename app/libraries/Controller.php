<?php
/**
 * BASE CONTROLLER
 *  This loads the Models and Views
 * This is the base controller so every controller that we create include the Pages 
 * is going to extend this controller because this is going to include the methods
 * to load the model and load the view and we should be able to those things
 * from our controller
 */

 class Controller {
    /**
     * Load model from our controller
     * lets say were in our Pages if we want to load a post model 
     * we can pass in post in the parameter and then what we want to do
     * is we want to require that file from the model folder 
     * what ever model we're trying to load so we're just gonna require it.
     *  */  

    public function model ($model) {
        // Require model file
        require_once('../app/models/'. $model.'.php');

        // Instantiate model
        return new $model;
        
    }

    /**
     * Load view
     * This is gonna take 2 things 
     * 1. is going to take the view and thats gonna be basically the file
     * so in the views folder if we put for example add.php 
     * 2. we pass in an array called data and this is gonna represent the dynamic values
     * that we can pass in our views because when we're in our controller and we wanna load a view 
     * we want to be able to pass data into the view
     *  */ 
    public function view($view, $data = []){
        // Check for the view file
        if (file_exists("../app/views/".$view.".php")) {
            require_once('../app/views/'. $view.'.php');
        } else {
            // View does not exists
            die('View does not exists.');
        }

    }
 }