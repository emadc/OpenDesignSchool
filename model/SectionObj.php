<?php

class SectionObj
{

    private $id;
    private $itemText;
    private $itemAlias;
    private $itemLink;
    private $parent;
    private $menu;
    private $editable;

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
    public function getItemText()
    {
    	return $this->itemText;
    }
    
    /**
     * @param mixed $itemText
     */
    public function setItemText($itemText)
    {
    	$this->itemText= $itemText;
    }
    
    /**
     * @return mixed
     */
    public function getItemAlias()
    {
    	return $this->itemAlias;
    }
    
    /**
     * @param mixed $itemAlias
     */
    public function setItemAlias($itemAlias)
    {
    	$this->itemAlias= $itemAlias;
    }
    
    /**
     * @return mixed
     */
    public function getItemLink()
    {
        return $this->itemLink;
    }

    /**
     * @param mixed $question
     */
    public function setItemLink($itemLink)
    {
    	$this->itemLink= $itemLink;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $answer
     */
    public function setParent($parent)
    {
    	$this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
    	return $this->menu;
    }
    
    /**
     * @param mixed $menu
     */
    public function setMenu($menu)
    {
    	$this->menu= $menu;
    }

    /**
     * @return mixed
     */
    public function getEditable()
    {
    	return $this->editable;
    }
    
    /**
     * @param mixed $editable
     */
    public function setEditable($editable)
    {
    	$this->editable= $editable;
    }
}