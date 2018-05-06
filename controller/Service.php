<?php

/**
 * Class Service
 *
 * use to show the contact page
 */
class Service {
	
	/**
	 */
	public function showServices() {
		$manager = new LayoutManager ();
		
		$services = new ServicesManager ();
		
		
		$myView = new View ( 'services' );
		$myView->render ( array (
				'menu' => $manager->getMenu (),
				'bottom' => $manager->getPage ( 'bottom' ),
				'zone1' => $manager->getPage ( 'zone_1' ),
				'zone2_social1' => $manager->getPage ( 'social_1' ),
				'zone2_social2' => $manager->getPage ( 'social_2' ),
				'zone2_social3' => $manager->getPage ( 'social_3' ),
				'zone3' => $manager->getPage ( 'zone_3' ),
				'zone4' => $manager->getPage ( 'zone_4' ),
				'page' => $manager->getPage ( "services" ),
				'services' => $services->getServices () 
		) );
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function serviceUpload($params) {
		extract ( $params );
		$target_dir = UPOLOADS . "services/";
		$target_file = $target_dir . basename ( $_FILES ["fileToUpload"] ["name"] );
		
		$imageFileType = strtolower ( pathinfo ( $target_file, PATHINFO_EXTENSION ) );
		// Check if image file is a actual image or fake image
		if (isset ( $_POST ["submit"] )) {
			$check = getimagesize ( $_FILES ["fileToUpload"] ["tmp_name"] );
			if ($check !== false) {
			} else {
				echo "<script>alert('File " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " is not an image.'); location.assign('services');</script>";
				die ();
				exit ();
			}
		}
		
		// Check file size
		if ($_FILES ["fileToUpload"] ["size"] > 5000000) {
			echo "<script>alert('Sorry, your file " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " is too large.'); location.assign('services');</script>";
			die ();
			exit ();
		}
		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); location.assign('services');</script>";
			die ();
			exit ();
		}
		// Check by an error
		if (move_uploaded_file ( $_FILES ["fileToUpload"] ["tmp_name"], $target_file )) {
			$manager = new ServicesManager ();
			$manager->setService ( $values, basename ( $_FILES ["fileToUpload"] ["name"] ) );
			$myView = new View ();
			$myView->redirect ( 'services_admin' );
		} else {
			echo "<script>alert('Sorry, there was an error uploading your file.'); location.assign('services');</script>";
		}
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function setPage($params) {
		extract ( $params );
		
		$manager = new PageManager();
		$manager->setPage ( $values );
		$myView = new View ();
		$myView->redirect ( 'services_admin' );
	}
	
	/**
	 */
	public function getService($params) {
		extract ( $params );
		
		$manager = new ServicesManager ();
		echo $manager->find ( $id );
	}
	
	/**
	 *
	 * @param unknown $id        	
	 */
	public function deleteService($params) {
		extract ( $params );
		
		$manager = new ServicesManager ();
		$manager->delete ( $id );
		
		$myView = new View ();
		$myView->redirect ( 'services_admin' );
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