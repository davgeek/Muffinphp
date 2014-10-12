<?php

/**
 * ErrorController for handle 404 errors and others.
 */
class ErrorController {

	public function index()
	{
		return new View('error',['title' => 'Error']);
	}
}