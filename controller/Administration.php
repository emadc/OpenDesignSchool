<?php

/**
 * Class Administration
 *
 * use to show the contact page
 */
class Administration {
	public function showAdmin($params) {
		$myView = new View ( 'admin', 'admin/' );
		$myView->render ( array () );
	}
	
	/**
	 */
	public function login() {
		$myView = new View ( 'login', 'admin/' );
		$myView->render ( array () );
	}
	/**
	 */
	public function register() {
		$myView = new View ( 'register', 'admin/' );
		$myView->render ( array () );
	}
	/**
	 */
	public function forgot() {
		$myView = new View ( 'forgot', 'admin/' );
		$myView->render ( array () );
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