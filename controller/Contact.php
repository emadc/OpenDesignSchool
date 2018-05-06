<?php

/**
 * Class Contact
 *
 * use to show the contact page
 */
class Contact {
	
	/**
	 * 
	 * @param unknown $params
	 */
	public function showContact($params) {
		$manager = new LayoutManager ();
		
		$valid = ! empty ( $params ['valid'] ) ? $params ['valid'] : null;
		
		$myView = new View ( 'contact' );
		$myView->render ( array (
				'menu' => $manager->getMenu (),
				'bottom' => $manager->getPage ( 'bottom' ),
				'zone1' => $manager->getPage ( 'zone_1' ),
				'zone2_social1' => $manager->getPage ( 'social_1' ),
				'zone2_social2' => $manager->getPage ( 'social_2' ),
				'zone2_social3' => $manager->getPage ( 'social_3' ),
				'zone3' => $manager->getPage ( 'zone_3' ),
				'zone4' => $manager->getPage ( 'zone_4' ),'valid' => $valid 
		) );
	}
	
	/**
	 *
	 * @param unknown $params
	 */
	public function showDevis($params) {
		$manager = new LayoutManager ();
		
		$valid = ! empty ( $params ['valid'] ) ? $params ['valid'] : null;
		
		$myView = new View ( 'devis' );
		$myView->render ( array (
				'menu' => $manager->getMenu (),
				'bottom' => $manager->getPage ( 'bottom' ),
				'zone1' => $manager->getPage ( 'zone_1' ),
				'zone2_social1' => $manager->getPage ( 'social_1' ),
				'zone2_social2' => $manager->getPage ( 'social_2' ),
				'zone2_social3' => $manager->getPage ( 'social_3' ),
				'zone3' => $manager->getPage ( 'zone_3' ),
				'zone4' => $manager->getPage ( 'zone_4' ),'valid' => $valid
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
	public function setDevis($params) {
		extract ( $params );
		
		while ( $value = current ( $values ) ) {
			$valuesClean [key ( $values )] = $this->test_input ( $value );
			next ( $values );
		}
		
		$manager = new ContactManager ();
		$manager->setDevis( $valuesClean );
		
		$myView = new View ();
		$myView->redirect ( 'devis/valid/1' );
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
		$manager->setContact ( $valuesClean );
		
		$myView = new View ();
		$myView->redirect ( 'contacts' );
	}
	
	/**
	 */
	public function getContact($params) {
		extract ( $params );
		
		$manager = new ContactManager ();
		echo $manager->find ( $id );
	}
	
	/**
	 */
	public function getDevis($params) {
		extract ( $params );
		
		$manager = new ContactManager ();
		echo $manager->findDevis( $id );
	}
	
	/**
	 */
	public function setAsRead($params) {
		extract ( $params );
		
		$manager = new MessageManager ();
		echo $manager->setAsRead ( $id );
	}
	
	/**
	 */
	public function setDevisAsRead($params) {
		extract ( $params );
		
		$manager = new MessageManager ();
		echo $manager->setDevisAsRead( $id );
	}
	
	/**
	 */
	public function getMessage($params) {
		extract ( $params );
		
		$manager = new MessageManager ();
		echo $manager->find ( $id );
	}
	
	/**
	 *
	 * @param unknown $id        	
	 */
	public function deleteContact($params) {
		extract ( $params );
		
		$manager = new ContactManager ();
		$manager->delete ( $id );
		
		$myView = new View ();
		$myView->redirect ( 'contacts' );
	}
	
	/**
	 *
	 * @param unknown $id
	 */
	public function deleteDevis($params) {
		extract ( $params );
		
		$manager = new ContactManager ();
		$manager->deleteDevis( $id );
		
		$myView = new View ();
		$myView->redirect ( 'devis' );
	}
	
	/**
	 *
	 * @param unknown $id        	
	 */
	public function deleteMEssage($params) {
		extract ( $params );
		
		$manager = new MessageManager ();
		$manager->delete ( $id );
		
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
		$data = filter_var ( $data, FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$data = filter_var ( $data, FILTER_SANITIZE_STRING );
		return $data;
	}
}