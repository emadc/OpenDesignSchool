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
    		""					=> ["controller" => 'Home', 			"method" => 'showHome',		"area" => 'PUBLIC',	"role" => ''],
    		"home"             	=> ["controller" => 'Home', 			"method" => 'showHome',		"area" => 'PUBLIC',	"role" => ''],
    		"404"     			=> ["controller" => 'Home',				"method" => 'notFound',		"area" => 'PUBLIC',	"role" => ''],
    		"contact"          	=> ["controller" => 'Contact', 			"method" => 'showContact',	"area" => 'PUBLIC',	"role" => ''],
    		"message"     		=> ["controller" => 'Contact', 			"method" => 'setMessage',	"area" => 'PUBLIC',	"role" => ''],
    		"contact_delete"    => ["controller" => 'Contact', 			"method" => 'deleteContact',"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"messag_delete"		=> ["controller" => 'Contact', 			"method" => 'deleteMessage',"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"admin"		     	=> ["controller" => 'Administration', 	"method" => 'showAdmin',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"login"		     	=> ["controller" => 'Administration', 	"method" => 'login',		"area" => 'PUBLIC',	"role" => ''],
    		"register"		    => ["controller" => 'Administration', 	"method" => 'register',		"area" => 'PUBLIC',	"role" => ''],
    		"forgot"		    => ["controller" => 'Administration', 	"method" => 'forgot',		"area" => 'PUBLIC',	"role" => ''],
    		"auth"		     	=> ["controller" => 'Administration', 	"method" => 'checkUser',	"area" => 'PUBLIC',	"role" => ''],
    		"logout"			=> ["controller" => 'Administration',	"method" => 'logout',		"area" => 'PUBLIC',	"role" => ''],
    		"messages"	     	=> ["controller" => 'Administration', 	"method" => 'showMessages',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"contacts"	     	=> ["controller" => 'Administration', 	"method" => 'showContacts',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"services"	     	=> ["controller" => 'Administration', 	"method" => 'showServices',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"gallery"	     	=> ["controller" => 'Administration', 	"method" => 'showGallery',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"gallery_upload"   	=> ["controller" => 'Gallery',		 	"method" => 'galleyUpload',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_contact"  		=> ["controller" => 'Contact',			"method" => 'getContact',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_message" 		=> ["controller" => 'Contact',			"method" => 'getMessage',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"set_contact"	    => ["controller" => 'Contact', 			"method" => 'setContact',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"count_msgs"	    => ["controller" => 'Contact', 			"method" => 'countNewMsgs',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"set_read"	   		=> ["controller" => 'Contact', 			"method" => 'setAsRead',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"service_upload"	=> ["controller" => 'Service', 			"method" => 'serviceUpload',"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_service"		=> ["controller" => 'Service', 			"method" => 'getService',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"service_delete"	=> ["controller" => 'Service', 			"method" => 'deleteService',"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"service_page"		=> ["controller" => 'Service', 			"method" => 'setPage',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    ];

    private $username;
    private $role;
    
    public function __construct($request)
    {
        $this->request = $request;
        // create the user session
//         echo "Role<pre>"; var_dump($this->getRole()); exit();
        $this->username = $this->getUsername();
        $this->role     = $this->getRole();
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
//         echo "<pre>"; var_dump($this->routes[$route]); exit();
        if(key_exists($route, $this->routes))
        {
            // authorisation
        	if ($this->routes[$route]['area'] == "PUBLIC") 
        	{
        		$controller = $this->routes[$route]['controller'];
        		$method     = $this->routes[$route]['method'];
        		
        		$currentController = new $controller();
        		$currentController->$method($params);
            }
            else 
            {
            	if ($this->routes[$route]['role'] == $this->role) {
            		$controller = $this->routes[$route]['controller'];
            		$method     = $this->routes[$route]['method'];
            		
            		$currentController = new $controller();
            		$currentController->$method($params);
            	}
            	else {
            		$controller = $this->routes[$route]['controller'];
            		$method     = "login";
            		
            		$currentController = new $controller();
            		$currentController->$method($params);
            	}
            }
        } 
        else 
        {
        	header("Location: ".HOST."404");
        }

    }
    
    public function getUsername()
    {
    	if(!isset($_SESSION['username'])) return null;
    	return $_SESSION['username'];
    }
    
    public function getRole()
    {
    	if(!isset($_SESSION['role'])) return null;
    	return $_SESSION['role'];
    }
}