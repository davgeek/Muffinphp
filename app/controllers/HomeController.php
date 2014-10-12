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

        // add assets styles to view
        $view->assets('styles',[
            'css/styles.css',
        ]);

        // add assets javascripts to view
        $view->assets('javascripts',[
            'js/custom.js',
        ]);

        // add one var to View
    	$view->data('author','Dav Lizárraga');

        // Intance of User
        $user = new User();
        
        // add user to DB.
        $user->addUser('David','dav@davgeek.com');

        // add array data to View
    	$view->dataArray('numeros',['uno','dos','tres','cuatro','cinco']);

        // return view instance.
        return $view; 
    }

}