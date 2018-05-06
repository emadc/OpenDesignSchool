<?php

/**
 * Class Sections
 *
 * use to show the contact page
 */
class Sections {
	
	/**
	 * Register a section
	 * @param mixed $params
	 */
	public function setSection($params) {
		extract ( $params );
		$manager = new SectionManager();
		$manager->setSection( $values);
		
		$myView = new View ();
		$myView->redirect ( 'sections' );
	}
	
	/**
	 * Get a section in json format
	 */
	public function getSection($params){
		extract ( $params );
		
		$manager = new SectionManager();
		echo $manager->find($id);
	}
	
	/**
	 * Delete a section
	 * @param mixed $id
	 */
	public function deleteSection($params) {
		extract ( $params );
		
		$manager = new SectionManager();
		$manager->delete($id);
		
		$myView = new View ();
		$myView->redirect ( 'sections' );
	}
	
}