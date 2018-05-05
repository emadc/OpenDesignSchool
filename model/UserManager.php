<?php


class UserManager
{

    private $bdd;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
//         echo "<pre>"; print_r($config); exit();
        $this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
    }

    /**
     * restituisce un oggetto user
     * @return ArrayObject user
     */
    public function getUser($login, $password)
    {
    	
        $bdd = $this->bdd;
        $menu = new ArrayObject();
        
        /*** accès au model ***/
        $query = "SELECT * FROM user WHERE username = :login and password = :password";

        $req = $bdd->prepare($query);
        $req->bindValue("login", $login);
        $req->bindValue("password", sha1($password));
        $req->execute();
        
        if(!$user = $req->fetch(PDO::FETCH_ASSOC)) return null;
        
//         echo print_r($req->errorInfo()); var_dump($login); var_dump($password); exit();
        
        return $user;
    }

}