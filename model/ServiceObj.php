<?php

class ServiceObj
{

    private $id;
    private $title;
    private $texte;
    private $image;

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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
    	$this->image = $image;
    }
}