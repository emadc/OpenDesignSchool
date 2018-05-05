<?php

/**
 * Class Administration
 *
 * use to show the contact page
 */
class Administration {
	private $newMsgs;
	/**
	 */
	public function __construct() {
		$newMsgs = new MessageManager ();
		$this->newMsgs = $newMsgs->getMessages ( true );
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
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
		$myView = new View ( 'messages', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'messages' => $manager->getMessages (),
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showContacts() {
		$manager = new ContactManager ();
		
		$myView = new View ( 'contacts', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'contacts' => $manager->getContacts (),
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showServices() {
		$manager = new ServicesManager ();
		$page = new PageManager ();
		$myView = new View ( 'services', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'services' => $manager->getServices (),
				'page' => $page->getPage ( 'services' ),
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
		$myView = new View ( 'about', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'page' => $manager->getPage ( 'qui_sommes_nous' ),
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showWelcame() {
		$manager = new PageManager ();
		$myView = new View ( 'welcame', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'page' => $manager->getPage ( 'welcame' ),
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showBottom() {
		$manager = new PageManager ();
		$myView = new View ( 'bottom', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'page' => $manager->getPage ( 'bottom' ),
				'newMsgs' => $this->newMsgs 
		) );
	}
	
	/**
	 */
	public function showFooter() {
		$manager = new PageManager ();
		$myView = new View ( 'footer', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'zone1' => $manager->getPage ( 'zone_1' ),
				'zone2_social1' => $manager->getPage ( 'social_1' ),
				'zone2_social2' => $manager->getPage ( 'social_2' ),
				'zone2_social3' => $manager->getPage ( 'social_3' ),
				'zone3' => $manager->getPage ( 'zone_3' ),
				'zone4' => $manager->getPage ( 'zone_4' ),
				'newMsgs' => $this->newMsgs
		) );
	}
	
	/**
	 */
	public function showSections() {
		$sections = new SectionManager ();
		$myView = new View ( 'sections', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'sections' => $sections->getSections (),
				'newMsgs' => $this->newMsgs 
		) );
	}
}