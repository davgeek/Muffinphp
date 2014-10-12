<?php

/**
 * ErrorController for handle 404 errors and others.
 */
class ErrorController {

	public function index()
	{
		$view = new View('error');
		
		// add assets styles to view
        $view->assets('styles',[
            'css/styles.css',
        ]);

        return $view;
	}
}