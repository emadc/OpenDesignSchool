<?php


class LayoutManager
{

    private $bdd;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
//         echo "<pre>"; print_r($config); exit();
        $this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
    }

    /**
     * restituisce un array di oggetti menuItem
     * @return ArrayObject MenuItem
     */
    public function getMenu()
    {
        $bdd = $this->bdd;
        $menu = new ArrayObject();
        
        /*** accès au model ***/
        $query = "SELECT * FROM menu";

        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

			$menuItem = new MenuItem();       	
			$menuItem->setId($row['id']);
			$menuItem->setItemText($row['item_text']);
			$menuItem->setItemLink($row['item_link']);
			$menuItem->setParent($row['parent']);

            $menu[] = $menuItem; // tableau d'objet

        };

//         echo "LayoutManager<pre>"; print_r($req->errorInfo()); var_dump($menu); exit();
        
        return $menu;
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
    
}