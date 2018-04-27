<?php

class FooterItem
{

    private $id;
    private $title;
    private $text;
    private $socials;

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
    	$this->title= $title;
    }
    
    /**
     * @return mixed
     */
    public function getText()
    {
    	return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
    	$this->text= $text;
    }

    /**
     * @return mixed
     */
    public function getSocials()
    {
    	return $this->socials;
    }
    
    /**
     * @param mixed $socials
     */
    public function setSocials($socials)
    {
    	$this->socials= $socials;
    }
    
}