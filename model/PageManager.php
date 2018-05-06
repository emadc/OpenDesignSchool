<?php

class PageManager
{

    private $bdd;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
        $this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
    }

    /**
     * Returns any page associate to a section
     * @param mixed $item_alias
     * @return PageObj
     */
    public function getPage($item_alias)
    {
    	$bdd = $this->bdd;
    	$page = new PageObj();
    	
    	$query = "SELECT *
					FROM sections
					LEFT JOIN pages USING (id)
					WHERE item_alias=:item_alias";
    	$req = $bdd->prepare($query);
    	$req->bindParam(':item_alias', $item_alias);
    	$req->execute();
    	
    	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    	
    	if (!empty($results)) {
    		$page->setId($results[0]['id']);
    		$page->setIdSection($results[0]['id_section']);
    		$page->setTitle($results[0]['title']);
    		$page->setText($results[0]['text']);
    		$page->setLink($results[0]['link']);
    		$page->setImage($results[0]['image']);
    		$page->setDateModif($results[0]['date_modif']);
    		$page->setItemAlias($results[0]['item_alias']);
    	}
    	
    	
    	return $page;
    }
    
    /**
     * Insert or edit a page
     * @param mixed $values
     */
    public function setPage($values, $fileName = null)
    {
    	$bdd = $this->bdd;
    	
    	$query = "INSERT INTO pages (id, id_section, title, text, link, image)
	            VALUES (:id, :id_section, :title, :text, :link, :image)
				ON DUPLICATE KEY UPDATE  title = :title, text = :text, link = :link, image = :image,  date_modif = CURRENT_TIMESTAMP ";
    	
    	$req = $bdd->prepare($query);
    	
    	$req->bindValue(':id', 			$values['id'], PDO::PARAM_INT);
    	$req->bindValue(':id_section', 	$values['id_section'], PDO::PARAM_INT);
    	$req->bindValue(':title',		$values['title'], PDO::PARAM_STR);
    	$req->bindValue(':text',		$values['text'], PDO::PARAM_STR);
    	$req->bindValue(':link',		$values['link'], PDO::PARAM_STR);
    	$req->bindValue(':image',		$fileName);
    	
    	$req->bindValue(':title',		$values['title'], PDO::PARAM_STR);
    	$req->bindValue(':text',		$values['text'], PDO::PARAM_STR);
    	$req->bindValue(':link',		$values['link'], PDO::PARAM_STR);
    	$req->bindValue(':image',		$fileName);
    	$req->execute();
    	
    }
    
    /**
     * Get a page in json format
     * @param mixed $id
     * @return string
     */
    public function find($id) {
    	$bdd = $this->bdd;
    	
    	$query = "SELECT * FROM pages WHERE id=:id";
    	$req = $bdd->prepare ( $query );
    	$req->bindValue ( ':id', $id, PDO::PARAM_INT );
    	$req->execute ();
    	
    	$results = $req->fetchAll ( PDO::FETCH_ASSOC );
    	$json = '{ "data": ' . json_encode ( $results ) . '}';
    	
    	return $json;
    }
    
    /**
     * delete a page
     * @param mixed $id
     */
    public function delete($id) {
    	$bdd = $this->bdd;
    	$query = "DELETE FROM pages WHERE id = :id";
    	
    	$req = $bdd->prepare ( $query );
    	$req->bindValue ( ':id', $id, PDO::PARAM_INT );
    	
    	$req->execute ();
    }
}