<?php

class PageManager
{

    private $bdd;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
//         echo "<pre>"; print_r($config); exit();
        $this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
    }

    /**
     *questa funzione puo chiamare una pagina generica associata ad un item di menu
     */
    public function getPage($item_alias)
    {
    	$bdd = $this->bdd;
    	
    	$query = "SELECT *
					FROM menu
					LEFT JOIN pages USING (id)
					WHERE item_alias=:item_alias";
    	$req = $bdd->prepare($query);
    	$req->bindParam(':item_alias', $item_alias);
    	$req->execute();
    	
    	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    	
    	$page = new PageObj();
    	$page->setId($results[0]['id']);
    	$page->setTitle($results[0]['title']);
    	$page->setText($results[0]['text']);
    	$page->setImage($results[0]['image']);
    	$page->setDateModif($results[0]['date_modif']);
    	$page->setItemAlias($results[0]['item_alias']);
    	
// 		echo $item_alias." <pre>"; print_r($req->errorInfo()); var_dump($results); exit();
    	
    	return $page;
    }
    
    /**
     *
     * @param unknown $values
     */
    public function setPage($values, $fileName)
    {
    	// 		echo "setPage <pre>"; var_dump($values); exit();
    	$bdd = $this->bdd;
    	
    	$query = "INSERT INTO pages (id, title, text, image)
	            VALUES (:id, :title, :text, :image)
				ON DUPLICATE KEY UPDATE  title = :title, text = :text, image = :image,  date_modif = CURRENT_TIMESTAMP ";
    	
    	$req = $bdd->prepare($query);
    	
    	$req->bindValue(':id', 		$values['id'], PDO::PARAM_INT);
    	$req->bindValue(':title',	$values['title'], PDO::PARAM_STR);
    	$req->bindValue(':text',	$values['text'], PDO::PARAM_STR);
    	$req->bindValue(':image',	'');
    	
    	$req->bindValue(':title',	$values['title'], PDO::PARAM_STR);
    	$req->bindValue(':text',	$values['text'], PDO::PARAM_STR);
    	$req->bindValue(':image',	$fileName);
    	$req->execute();
    }
    
}