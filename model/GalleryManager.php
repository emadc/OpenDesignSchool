<?php


class GalleryManager
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
    public function getGallery()
    {
        $bdd = $this->bdd;
        $gallery = new ArrayObject();
        	
        /*** accès au model ***/
        $query = "SELECT * FROM gallery ";

        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

        	$galleryObj = new GalleryObj();
        	$galleryObj->setId($row['id']);
        	$galleryObj->setFileName($row['file_name']);
        	$galleryObj->setTitle($row['title']);
        	$galleryObj->setDescription($row['description']);

        	$gallery[] = $galleryObj;

        };

//         echo "getMessages<pre>"; print_r($req->errorInfo()); var_dump($messages); exit();
        
        return $gallery;
    }


    public function setImage($values, $fileName)
    {
    	
    	$bdd = $this->bdd;
    	
    	$query = "INSERT INTO gallery (file_name, title, description)
    		       VALUES (:file_name, :title, :description);";
    	
    	$req = $bdd->prepare($query);
    	
    	$req->bindValue(':file_name',	$fileName, PDO::PARAM_STR);
    	$req->bindValue(':title',		$values['title'], PDO::PARAM_STR);
    	$req->bindValue(':description',	$values['desc'], PDO::PARAM_STR);
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
        $query = "DELETE FROM gallery WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }


}