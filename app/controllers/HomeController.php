<?php

require_once '../app/models/User.php';

/**
 * HomeController demostrative example
 */
class HomeController {

    /**
     * Method index
     * Demostrative example of index
     * @return [type] [description]
     */
    public function index()
    {   
        // Instance of View
    	$view = new View('home');

        // add one var to View
    	$view->addVar('author','Dav Lizárraga');

        // Intance of User
        $user = new User();
        
        // add user to DB.
        $user->addUser('David','dav@davgeek.com');

        // add one array to View
    	$view->addArray('numeros',['uno','dos','tres','cuatro','cinco']);

        // return view instance.
        return $view; 
    }

}