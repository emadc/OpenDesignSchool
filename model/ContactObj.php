<?php

class ContactObj
{

    private $id;
    private $nomPrenom;
    private $email;
    private $tel;
    private $societe;
    private $message;
    private $dateCreation;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNomPrenom()
    {
        return $this->nomPrenom;
    }

    /**
     * @param mixed $nomPrenom
     */
    public function setNomPrenom($nomPrenom)
    {
    	$this->nomPrenom = $nomPrenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
    	$this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
    	$this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * @param mixed $societe
     */
    public function setSociete($societe)
    {
    	$this->societe = $societe;
    }
    
    /**
     * @return mixed
     */
    public function getMessage()
    {
    	return $this->message;
    }
    
    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
    	$this->message = $message;
    }
    
    /**
     * @return mixed
     */
    public function getDateCreation()
    {
    	return $this->dateCreation;
    }
    
    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
    	$this->dateCreation = $dateCreation;
    }
}