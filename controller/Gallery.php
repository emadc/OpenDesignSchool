<?php

/**
 * Class Contact
 *
 * use to show the contact page
 */
class Gallery {
	
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
	public function galleyUpload($params) {
		extract ( $params );
// 		echo "values<pre>"; var_dump ( $params); exit ();
		echo $values['title']." - ".$values['desc'];
		$target_dir = ROOT."uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
						$manager = new GalleryManager();
						$manager->setImage($values, basename( $_FILES["fileToUpload"]["name"]));
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
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
	public function getGallery($params){
		extract ( $params );
		
		$manager = new GalleryManager();
		echo $manager->getGallery();
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
	public function delete($params) {
		extract ( $params );
		
		$manager = new ContactManager ();
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