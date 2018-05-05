<?php

/**
 * Class Sections
 *
 * use to show the contact page
 */
class Sections {
	
	/**
	 *
	 * @param unknown $params
	 */
	public function setSection($params) {
		extract ( $params );
		echo "values<pre>"; var_dump($values); 
		$manager = new SectionManager();
		$manager->setSection( $values);
		
		$myView = new View ();
		$myView->redirect ( 'sections' );
	}
	
	/**
	 * 
	 */
	public function getSection($params){
		extract ( $params );
		
		$manager = new SectionManager();
		echo $manager->find($id);
	}
	
	/**
	 * 
	 * @param unknown $id
	 */
	public function deleteSection($params) {
		extract ( $params );
		
		$manager = new SectionManager();
		$manager->delete($id);
		
		$myView = new View ();
		$myView->redirect ( 'sections' );
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