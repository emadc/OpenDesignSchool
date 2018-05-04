<?php

/**
 * Class Administration
 *
 * use to show the contact page
 */
class Administration {
	private $newMsgs;
	public function __construct() {
		$newMsgs = new MessageManager ();
		$this->newMsgs = $newMsgs->getMessages ( true );
	}
	public function showAdmin($params) {
		$myView = new View ( 'admin', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function login() {
		$myView = new View ( 'login', 'admin/' );
		$myView->render ( array (
				'role' => null 
		) );
	}
	/**
	 */
	public function register() {
		$myView = new View ( 'register', 'admin/' );
		$myView->render ( array (
				'role' => null 
		) );
	}
	/**
	 */
	public function forgot() {
		$myView = new View ( 'forgot', 'admin/' );
		$myView->render ( array (
				'role' => null 
		) );
	}
	/**
	 */
	public function logout() {
		session_unset ();
		session_destroy ();
		$myView = new View ( 'login', 'admin/' );
		$myView->render ( array (
				'role' => null 
		) );
	}
	public function checkUser($params) {
		extract ( $params );
		// echo "values<pre>"; var_dump ( $values ); exit ();
		$manager = new UserManager ();
		
		$role = null;
		
		if ($user = $manager->getUser ( $values ['login'], $values ['password'] )) {
			$role = $user ['role'];
			$username = $user ['username'];
			$template = "admin";
			$_SESSION ['role'] = $role;
			$_SESSION ['username'] = $username;
			$myView = new View ( $template, 'admin/' );
			$myView->render ( array (
					'role' => $role,
					'newMsgs' => $this->newMsgs 
			) );
		} else {
			$myView = new View ();
			$myView->redirect ( 'login' );
		}
	}
	
	/**
	 */
	public function showMessages() {
		$manager = new MessageManager ();
		$messages = $manager->getMessages ();
		
		$myView = new View ( 'messages', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'messages' => $messages,
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showContacts() {
		$manager = new ContactManager ();
		$contacts = $manager->getContacts ();
		
		$myView = new View ( 'contacts', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'contacts' => $contacts,
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showServices() {
		$manager = new ServicesManager ();
		$services = $manager->getServices ();
		
		$manager = new ServicesManager ();
		$page = $manager->getPage ( 'services' );
		
		$myView = new View ( 'services', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'services' => $services,
				'page' => $page,
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showGallery() {
		$manager = new GalleryManager ();
		
		$myView = new View ( 'gallery', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'gallery' => $manager->getGallery (),
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showGalleryGrid() {
		$manager = new GalleryManager ();
		
		$myView = new View ( 'gallery_grid', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'gallery' => $manager->getGallery (),
				'newMsgs' => $this->newMsgs
		) );
	}
	
	/**
	 */
	public function showAbout() {
		$manager = new PageManager ();
		$page = $manager->getPage ( 'qui_sommes_nous' );
		
		$myView = new View ( 'about', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'page' => $page,
				'newMsgs' => $this->newMsgs 
		) );
	}
}