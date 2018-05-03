<?php

class ServicesManager
{
	
	private $bdd;
	
	public function __construct()
	{
		$config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
		//         echo "<pre>"; print_r($config); exit();
		$this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
	}
	
	/**
    /**
     * restituisce un array di oggetti ServiceObj
     * @return ArrayObject ServiceObj
     */
    public function getServices($home = false)
    {
    	$bdd = $this->bdd;
    	$services = new ArrayObject();
    	
    	/*** accès au model ***/
    	$query = "SELECT * FROM services ".($home ? "limit 0,6" : "");
    	
    	$req = $bdd->prepare($query);
    	$req->execute();
    	while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
    		
    		$service = new ServiceObj();
    		$service->setId($row['id']);
    		$service->setTitle($row['title']);
    		$service->setText($row['text']);
    		$service->setImage($row['image']);
    		
    		$services[] = $service;
    		
    	};
    	
//     	echo "getServices<pre>"; print_r($req->errorInfo()); var_dump($services); exit();
    	
    	return $services;
    }
	
	/**
	 *
	 * @param unknown $values
	 */
    public function setService($values,$fileName)
	{
		
		$bdd = $this->bdd;
		
		if(isset($values['id']))
		{
			$query = "UPDATE services SET title = :title, text = :text, image = :image  WHERE id = :id; ";
		} else {
			$query = "INSERT INTO services (title, text, image)
            VALUES (:title, :text, :image);";
		}
		
		$req = $bdd->prepare($query);
		
		if(isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
		$req->bindValue(':title',	$values['title'], PDO::PARAM_STR);
		$req->bindValue(':text',	$values['text'], PDO::PARAM_STR);
		$req->bindValue(':image',	$fileName, PDO::PARAM_STR);
		$req->execute();
	}
	
	public function find($id)
	{
		$bdd = $this->bdd;
		
		$query = "SELECT * FROM services WHERE id=:id";
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
		$query = "DELETE FROM services WHERE id = :id";
		
		$req = $bdd->prepare($query);
		$req->bindValue(':id', $id, PDO::PARAM_INT);
		
		$req->execute();
	}
	
	
}