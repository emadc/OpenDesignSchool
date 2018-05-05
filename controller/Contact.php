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
		
		$valid = !empty($params['valid']) ? $params['valid'] : null;
		
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
	public function setMessage($params) {
		extract ( $params );
		
		while ( $value = current ( $values ) ) {
			$valuesClean [key ( $values )] = $this->test_input ( $value );
			next ( $values );
		}
		
		$manager = new ContactManager ();
		$manager->setMessage ( $valuesClean );
		
		$myView = new View ();
		$myView->redirect ( 'contact/valid/1' );
	}
	
	/**
	 *
	 * @param unknown $params
	 */
	public function setContact($params) {
		extract ( $params );
		
		while ( $value = current ( $values ) ) {
			$valuesClean [key ( $values )] = $this->test_input ( $value );
			next ( $values );
		}
		
		$manager = new ContactManager ();
		$manager->setContact( $valuesClean );
		
		$myView = new View ();
		$myView->redirect ( 'contacts' );
	}
	
	/**
	 * 
	 */
	public function getContact($params){
		extract ( $params );
		
		$manager = new ContactManager ();
		echo $manager->find($id);
	}
	
	/**
	 *
	 */
	public function countNewMsgs(){
		$manager = new MessageManager();
		echo $manager->countNewMsgs();
	}
	
	/**
	 *
	 */
	public function setAsRead($params){
		extract ( $params );
		
		$manager = new MessageManager ();
		echo $manager->setAsRead($id);
	}
	
	/**
	 *
	 */
	public function getMessage($params){
		extract ( $params );
		
		$manager = new MessageManager ();
		echo $manager->find($id);
	}
	
	/**
	 * 
	 * @param unknown $id
	 */
	public function deleteContact($params) {
		extract ( $params );
		
		$manager = new ContactManager ();
		$manager->delete($id);
		
		$myView = new View ();
		$myView->redirect ( 'contacts' );
	}
	
	/**
	 *
	 * @param unknown $id
	 */
	public function deleteMEssage($params) {
		extract ( $params );
		
		$manager = new MessageManager();
		$manager->delete($id);
		
		$myView = new View ();
		$myView->redirect ( 'contacts' );
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