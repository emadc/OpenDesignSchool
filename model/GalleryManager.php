<?php
class GalleryManager {
	private $bdd;
	public function __construct() {
		$config = parse_ini_file ( __DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true );
		$this->bdd = new PDO ( "mysql:host=" . $config ['sql'] ['ods'] ['host'] . "; dbname=" . $config ['sql'] ['ods'] ['base'] . "; charset=utf8", $config ['sql'] ['ods'] ['user'], $config ['sql'] ['ods'] ['pass'] );
	}
	
	/**
	 * restituisce un array di oggetti ContactObj
	 *
	 * @return ArrayObject ContactObj
	 */
	public function getGallery($home = false) {
		$bdd = $this->bdd;
		$gallery = new ArrayObject ();
		
		/**
		 * * accès au model **
		 */
		$query = "SELECT * FROM gallery ".($home ? "ORDER BY id DESC limit 0,8" : "");
		
		$req = $bdd->prepare ( $query );
		$req->execute ();
		while ( $row = $req->fetch ( PDO::FETCH_ASSOC ) ) {
			
			$galleryObj = new GalleryObj ();
			$galleryObj->setId ( $row ['id'] );
			$galleryObj->setFileName ( $row ['file_name'] );
			$galleryObj->setTitle ( $row ['title'] );
			$galleryObj->setText ( $row ['text'] );
			$galleryObj->setDateModif ( $row ['date_modif'] );
			
			$gallery [] = $galleryObj;
		}
		;
		
		
		return $gallery;
	}
	public function setMedia($values, $fileName) {
		$bdd = $this->bdd;
		
		if (isset ( $values ['id'] )) {
			$query = "UPDATE gallery SET title = :title, text = :text, file_name = :file_name, date_modif = CURRENT_TIMESTAMP WHERE id = :id; ";
		} else {
			$query = "INSERT INTO gallery (title, text, file_name)
            VALUES (:title, :text, :file_name);";
		}
		
		$req = $bdd->prepare ( $query );
		
		if (isset ( $values ['id'] ))
			$req->bindValue ( ':id', $values ['id'], PDO::PARAM_INT );
		$req->bindValue ( ':title', $values ['title'], PDO::PARAM_STR );
		$req->bindValue ( ':text', $values ['text'], PDO::PARAM_STR );
		$req->bindValue ( ':file_name', $fileName, PDO::PARAM_STR );
		$req->execute ();
	}
	public function find($id) {
		$bdd = $this->bdd;
		
		$query = "SELECT * FROM gallery WHERE id=:id";
		$req = $bdd->prepare ( $query );
		$req->bindValue ( ':id', $id, PDO::PARAM_INT );
		$req->execute ();
		
		$results = $req->fetchAll ( PDO::FETCH_ASSOC );
		$json = '{ "data": ' . json_encode ( $results ) . '}';
		
		
		return $json;
	}
	public function delete($id) {
		$bdd = $this->bdd;
		$query = "DELETE FROM gallery WHERE id = :id";
		
		$req = $bdd->prepare ( $query );
		$req->bindValue ( ':id', $id, PDO::PARAM_INT );
		
		$req->execute ();
	}
}