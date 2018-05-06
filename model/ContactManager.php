<?php


class ContactManager
{

    private $bdd;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
        $this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
    }

    /**
     * Returns an array of ContactObj objects
     * @return ArrayObject ContactObj
     */
    public function getContacts()
    {
    	$bdd = $this->bdd;
    	$contacts = new ArrayObject();
    	
    	/*** accès au model ***/
    	$query = "SELECT * FROM contacts";
    	
    	$req = $bdd->prepare($query);
    	$req->execute();
    	while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
    		
    		$contact = new ContactObj();
    		$contact->setId($row['id']);
    		$contact->setNomPrenom($row['nom_prenom']);
    		$contact->setAddress1($row['address_1']);
    		$contact->setAddress2($row['address_2']);
    		$contact->setCity($row['city']);
    		$contact->setZip($row['zip']);
    		$contact->setCountry($row['country']);
    		$contact->setEmail($row['email']);
    		$contact->setTel($row['tel']);
    		$contact->setSociete($row['societe']);
    		$contact->setDateCreation($row['date_creation']);
    		
    		$contacts[] = $contact;
    		
    	};
    	
    	
    	return $contacts;
    }
    
	/**
	 * Returns the total count of contacts
	 * @return mixed
	 */
    public function countContacts()
    {
    	$bdd = $this->bdd;
    	$contacts = new ArrayObject();
    	
    	/*** accès au model ***/
    	$query = "SELECT COUNT(id) AS nbr FROM contacts";
    	
    	$req = $bdd->prepare($query);
    	$req->execute();
    	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    	
    	
    	return $results[0]['nbr'];
    }
    
    /**
     * Insert a new message
     * @param mixed $values
     */
    public function setMessage($values)
    {
    	
    	$bdd = $this->bdd;
    	
    	$query = "INSERT INTO messages (nom_prenom, email, tel, societe, message)
    		       VALUES (:nom_prenom, :email, :tel, :societe, :message);";
    	
    	$req = $bdd->prepare($query);
    	
    	if(isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
    	$req->bindValue(':nom_prenom',	$values['nom_prenom'], PDO::PARAM_STR);
    	$req->bindValue(':email',		$values['email'], PDO::PARAM_STR);
    	$req->bindValue(':tel',			$values['tel'], PDO::PARAM_STR);
    	$req->bindValue(':societe',		$values['societe'], PDO::PARAM_STR);
    	$req->bindValue(':message',		$values['message'], PDO::PARAM_STR);
    	$req->execute();
    	
    }
    
    /**
     *Insert a new devis
     * @param mixed $values
     */
    public function setDevis($values)
    {
    	
    	$bdd = $this->bdd;
    	
    	$query = "INSERT INTO devis (nom_prenom, email, tel, societe, message)
    		       VALUES (:nom_prenom, :email, :tel, :societe, :message);";
    	
    	$req = $bdd->prepare($query);
    	
    	if(isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
    	$req->bindValue(':nom_prenom',	$values['nom_prenom'], PDO::PARAM_STR);
    	$req->bindValue(':email',		$values['email'], PDO::PARAM_STR);
    	$req->bindValue(':tel',			$values['tel'], PDO::PARAM_STR);
    	$req->bindValue(':societe',		$values['societe'], PDO::PARAM_STR);
    	$req->bindValue(':message',		$values['message'], PDO::PARAM_STR);
    	$req->execute();
    	
    }
    
    /**
     * Insert or edit a contact
     * @param mixed $values
     */
    public function setContact($values)
    {
    	
    	$bdd = $this->bdd;
    	
    	if(isset($values['id']))
    	{
    		$query = "UPDATE contacts SET nom_prenom = :nom_prenom, email = :email, tel = :tel, societe = :societe  WHERE id = :id; ";
    	} else {
    		$query = "INSERT INTO contacts (nom_prenom, email, tel, societe)
            VALUES (:nom_prenom, :email, :tel, :societe);";
    	}
    	
    	$req = $bdd->prepare($query);
    	
    	if(isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
    	$req->bindValue(':nom_prenom',	$values['nom_prenom'], PDO::PARAM_STR);
    	$req->bindValue(':email',		$values['email'], PDO::PARAM_STR);
    	$req->bindValue(':tel',			$values['tel'], PDO::PARAM_STR);
    	$req->bindValue(':societe',		$values['societe'], PDO::PARAM_STR);
    	$req->execute();
    	
    }

    /**
     * Returns a contact in json format
     * @param mixed $id
     * @return string
     */
    public function find($id)
    {
    	$bdd = $this->bdd;
    	
    	$query = "SELECT * FROM contacts WHERE id=:id";
    	$req = $bdd->prepare($query);
    	$req->bindValue(':id', $id, PDO::PARAM_INT);
    	$req->execute();
    	
    	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    	$json = '{ "data": '.json_encode($results).'}';
    	
    	
    	return $json;
    }
    
    /**
     * Returns a devis in json format
     * @param mixed $id
     * @return string
     */
    public function findDevis($id)
    {
    	$bdd = $this->bdd;
    	
    	$query = "SELECT * FROM devis WHERE id=:id";
    	$req = $bdd->prepare($query);
    	$req->bindValue(':id', $id, PDO::PARAM_INT);
    	$req->execute();
    	
    	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    	$json = '{ "data": '.json_encode($results).'}';
    	
    	return $json;
    }
    
    /**
     * Delete a contact
     * @param mixed $id
     */
    public function delete($id)
    {
        $bdd = $this->bdd;
        $query = "DELETE FROM contacts WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }
    
    /**
     * Delete a devis
     * @param mixed $id
     */
    public function deleteDevis($id)
    {
    	$bdd = $this->bdd;
    	$query = "DELETE FROM devis WHERE id = :id";
    	
    	$req = $bdd->prepare($query);
    	$req->bindValue(':id', $id, PDO::PARAM_INT);
    	
    	$req->execute();
    }

}