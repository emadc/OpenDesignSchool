<?php

/**
 * Class Home
 *
 * use to show the home page
 */
class Home {
	private $manager;
	private $menu;
	private $footer;
	public function __construct() {
		$this->manager = new LayoutManager ();
		$this->menu = $this->manager->getMenu ();
		$this->footer = $this->manager->getFooter ();
	}
	
	/**
	 *
	 * @param unknown $params        	
	 */
	public function showHome($params) {
		$manager = new ServicesManager ();
		
		$gallery = new GalleryManager ();
		
		$welcame = new LayoutManager ();
		
		$myView = new View ( 'home' );
		$myView->render ( array (
				'menu' => $this->menu,
				'welcame' => $welcame->getPage ( 'welcame' ),
				'footer' => $this->footer,
				'services' => $manager->getServices ( true ),
				'medias' => $gallery->getGallery ( true ) 
		) );
	}
	
	/**
	 */
	public function notFound() {
		$myView = new View ( '404' );
		$myView->render ( array (
				'menu' => $this->menu,
				'footer' => $this->footer 
		) );
	}
}