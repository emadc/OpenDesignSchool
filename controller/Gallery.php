<?php

/**
 * Class Contact
 *
 * use to show the contact page
 */
class Gallery {
	
	/**
	 * Render of gallery page
	 * @param mixed $params
	 */
	public function showGallery($params) {
		$manager = new LayoutManager ();
		
		$gallery = new GalleryManager();
		
		$myView = new View ( 'gallery' );
		$myView->render ( array (
				'menu' => $manager->getMenu (),
				'bottom' => $manager->getPage ( 'bottom' ),
				'zone1' => $manager->getPage ( 'zone_1' ),
				'zone2_social1' => $manager->getPage ( 'social_1' ),
				'zone2_social2' => $manager->getPage ( 'social_2' ),
				'zone2_social3' => $manager->getPage ( 'social_3' ),
				'zone3' => $manager->getPage ( 'zone_3' ),
				'zone4' => $manager->getPage ( 'zone_4' ),
				'medias'=> $gallery->getGallery(),
		) );
	}
	
	/**
	 * Upload an image in the gallery
	 * @param mixed $params
	 */
	public function galleyUpload($params) {
		extract ( $params );
		$target_dir = UPOLOADS . "gallery/";
		$target_file = $target_dir . basename ( $_FILES ["fileToUpload"] ["name"] );
		
		$imageFileType = strtolower ( pathinfo ( $target_file, PATHINFO_EXTENSION ) );
		// Check if image file is a actual image or fake image
		if (isset ( $_POST ["submit"] )) {
			$check = getimagesize ( $_FILES ["fileToUpload"] ["tmp_name"] );
			if ($check !== false) {
			} else {
				echo "<script>alert('File " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " is not an image.'); location.assign('gallery');</script>";
				die ();
				exit ();
			}
		}
		
		// Check file size
		if ($_FILES ["fileToUpload"] ["size"] > 5000000) {
			echo "<script>alert('Sorry, your file " . basename ( $_FILES ["fileToUpload"] ["name"] ) . " is too large.'); location.assign('gallery');</script>";
			die ();
			exit ();
		}
		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); location.assign('gallery');</script>";
			die ();
			exit ();
		}
		// Check by an error
		if (move_uploaded_file ( $_FILES ["fileToUpload"] ["tmp_name"], $target_file )) {
			$manager = new GalleryManager();
			$manager->setMedia( $values, basename ( $_FILES ["fileToUpload"] ["name"] ) );
			$myView = new View ();
			$myView->redirect ( $params['grid'] ? 'gallery_grid' : 'gallery' );
		} else {
			echo "<script>alert('Sorry, there was an error uploading your file.'); location.assign('gallery');</script>";
		}
	}
	
	/**
	 *  Look for a media
	 */
	public function getMedia($params){
		extract ( $params );
		
		$manager = new GalleryManager();
		echo $manager->find($id);
	}
	
	/**
	 * Delete a media
	 * @param mixed $id
	 */
	public function deleteMedia($params) {
		extract ( $params );
		
		$manager = new GalleryManager();
		$manager->delete($id);
		
		$myView = new View ();
		$myView->redirect ( 'gallery' );
	}
	
}