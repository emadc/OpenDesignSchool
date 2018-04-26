<?php


class OpsManager
{

    private $bdd;

    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . '../db_config.php', true);
//         echo "<pre>"; print_r($config); exit();
        $this->bdd = new PDO("mysql:host=".$config['sql']['ods']['host']."; dbname=".$config['sql']['ods']['base']."; charset=utf8", $config['sql']['ods']['user'], $config['sql']['ods']['pass']);
    }

    public function findAll()
    {
        $bdd = $this->bdd;
        $devinettes = new ArrayObject();
        
        /*** accès au model ***/
        $query = "SELECT * FROM devinette";

        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {


            $devinette = new Devinette();
            $devinette->setId($row['id']);
            $devinette->setName($row['name']);
            $devinette->setQuestion($row['question']);
            $devinette->setAnswer($row['answer']);
            $devinette->setCreatedAt($row['created_at']);

            $devinettes[] = $devinette; // tableau d'objet

        };

        return $devinettes;
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
            $query = "UPDATE devinette SET question = :question, name = :name,answer = :answer WHERE id = :id; ";
        } else {
            $query = "INSERT INTO devinette (id, name, question, answer, created_at) 
            VALUES (NULL, :name, :question, :answer, NULL);";
        }

        $req = $bdd->prepare($query);

        if(isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':name', $values['name'], PDO::PARAM_STR);
        $req->bindValue(':question', $values['question'], PDO::PARAM_STR);
        $req->bindValue(':answer', $values['answer'], PDO::PARAM_STR);
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