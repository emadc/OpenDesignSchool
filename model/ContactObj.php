<?php

class ContactObj
{

    private $id;
    private $nomPrenom;
    private $email;
    private $tel;
    private $societe;
    private $address1;
    private $address2;
    private $city;
    private $zip;
    private $country;
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
    
    /**
     * @return mixed
     */
    public function getAddress1()
    {
    	return $this->address1;
    }
    
    /**
     * @param mixed $address1
     */
    public function setAddress1($address1)
    {
    	$this->address1 = $address1;
    }
    
    /**
     * @return mixed
     */
    public function getAddress2()
    {
    	return $this->address2;
    }
    
    /**
     * @param mixed $address2
     */
    public function setAddress2($address2)
    {
    	$this->address2 = $address2;
    }
    
    /**
     * @return mixed
     */
    public function getCity()
    {
    	return $this->city;
    }
    
    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
    	$this->city = $city;
    }
    
    /**
     * @return mixed
     */
    public function getZip()
    {
    	return $this->zip;
    }
    
    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
    	$this->zip = $zip;
    }
    
    /**
     * @return mixed
     */
    public function getCountry()
    {
    	return $this->country;
    }
    
    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
    	$this->country = $country;
    }
}