<?php

/**
 * Class Administration
 *
 * use to show the contact page
 */
class Administration {
	
	private $newMsgs;
	
	public function __construct(){
		$newMsgs = new MessageManager();
		$this->newMsgs = $newMsgs->getMessages(true);
	}
	
	public function showAdmin($params) {
		$myView = new View ( 'admin', 'admin/' );
		$myView->render ( array ('role' => $_SESSION['role'], 'newMsgs' => $this->newMsgs) );
	}
	
	/**
	 */
	public function login() {
		$myView = new View ( 'login', 'admin/' );
		$myView->render ( array ('role' => null) );
	}
	/**
	 */
	public function register() {
		$myView = new View ( 'register', 'admin/' );
		$myView->render ( array ('role' => null) );
	}
	/**
	 */
	public function forgot() {
		$myView = new View ( 'forgot', 'admin/' );
		$myView->render ( array ('role' => null) );
	}
	/**
	 */
	public function logout() {
		session_unset(); 
		session_destroy();
		$myView = new View ( 'login', 'admin/' );
		$myView->render ( array ('role' => null) );
	}
	
	public function checkUser($params){
		
		extract ( $params );
// 		echo "values<pre>"; var_dump ( $values ); exit ();
		$manager = new UserManager();
				
		$role = null;
		
		if($user = $manager->getUser($values['login'], $values['password'])) {
			$role = $user['role'];
			$username = $user['username'];
			$template = "admin";
			$_SESSION['role']     = $role;
			$_SESSION['username'] = $username;
			$myView = new View ( $template, 'admin/' );
			$myView->render ( array ('role' => $role) );
		}
		else{
			$myView = new View();
			$myView->redirect ( 'login' );
		}
		
	}
	
	/**
	 * 
	 */
	public function showMessages(){
		$manager= new MessageManager();
		$messages = $manager->getMessages();
		
		$myView = new View ( 'messages', 'admin/' );
		$myView->render ( array ('role' => $_SESSION['role'], 'messages' => $messages, 'newMsgs' => $this->newMsgs) );
	}
	
	/**
	 *
	 */
	public function showContacts(){
		$manager= new ContactManager();
		$contacts = $manager->getContacts();
		
		$myView = new View ( 'contacts', 'admin/' );
		$myView->render ( array ('role' => $_SESSION['role'], 'contacts' => $contacts, 'newMsgs' => $this->newMsgs) );
	}
	
	/**
	 *
	 */
	public function showGallery(){
		$myView = new View ( 'gallery', 'admin/' );
		$myView->render ( array ('role' => $_SESSION['role'], 'newMsgs' => $this->newMsgs) );
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function edit($params) {
		extract ( $params );
		
		if (isset ( $id )) {
			
			$manager = new ContactManager ();
			$contact = $manager->find ( $id );
		} else {
			$contact = new ContactObj ();
		}
		
		$myView = new View ( 'edit' );
		$myView->render ( array (
				'contact' => $contact 
		) );
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function save($params) {
		extract ( $params );
		echo "values<pre>";
		var_dump ( $values );
		
		while ( $value = current ( $values ) ) {
			$valuesClean [key ( $values )] = $this->test_input ( $value );
			next ( $values );
		}
		// echo "values<pre>"; var_dump ( $valuesClean ); exit ();
		$manager = new ContactManager ();
		$manager->save ( $valuesClean );
		
		$myView = new View ();
		$myView->redirect ( 'contact/valid/1' );
	}
	
	/**
	 *
	 * @param unknown $data        	
	 * @return string
	 */
	public function test_input($data) {
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = filter_var ( $data, FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$data = filter_var ( $data, FILTER_SANITIZE_STRING );
		return $data;
	}
}