<?php

/**
 * Class Service
 *
 * use to show the contact page
 */
class Service {
	
	public function showServices()
	{
		$manager = new LayoutManager();
		$menu = $manager->getMenu();
		$footer = $manager->getFooter();
		
		$manager = new ServicesManager();
		$services = $manager->getServices(true);
		
		$manager = new LayoutManager();
		$page = $manager->getPage("services");
		
		$myView = new View('services');
		$myView->render(array('menu' => $menu, 'footer' => $footer, 'page' => $page, 'services' => $services));
		
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function serviceUpload($params) {
		extract ( $params );
		// echo "values<pre>"; var_dump ( $params); exit ();
		$target_dir = UPOLOADS . "services/";
		$target_file = $target_dir . basename ( $_FILES ["fileToUpload"] ["name"] );
		
		// Check if file already exists
		if (file_exists ( $target_file )) {
			echo "<script>alert('Sorry, file " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " already exists.'); location.assign('services');</script>";
			die ();
			exit ();
		}
		
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
		if ($_FILES ["fileToUpload"] ["size"] > 500000) {
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
		// Check if $uploadOk is set to 0 by an error
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
		
		$manager = new ServicesManager ();
		$manager->setPage( $values );
		$myView = new View ();
		$myView->redirect ( 'services_admin' );
	}
	
	/**
	 */
	public function getPage($params) {
		extract ( $params );
		$manager = new LayoutManager();
		$page = $manager->getPage( $id );
		return $page;
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