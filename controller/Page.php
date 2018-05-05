<?php

/**
 * Class Page
 *
 * use to show the contact page
 */
class Page {
	
	/**
	 * questa funzione puo mostrare una pagina generica associata ad un item di menu
	 */
	public function showPage($params) {
		$manager = new LayoutManager ();
		
		$myView = new View ( $params ['id'] );
		$myView->render ( array (
				'menu' => $manager->getMenu (),
				'bottom' => $manager->getPage ( 'bottom' ),
				'footer' => $manager->getFooter (),
				'page' => $manager->getPage ( $params ['id'] )
		) );
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function pageUpload($params) {
		extract ( $params );
		// echo "values<pre>"; var_dump ( $params); exit ();
		$target_dir = UPOLOADS;
		$target_file = $target_dir . basename ( $_FILES ["fileToUpload"] ["name"] );
		
		$imageFileType = strtolower ( pathinfo ( $target_file, PATHINFO_EXTENSION ) );
		// Check if image file is a actual image or fake image
		if (isset ( $_POST ["submit"] )) {
			$check = getimagesize ( $_FILES ["fileToUpload"] ["tmp_name"] );
			if ($check !== false) {
			} else {
				echo "<script>alert('File " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " is not an image.'); location.assign('" . $values ['item_alias'] . "');</script>";
				die ();
				exit ();
			}
		}
		
		// Check file size
		if ($_FILES ["fileToUpload"] ["size"] > 5000000) {
			echo "<script>alert('Sorry, your file " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " is too large.'); location.assign('" . $values ['item_alias'] . "');</script>";
			die ();
			exit ();
		}
		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); location.assign('" . $values ['item_alias'] . "');</script>";
			die ();
			exit ();
		}
		// Check if $uploadOk is set to 0 by an error
		if (move_uploaded_file ( $_FILES ["fileToUpload"] ["tmp_name"], $target_file )) {
			$manager = new PageManager ();
			$manager->setPage ( $values, basename ( $_FILES ["fileToUpload"] ["name"] ) );
			$myView = new View ();
			$myView->redirect ( $values ['item_alias'] );
		} else {
			echo "<script>alert('Sorry, there was an error uploading your file.'); location.assign('" . $values ['item_alias'] . "');</script>";
		}
	}
	
	/**
	 */
	public function getPage($item_alias) {
		$manager = new LayoutManager ();
		$page = $manager->getPage ( $item_alias );
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