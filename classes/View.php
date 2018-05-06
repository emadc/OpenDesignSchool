<?php


class View
{

	private $path;
    private $template;

    public function __construct($template = null, $path = null)
    {
        $this->template = $template;
        $this->path = $path;
    }

    /**
     * Render of the view
     * @param array $params
     */
    public function render($params = array())
    {
        extract($params); 
        $template = $this->template;
        ob_start();
        include(VIEW.$this->path.$template.'.php');
        $contentPage = ob_get_clean();
        include_once (VIEW.$this->path.'layout.php');
    }

    /**
     * Redirect toward another page
     * @param mixed $route
     */
    public function redirect($route)
    {
        header("Location: ".HOST.$route);
        exit;
    }

}