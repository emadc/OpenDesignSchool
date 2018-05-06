<?php
class MessageManager {
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
	public function getMessages($new = false) {
		$bdd = $this->bdd;
		$messages = new ArrayObject ();
		$newStr = "WHERE 1";
		
		if ($new) {
			$newStr = "WhERE is_read = 0";
		}
		
		/**
		 * * accès au model **
		 */
		$query = "SELECT * FROM messages " . $newStr;
		
		$req = $bdd->prepare ( $query );
		$req->execute ();
		while ( $row = $req->fetch ( PDO::FETCH_ASSOC ) ) {
			
			$message = new MessageObj ();
			$message->setId ( $row ['id'] );
			$message->setNomPrenom ( $row ['nom_prenom'] );
			$message->setEmail ( $row ['email'] );
			$message->setTel ( $row ['tel'] );
			$message->setSociete ( $row ['societe'] );
			$message->setMessage ( $row ['message'] );
			$message->setDateCreation ( $row ['date_creation'] );
			$message->setRead ( $row ['is_read'] );
			
			$messages [] = $message;
		}
		;
		
		
		return $messages;
	}
	
	/**
	 *
	 * @param string $new        	
	 * @return ArrayObject|MessageObj
	 */
	public function getDeviss($new = false) {
		$bdd = $this->bdd;
		$messages = new ArrayObject ();
		$newStr = "WHERE 1";
		
		if ($new) {
			$newStr = "WhERE is_read = 0";
		}
		
		/**
		 * * accès au model **
		 */
		$query = "SELECT * FROM devis " . $newStr;
		
		$req = $bdd->prepare ( $query );
		$req->execute ();
		while ( $row = $req->fetch ( PDO::FETCH_ASSOC ) ) {
			
			$message = new MessageObj ();
			$message->setId ( $row ['id'] );
			$message->setNomPrenom ( $row ['nom_prenom'] );
			$message->setEmail ( $row ['email'] );
			$message->setTel ( $row ['tel'] );
			$message->setSociete ( $row ['societe'] );
			$message->setMessage ( $row ['message'] );
			$message->setDateCreation ( $row ['date_creation'] );
			$message->setRead ( $row ['is_read'] );
			
			$messages [] = $message;
		}
		;
		
		
		return $messages;
	}
	
	/**
	 * 
	 * @param unknown $values
	 */
	public function setMessage($values) {
		$bdd = $this->bdd;
		
		$query = "INSERT INTO messages (nom_prenom, email, tel, societe, message)
    		       VALUES (:nom_prenom, :email, :tel, :societe, :message);";
		
		$req = $bdd->prepare ( $query );
		
		$req->bindValue ( ':nom_prenom', $values ['nom_prenom'], PDO::PARAM_STR );
		$req->bindValue ( ':email', $values ['email'], PDO::PARAM_STR );
		$req->bindValue ( ':tel', $values ['tel'], PDO::PARAM_STR );
		$req->bindValue ( ':societe', $values ['societe'], PDO::PARAM_STR );
		$req->bindValue ( ':message', $values ['message'], PDO::PARAM_STR );
		$req->execute ();
	}
	
	/**
	 * restituisce un array di oggetti ContactObj
	 * 
	 * @return ArrayObject ContactObj
	 */
	public function getNewMsgs() {
		$bdd = $this->bdd;
		$messages = new ArrayObject ();
		$newMsgs = 0;
		/**
		 * * accès au model **
		 */
		$query = "SELECT COUNT(id) AS count FROM messages WHERE is_read = 0";
		
		$req = $bdd->prepare ( $query );
		$req->execute ();
		
		$results = $req->fetchAll ( PDO::FETCH_ASSOC );
		$json = '{ "data": ' . json_encode ( $results ) . '}';
		
		return $json;
	}
	
	/**
	 * 
	 * @param unknown $id
	 * @return string
	 */
	public function setAsRead($id) {
		$bdd = $this->bdd;
		
		$query = "UPDATE messages SET is_read = 1  WHERE id = :id; ";
		
		$req = $bdd->prepare ( $query );
		
		$req->bindValue ( ':id', $id, PDO::PARAM_INT );
		$req->execute ();
		
		return "ok";
	}
	
	/**
	 *
	 * @param unknown $id
	 * @return string
	 */
	public function setDevisAsRead($id) {
		$bdd = $this->bdd;
		
		$query = "UPDATE devis SET is_read = 1  WHERE id = :id; ";
		
		$req = $bdd->prepare ( $query );
		
		$req->bindValue ( ':id', $id, PDO::PARAM_INT );
		$req->execute ();
		
		return "ok";
	}

	/**
	 * 
	 * @param unknown $id
	 * @return string
	 */
	public function find($id) {
		$bdd = $this->bdd;
		
		$query = "SELECT * FROM messages WHERE id=:id";
		$req = $bdd->prepare ( $query );
		$req->bindValue ( ':id', $id, PDO::PARAM_INT );
		$req->execute ();
		
		$results = $req->fetchAll ( PDO::FETCH_ASSOC );
		$json = '{ "data": ' . json_encode ( $results ) . '}';
		
		
		return $json;
	}
	public function delete($id) {
		$bdd = $this->bdd;
		$query = "DELETE FROM messages WHERE id = :id";
		
		$req = $bdd->prepare ( $query );
		$req->bindValue ( ':id', $id, PDO::PARAM_INT );
		
		$req->execute ();
	}
}