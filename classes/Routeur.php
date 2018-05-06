<?php

/**
 * Class Routeur
 *
 * create routes and find controller
 */
class Routeur
{
    private $request;

    /**
     * Array of the available routeses, role and area to manage the accesses
     * @var array
     */
    private $routes = [
    		""					=> ["controller" => 'Home', 			"method" => 'showHome',			"area" => 'PUBLIC',	"role" => 'USER'],
    		"home"             	=> ["controller" => 'Home', 			"method" => 'showHome',			"area" => 'PUBLIC',	"role" => 'USER'],
    		"404"     			=> ["controller" => 'Home',				"method" => 'notFound',			"area" => 'PUBLIC',	"role" => 'USER'],
    		"contact"          	=> ["controller" => 'Contact', 			"method" => 'showContact',		"area" => 'PUBLIC',	"role" => 'USER'],
    		"devis"          	=> ["controller" => 'Contact', 			"method" => 'showDevis',		"area" => 'PUBLIC',	"role" => 'USER'],
    		"message"     		=> ["controller" => 'Contact', 			"method" => 'setMessage',		"area" => 'PUBLIC',	"role" => 'USER'],
    		"demande_devis"  	=> ["controller" => 'Contact', 			"method" => 'setDevis',			"area" => 'PUBLIC',	"role" => 'USER'],
    		"contact_delete"    => ["controller" => 'Contact', 			"method" => 'deleteContact',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"devis_delete"    	=> ["controller" => 'Contact', 			"method" => 'deleteDevis',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"messag_delete"		=> ["controller" => 'Contact', 			"method" => 'deleteMessage',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"set_contact"		=> ["controller" => 'Contact', 			"method" => 'setContact',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"admin"		     	=> ["controller" => 'Administration', 	"method" => 'showAdmin',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"login"		     	=> ["controller" => 'Administration', 	"method" => 'login',			"area" => 'PUBLIC',	"role" => 'USER'],
    		"auth"		     	=> ["controller" => 'Administration', 	"method" => 'checkUser',		"area" => 'PUBLIC',	"role" => 'USER'],
    		"logout"			=> ["controller" => 'Administration',	"method" => 'logout',			"area" => 'PUBLIC',	"role" => 'USER'],
    		"messages"	     	=> ["controller" => 'Administration', 	"method" => 'showMessages',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"contacts"	     	=> ["controller" => 'Administration', 	"method" => 'showContacts',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"devis_admin"     	=> ["controller" => 'Administration', 	"method" => 'showDevis',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"services_admin"   	=> ["controller" => 'Administration', 	"method" => 'showServices',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"gallery"	     	=> ["controller" => 'Administration', 	"method" => 'showGallery',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"gallery_grid"	    => ["controller" => 'Administration', 	"method" => 'showGalleryGrid',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"about"	     		=> ["controller" => 'Administration', 	"method" => 'showAbout',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"welcame"	     	=> ["controller" => 'Administration', 	"method" => 'showWelcame',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"bottom"	     	=> ["controller" => 'Administration', 	"method" => 'showBottom',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"footer"	     	=> ["controller" => 'Administration', 	"method" => 'showFooter',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"zone_1"	     	=> ["controller" => 'Administration', 	"method" => 'showFooter',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"social_1"	     	=> ["controller" => 'Administration', 	"method" => 'showFooter',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"zone_3"	     	=> ["controller" => 'Administration', 	"method" => 'showFooter',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"zone_4"	     	=> ["controller" => 'Administration', 	"method" => 'showFooter',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"sections"	     	=> ["controller" => 'Administration', 	"method" => 'showSections',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"galerie"			=> ["controller" => 'Gallery', 			"method" => 'showGallery',		"area" => 'PUBLIC',	"role" => 'USER'],
    		"gallery_upload"   	=> ["controller" => 'Gallery',		 	"method" => 'galleyUpload',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"gallery_delete"	=> ["controller" => 'Gallery', 			"method" => 'deleteMedia',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_media"			=> ["controller" => 'Gallery', 			"method" => 'getMedia',			"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_contact"  		=> ["controller" => 'Contact',			"method" => 'getContact',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_message" 		=> ["controller" => 'Contact',			"method" => 'getMessage',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_devis" 		=> ["controller" => 'Contact',			"method" => 'getDevis',			"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_contact"  		=> ["controller" => 'Contact',			"method" => 'getContact',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"set_devis"	   		=> ["controller" => 'Contact', 			"method" => 'setDevis',			"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"count_msgs"	    => ["controller" => 'Contact', 			"method" => 'countNewMsgs',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"set_read"	   		=> ["controller" => 'Contact', 			"method" => 'setAsRead',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"set_devis_read"	=> ["controller" => 'Contact', 			"method" => 'setDevisAsRead',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"service_upload"	=> ["controller" => 'Service', 			"method" => 'serviceUpload',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_service"		=> ["controller" => 'Service', 			"method" => 'getService',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"service_delete"	=> ["controller" => 'Service', 			"method" => 'deleteService',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"service_page"		=> ["controller" => 'Service', 			"method" => 'setPage',			"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"services"			=> ["controller" => 'Service', 			"method" => 'showServices',		"area" => 'PUBLIC',	"role" => 'USER'],
    		"page_upload"		=> ["controller" => 'Page', 			"method" => 'pageUpload',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"page_admin"		=> ["controller" => 'Page', 			"method" => 'setPage',			"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"page_find"			=> ["controller" => 'Page', 			"method" => 'findPage',			"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"page_delete"		=> ["controller" => 'Page', 			"method" => 'deletePage',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"page"				=> ["controller" => 'Page', 			"method" => 'showPage',			"area" => 'PUBLIC',	"role" => 'USER'],
    		"sections_delete"   => ["controller" => 'Sections',			"method" => 'deleteSection',	"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"get_section"		=> ["controller" => 'Sections',			"method" => 'getSection',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    		"set_section"		=> ["controller" => 'Sections',			"method" => 'setSection',		"area" => 'PRIVATE',"role" => 'ADMIN'],
    ];

    private $username;
    private $role;
    
    public function __construct($request)
    {
        $this->request = $request;
        // création de la session utilisateur
        $this->username = $this->getUsername();
        $this->role     = $this->getRole();
    }

    /**
     * Parsing of the url
     * @return mixed
     */
    public function getRoute()
    {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    /**
     * Parsing of the parameters
     * @return mixed[]
     */
    public function getParams()
    {

        $params = array();

        $elements = explode('/', $this->request);
        unset($elements[0]);

        for($i = 1; $i<count($elements); $i++)
        {
            $params[$elements[$i]] = $elements[$i+1];
            $i++;
        }

        if($_POST)
        {
            foreach($_POST as $key => $val)
            {
                $params[$key] = $val;
            }
        }

        return $params;

    }

    /**
     * Verification of the access rights and render of the controller
     */
    public function renderController()
    {
        
        $route  = $this->getRoute();
        $params = $this->getParams();
        if(key_exists($route, $this->routes))
        {
        	// vérification des droits utilisateur
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
    
    /**
     * Get the user in the session
     * @return mixed
     */
    public function getUsername()
    {
    	if(!isset($_SESSION['username'])) return null;
    	return $_SESSION['username'];
    }
    
    /**
     * Get the role in the session
     * @return mixed
     */
    public function getRole()
    {
    	if(!isset($_SESSION['role'])) return null;
    	return $_SESSION['role'];
    }
}