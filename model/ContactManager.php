<?php


class ContactManager
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
        	$contact->setEmail($row['email']);
        	$contact->setTel($row['tel']);
        	$contact->setSociete($row['societe']);
        	$contact->setMessage($row['message']);
        	$contact->setDateCreation($row['date_creation']);

        	$contacts[] = $contact;

        };

//         echo "LayoutManager<pre>"; print_r($req->errorInfo()); var_dump($menu); exit();
        
        return $contacts;
    }

    /**
     * restituisce un oggetto footer
     * @return ArrayObject FooterItem
     */
    public function getFooter()
    {
    	$bdd = $this->bdd;
    	$footer = new ArrayObject();
    	
    	/*** accès au model ***/
    	$query = "SELECT * FROM footer";
    	
    	$req = $bdd->prepare($query);
    	$req->execute();
    	while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
    		
    		$footerItem = new FooterItem();  
    		$footerItem->setId($row['id']);
    		$footerItem->setTitle($row['title']);
    		$footerItem->setText($row['text']);
    		$footerItem->setSocials($row['socials']);
    		
    		$footer[] = $footerItem; // tableau d'objet
    		
    	};

    	return $footer;
    }
    
    public function find($id)
    {
        $bdd = $this->bdd;

        $query = "SELECT * FROM devinette WHERE id = :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        
        $devinette = new Devinette();
        $devinette->setId($row['id']);
        $devinette->setName($row['name']);
        $devinette->setQuestion($row['question']);
        $devinette->setAnswer($row['answer']);
        $devinette->setCreatedAt($row['created_at']);
        
        return $devinette;
    }

    public function save($values)
    {
    	
    	$bdd = $this->bdd;
    	
    	if(isset($values['id']))
    	{
    		$query = "UPDATE contacts SET nom_prenom = :nom_prenom, email = :email, tel = :tel, societe = :societe,  message  = :message  WHERE id = :id; ";
    	} else {
    		$query = "INSERT INTO contacts (nom_prenom, email, tel, societe, message)
            VALUES (:nom_prenom, :email, :tel, :societe, :message);";
    	}
    	
    	$req = $bdd->prepare($query);
    	
    	if(isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
    	$req->bindValue(':nom_prenom',	$values['nom_prenom'], PDO::PARAM_STR);
    	$req->bindValue(':email',		$values['email'], PDO::PARAM_STR);
    	$req->bindValue(':tel',			$values['tel'], PDO::PARAM_STR);
    	$req->bindValue(':societe',		$values['societe'], PDO::PARAM_STR);
    	$req->bindValue(':message',		$values['message'], PDO::PARAM_STR);
    	$req->execute();
    	
    }

    public function delete($id)
    {
        $bdd = $this->bdd;
        $query = "DELETE FROM devinette WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }


}