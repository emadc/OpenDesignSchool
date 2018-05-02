<?php


class MessageManager
{

    private $bdd;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
//         echo "<pre>"; print_r($config); exit();
        $this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
    }

    /**
     * restituisce un array di oggetti ContactObj
     * @return ArrayObject ContactObj
     */
    public function getMessages($new = false)
    {
        $bdd = $this->bdd;
        $messages = new ArrayObject();
        $newStr = "WHERE 1";
        
        if($new) {
        	$newStr = "WhERE is_read = 0";
        }
        	
        /*** accès au model ***/
        $query = "SELECT * FROM messages ".$newStr;

        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

        	$message = new MessageObj();
        	$message->setId($row['id']);
        	$message->setNomPrenom($row['nom_prenom']);
        	$message->setEmail($row['email']);
        	$message->setTel($row['tel']);
        	$message->setSociete($row['societe']);
        	$message->setMessage($row['message']);
        	$message->setDateCreation($row['date_creation']);
        	$message->setRead($row['is_read']);

        	$messages[] = $message;

        };

//         echo "getMessages<pre>"; print_r($req->errorInfo()); var_dump($messages); exit();
        
        return $messages;
    }


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
     * restituisce un array di oggetti ContactObj
     * @return ArrayObject ContactObj
     */
    public function getNewMsgs()
    {
    	$bdd = $this->bdd;
    	$messages = new ArrayObject();
    	$newMsgs = 0;
    	/*** accès au model ***/
    	$query = "SELECT COUNT(id) AS count FROM messages WHERE is_read = 0";
    	
    	$req = $bdd->prepare($query);
    	$req->execute();
    	
    	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    	$json = '{ "data": '.json_encode($results).'}';
    	
    	return $json;
    }
    
    public function setAsRead($id)
    {
    	$bdd = $this->bdd;
    	
   		$query = "UPDATE messages SET is_read = 1  WHERE id = :id; ";
    	
    	$req = $bdd->prepare($query);
    	
    	$req->bindValue(':id', $id, PDO::PARAM_INT);
    	$req->execute();
    	
    	return "ok";
    	
    }
    
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

    public function find($id)
    {
    	$bdd = $this->bdd;
    	
    	$query = "SELECT * FROM messages WHERE id=:id";
    	$req = $bdd->prepare($query);
    	$req->bindValue(':id', $id, PDO::PARAM_INT);
    	$req->execute();
    	
    	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    	$json = '{ "data": '.json_encode($results).'}';
    	
    	//     	echo "getContact<pre>"; print_r($req->errorInfo()); var_dump($json); exit();
    	
    	return $json;
    }
    
    public function delete($id)
    {
        $bdd = $this->bdd;
        $query = "DELETE FROM messages WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }


}