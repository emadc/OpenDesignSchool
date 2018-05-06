<?php

/**
 * Class Administration
 *
 * use to show the contact page
 */
class Administration {
	private $newMsgs;
	private $newDevis;
	/**
	 */
	public function __construct() {
		$newMsgs = new MessageManager ();
		$this->newMsgs = $newMsgs->getMessages ( true );
		$this->newDevis = $newMsgs->getDeviss( true );
	}
	
	/**
	 * Render of administration default page
	 * @param mixed $params        	
	 */
	public function showAdmin($params) {
		$manager = new GalleryManager ();
		$contact = new ContactManager();
		$myView = new View ( 'admin', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'gallery' => $manager->getGallery (true),
				'newMsgs' => $this->newMsgs, 
				'newDevis' => $this->newDevis,
				'prospects' => $contact->countContacts()
		) );
	}
	
	/**
	 * Render of login page
	 */
	public function login() {
		$myView = new View ( 'login', 'admin/' );
		$myView->render ( array (
				'role' => null 
		) );
	}
	
	/**
	 * Logout function
	 */
	public function logout() {
		session_unset ();
		session_destroy ();
		$myView = new View ( 'login', 'admin/' );
		$myView->render ( array (
				'role' => null 
		) );
	}
	
	/**
	 * Looking for user in the database
	 * @param unknown $params
	 */
	public function checkUser($params) {
		extract ( $params );
		$manager = new UserManager ();
		
		$role = null;
		
		if ($user = $manager->getUser ( $values ['login'], $values ['password'] )) {
			$role = $user ['role'];
			$username = $user ['username'];
			$template = "admin";
			$_SESSION ['role'] = $role;
			$_SESSION ['username'] = $username;
			$this->showAdmin($params);
		} else {
			$myView = new View ();
			$myView->redirect ( 'login' );
		}
	}
	
	/**
	 * Render of messages administration page
	 */
	public function showMessages() {
		$manager = new MessageManager ();
		$myView = new View ( 'messages', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'messages' => $manager->getMessages (),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of devis administration page
	 */
	public function showDevis() {
		$manager = new MessageManager ();
		$myView = new View ( 'devis', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'deviss' => $manager->getDeviss(),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of contacts administration page
	 */
	public function showContacts() {
		$manager = new ContactManager ();
		
		$myView = new View ( 'contacts', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'contacts' => $manager->getContacts (),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of services administration page
	 */
	public function showServices() {
		$manager = new ServicesManager ();
		$page = new PageManager();
		$myView = new View ( 'services', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'services' => $manager->getServices (),
				'page' => $page->getPage ( 'services' ),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of gallery administration page
	 */
	public function showGallery() {
		$manager = new GalleryManager ();
		$myView = new View ( 'gallery', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'gallery' => $manager->getGallery (),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of gallery grid administration page
	 */
	public function showGalleryGrid() {
		$manager = new GalleryManager ();
		$myView = new View ( 'gallery_grid', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'gallery' => $manager->getGallery (),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of about administration page
	 */
	public function showAbout() {
		$manager = new PageManager ();
		$myView = new View ( 'about', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'page' => $manager->getPage ( 'qui_sommes_nous' ),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of welcame administration area
	 */
	public function showWelcame() {
		$manager = new PageManager ();
		$myView = new View ( 'welcame', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'page' => $manager->getPage ( 'welcame' ),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of bottom administration area
	 */
	public function showBottom() {
		$manager = new PageManager ();
		$myView = new View ( 'bottom', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'page' => $manager->getPage ( 'bottom' ),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of footer administration area
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
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
	
	/**
	 * Render of sections administration area
	 */
	public function showSections() {
		$sections = new SectionManager ();
		$myView = new View ( 'sections', 'admin/' );
		$myView->render ( array (
				'role' => $_SESSION ['role'],
				'sections' => $sections->getSections (),
				'newMsgs' => $this->newMsgs,
				'newDevis' => $this->newDevis
		) );
	}
}