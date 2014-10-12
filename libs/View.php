<?php

/**
 * View Handler extends Respose
 */
class View extends Response {

    protected $template;
    protected $vars = array();
    protected $assets = array();

    /**
     * Constructor
     * @param String $template template name
     * @param array  $vars     vars sends to view
     */
    public function __construct($template, $vars = array())
    {
        $this->template = $template;
        $this->vars = $vars;
    }

    /**
     * Method getTemplate
     * @return String template name
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Method getVars
     * @return array vars of the intance
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * Method data
     * add any var to a view.
     */
    public function data($var,$value)
    {
        $this->vars[$var] = $value;
    }

    /**
     * Method dataArray
     * add any array to a view.
     */
    public function dataArray($var, $value = array() )
    {
        $this->vars[$var] = $value;
    }

    /**
     * Method assets
     * add css's or javascript's to view.
     */
    public function assets($var, $value = array() )
    {
        for ($i=0; $i < count($value) ; $i++) { 
            $value[$i] = URL.$value[$i];
        }
        $this->vars[$var] = $value;
    }

    /**
     * Method execute
     * prepare the view response
     */
    public function execute()
    {
        $template = $this->getTemplate();
        $vars = $this->getVars();

        call_user_func(function () use ($template, $vars) {
            extract($vars);

            ob_start();

            require_once DIR_VIEWS."$template.tpl.php";

            $view_content = ob_get_clean();

            require_once DIR_VIEWS."layout.tpl.php";
        });
    }

}