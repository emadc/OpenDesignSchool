<?php

class GalleryObj
{

    private $id;
    private $fileName;
    private $title;
    private $text;
    private $dateModif;
    
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
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
    	$this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
    	$this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
    	return $this->texte;
    }
    
    /**
     * @param mixed $texte
     */
    public function setText($texte)
    {
    	$this->texte = $texte;
    }
    
    /**
     * @return mixed
     */
    public function getDateModif()
    {
    	return $this->dateModif;
    }
    
    /**
     * @param mixed $dateModif
     */
    public function setDateModif($dateModif)
    {
    	$this->dateModif = $dateModif;
    }
}