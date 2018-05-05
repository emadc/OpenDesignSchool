<?php
class PAgeObj {
	private $id;
	private $idSection;
	private $title;
	private $texte;
	private $image;
	private $link;
	private $dateModif;
	private $itemAlias;
	
	/**
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * @param mixed $id        	
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getIdSection() {
		return $this->idSection;
	}
	
	/**
	 *
	 * @param mixed $idSection
	 */
	public function setIdSection($idSection) {
		$this->idSection = $idSection;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 *
	 * @param mixed $title        	
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getText() {
		return $this->texte;
	}
	
	/**
	 *
	 * @param mixed $texte        	
	 */
	public function setText($texte) {
		$this->texte = $texte;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getImage() {
		return $this->image;
	}
	
	/**
	 *
	 * @param mixed $image        	
	 */
	public function setImage($image) {
		$this->image = $image;
	}
	/**
	 *
	 * @return mixed
	 */
	public function getLink() {
		return $this->link;
	}
	
	/**
	 *
	 * @param mixed $link        	
	 */
	public function setLink($link) {
		$this->link = $link;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getDateModif() {
		return $this->dateModif;
	}
	
	/**
	 *
	 * @param mixed $dateModif        	
	 */
	public function setDateModif($dateModif) {
		$this->dateModif = $dateModif;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getItemAlias() {
		return $this->itemAlias;
	}
	
	/**
	 *
	 * @param mixed $itemAlias        	
	 */
	public function setItemAlias($itemAlias) {
		$this->itemAlias = $itemAlias;
	}
}