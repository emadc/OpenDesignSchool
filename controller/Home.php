<?php

/**
 * Class Home
 *
 * use to show the home page
 */
class Home {
	
	private $manager;
	
	/**
	 */
	public function __construct() {
		$this->manager = new LayoutManager ();
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function showHome($params) {
		$manager = new ServicesManager ();
		
		$gallery = new GalleryManager ();
		
		$myView = new View ( 'home' );
		$myView->render ( array (
				'menu' => $this->manager->getMenu (),
				'welcame' => $this->manager->getPage ( 'welcame' ),
				'bottom' => $this->manager->getPage ( 'bottom' ),
				'footer' => $this->manager->getFooter (),
				'services' => $manager->getServices ( true ),
				'medias' => $gallery->getGallery ( true ) 
		) );
	}
	
	/**
	 */
	public function notFound() {
		$myView = new View ( '404' );
		$myView->render ( array (
				'menu' => $this->manager->getMenu (),
				'bottom' => $this->manager->getPage ( 'bottom' ),
				'footer' => $this->manager->getFooter () 
		) );
	}
}