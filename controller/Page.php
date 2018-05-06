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
				'zone1' => $manager->getPage ( 'zone_1' ),
				'zone2_social1' => $manager->getPage ( 'social_1' ),
				'zone2_social2' => $manager->getPage ( 'social_2' ),
				'zone2_social3' => $manager->getPage ( 'social_3' ),
				'zone3' => $manager->getPage ( 'zone_3' ),
				'zone4' => $manager->getPage ( 'zone_4' ),
				'page' => $manager->getPage ( $params ['id'] )
		) );
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function pageUpload($params) {
		extract ( $params );
		$target_dir = UPOLOADS;
		$target_file = $target_dir . basename ( $_FILES ["fileToUpload"] ["name"] );
		$values['file_name='] = basename ( $_FILES ["fileToUpload"] ["name"] );
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
			$manager->setPage ( $values, basename ( $_FILES ["fileToUpload"] ["name"] ));
			$myView = new View ();
			$myView->redirect ( $values ['item_alias'] );
		} else {
			echo "<script>alert('Sorry, there was an error uploading your file.'); location.assign('" . $values ['item_alias'] . "');</script>";
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
		$myView->redirect ( $values['item_alias'] );
	}
	
	/**
	 */
	public function getPage($item_alias) {
		$manager = new PageManager();
		$page = $manager->getPage ( $item_alias );
		return $page;
	}
	
	/**
	 *
	 */
	public function findPage($params){
		extract ( $params );
		
		$manager = new PageManager();
		echo $manager->find($id);
	}
	
	/**
	 *
	 * @param unknown $id
	 */
	public function deletePage($params) {
		extract ( $params );
		
		$manager = new PageManager();
		$manager->delete($id);
		
		$myView = new View ();
		$myView->redirect ( $values['item_alias'] );
	}
	
}