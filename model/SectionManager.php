<?php


class SectionManager
{

    private $bdd;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
        $this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
    }

    /**
     * restituisce un array di oggetti SectionObj
     * @return ArrayObject SectionObj
     */
    public function getSections()
    {
    	$bdd = $this->bdd;
    	$sections = new ArrayObject();
    	
    	/*** accès au model ***/
    	$query = "SELECT * FROM sections WHERE visible = 1";
    	
    	$req = $bdd->prepare($query);
    	$req->execute();
    	while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
    		
    		$section = new SectionObj();
    		$section->setId($row['id']);
    		$section->setItemText($row['item_text']);
    		$section->setItemAlias($row['item_alias']);
    		$section->setItemLink($row['item_link']);
    		$section->setParent($row['parent']);
    		$section->setMenu($row['menu']);
    		$section->setEditable($row['editable']);
    		
    		$sections[] = $section;
    		
    	};
    	
    	return $sections;
    }
    
    public function setSection($values)
    {
    	$bdd = $this->bdd;
    	
    	if(isset($values['id']))
    	{
    		$query = "UPDATE sections SET item_text = :item_text, item_alias = :item_alias, item_link = :item_link, parent = :parent, menu = :menu  WHERE id = :id; ";
    	} else {
    		$query = "INSERT INTO sections (item_text, item_alias, item_link, parent, menu)
            VALUES (:item_text, :item_alias, :item_link, :parent, :menu);";
    	}
    	
    	$req = $bdd->prepare($query);
    	
    	if(isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
    	$req->bindValue(':item_text',	$values['item_text'], PDO::PARAM_STR);
    	$req->bindValue(':item_alias',	$values['item_alias'], PDO::PARAM_STR);
    	$req->bindValue(':item_link',	$values['item_link'], PDO::PARAM_STR);
    	$req->bindValue(':parent',		$values['parent'], PDO::PARAM_INT);
    	$req->bindValue(':menu',		$values['menu'] == null ? 0 : 1, PDO::PARAM_INT);
    	$req->execute();
    	
    }

    public function find($id)
    {
    	$bdd = $this->bdd;
    	
    	$query = "SELECT * FROM sections WHERE id=:id AND visible = 1";
    	$req = $bdd->prepare($query);
    	$req->bindValue(':id', $id, PDO::PARAM_INT);
    	$req->execute();
    	
    	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    	$json = '{ "data": '.json_encode($results).'}';
    	
    	return $json;
    }
    
    public function delete($id)
    {
        $bdd = $this->bdd;
        $query = "DELETE FROM sections WHERE id = :id";

        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }


}