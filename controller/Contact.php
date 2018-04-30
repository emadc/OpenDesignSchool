<?php

/**
 * Class Contact
 *
 * use to show the contact page
 */
class Contact {
	public function showContact($params) {
		$manager = new LayoutManager ();
		
		$menu = $manager->getMenu ();
		
		$footer = $manager->getFooter ();
		
		$valid = $params['valid'] ? $params['valid'] : null;
		
		$myView = new View ( 'contact' );
		$myView->render ( array (
				'menu' => $menu,
				'footer' => $footer,
				'valid' => $valid
		) );
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
// 		echo "values<pre>"; var_dump ( $valuesClean ); exit ();
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
		$data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$data = filter_var($data, FILTER_SANITIZE_STRING);
		return $data;
	}
}