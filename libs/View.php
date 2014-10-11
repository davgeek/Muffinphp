<?php
/**
 * View Handler extends Respose
 */
class View extends Response {

    protected $template;
    protected $vars = array();

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
     * Method addVar
     * add any var to a view.
     * @param [type] $var   [description]
     * @param [type] $value [description]
     */
    public function addVar($var,$value)
    {
        $this->vars[$var] = $value;
    }

    /**
     * Method addArray
     * add any array to a view.
     * @param [type] $var   [description]
     * @param array  $value [description]
     */
    public function addArray($var,$value = array() )
    {
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