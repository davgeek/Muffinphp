<?php
/**
 * Request Class
 * Check the url controller, method, and params.
 */
class Request {

    protected $url;
    protected $controller;
    protected $defaultController = 'home';
    protected $method;
    protected $defaultMethod = 'index';
    protected $params = array();

    public function __construct($url)
    {
        $this->url = $url;

        $urlSegments = explode('/', $this->getUrl());

        $this->resolveController($urlSegments);
        $this->resolveMethod($urlSegments);
        $this->resolveParams($urlSegments);
    }

    /**
     * Method resolveController
     * set the controller to request object.
     */
    public function resolveController(&$urlSegments)
    {
        $this->controller = array_shift($urlSegments);

        if (empty($this->controller)) {
            $this->controller = $this->defaultController;
        }
    }

    /**
     * Method resolveMethod
     * set the method to request object.
     */
    public function resolveMethod(&$urlSegments)
    {
        $this->method = array_shift($urlSegments);

        if (empty($this->method)) {
            $this->method = $this->defaultMethod;
        }
    }

    /**
     * Method resolvParams
     * set params to request object.
     */
    public function resolveParams(&$urlSegments)
    {
        $this->params = $urlSegments;
    }

    /**
     * Method getUrl
     * @return String url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Method getController
     * @return String controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Method getControllerClassName
     * @return String class name
     */
    public function getControllerClassName()
    {
        return Inflector::camel($this->getController()) . 'Controller';
    }

    /**
     * Method getControllerFileName
     * @return String controller file name
     */
    public function getControllerFileName()
    {
        return DIR_CONTROLLERS . $this->getControllerClassName() . '.php';
    }

    /**
     * Method getMethod
     * @return String method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Method getMethodName
     * @return String method name
     */
    public function getMethodName()
    {
        return Inflector::lowerCamel($this->getMethod());
    }

    /**
     * Method getParams
     * @return Array params of the request
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Method execute
     * execute the respose object
     */
    public function execute()
    {
        $controllerClassName = $this->getControllerClassName();
        $controllerFileName  = $this->getControllerFileName();
        $methodName    = $this->getMethodName();
        $params              = $this->getParams();

        if (!file_exists($controllerFileName)) {
            require DIR_CONTROLLERS.'ErrorController.php';
            $controller = new ErrorController();
            $response = $controller->index();
            $this->executeResponse($response);
            header("HTTP/1.0 404 Not Found");
            exit;
        }

        require $controllerFileName;
        $controller = new $controllerClassName();

        if (!method_exists($controller, $methodName)) {
            require DIR_CONTROLLERS.'ErrorController.php';
            $controller = new ErrorController();
            $response = $controller->index();
            $this->executeResponse($response);
            header("HTTP/1.0 404 Not Found");
            exit;
        }

        $response = call_user_func_array([$controller, $methodName], $params);

        $this->executeResponse($response);
    }

    /**
     * Method executeRespose
     * Can return a respose, string and json encoded array
     * @param  Respose $response instance of respose
     */
    public function executeResponse($response)
    {
        if ($response instanceof Response) {
            $response->execute();
        }elseif (is_string($response)) {
            echo $response;
        }elseif(is_array($response)) {
            echo json_encode($response);
        }else {
            exit('Invalid Response');
        }
    }

}