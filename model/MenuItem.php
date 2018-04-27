<?php

class MenuItem
{

    private $id;
    private $itemText;
    private $itemLink;
    private $parent;

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

}