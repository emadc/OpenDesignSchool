<?php

/**
 * Class Routeur
 *
 * create routes and find controller
 */
class Routeur
{
    private $request;

    private $routes = [
    						""					=> ["controller" => 'Home', 	"method" => 'showHome'],
                            "home"             	=> ["controller" => 'Home', 	"method" => 'showHome'],
                            "contact"          	=> ["controller" => 'Contact', 	"method" => 'showContact'],
    						"contact-save"     	=> ["controller" => 'Contact', 	"method" => 'save'],
                            "create-devinette"	=> ["controller" => 'Home', 	"method" => 'editDev'],
                            "ajout"            	=> ["controller" => 'Home', 	"method" => 'addDev'],
                            "delete"           	=> ["controller" => 'Home', 	"method" => 'delDev'],
                            "modification"     	=> ["controller" => 'Home', 	"method" => 'editDev'],
    						"404"     			=> ["controller" => 'Home',		"method" => 'notFound'],

    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getRoute()
    {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams()
    {

        $params = array();

        // extract GET params
        $elements = explode('/', $this->request);
        unset($elements[0]);

        for($i = 1; $i<count($elements); $i++)
        {
            $params[$elements[$i]] = $elements[$i+1];  //delete/id/4 => id/4
            $i++;
        }

        // extract POST params
        if($_POST)
        {
            foreach($_POST as $key => $val)
            {
                $params[$key] = $val;
            }
        }

        return $params;

    }

    public function renderController()
    {
        
        $route  = $this->getRoute();
        $params = $this->getParams();
        
        if(key_exists($route, $this->routes))
        {

            // authorisation
            $controller = $this->routes[$route]['controller'];
            $method     = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);

        } else {
        	header("Location: ".HOST."404");
        }

    }
}