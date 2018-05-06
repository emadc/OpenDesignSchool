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
	 * @param mixed $params        	
	 */
	public function showHome($params) {
		$manager = new ServicesManager ();
		
		$gallery = new GalleryManager ();
		
		$myView = new View ( 'home' );
		$myView->render ( array (
				'menu' => $this->manager->getMenu (),
				'welcame' => $this->manager->getPage ( 'welcame' ),
				'bottom' => $this->manager->getPage ( 'bottom' ),
				'zone1' => $this->manager->getPage ( 'zone_1' ),
				'zone2_social1' => $this->manager->getPage ( 'social_1' ),
				'zone2_social2' => $this->manager->getPage ( 'social_2' ),
				'zone2_social3' => $this->manager->getPage ( 'social_3' ),
				'zone3' => $this->manager->getPage ( 'zone_3' ),
				'zone4' => $this->manager->getPage ( 'zone_4' ),
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
				'zone1' => $this->manager->getPage ( 'zone_1' ),
				'zone2_social1' => $this->manager->getPage ( 'social_1' ),
				'zone2_social2' => $this->manager->getPage ( 'social_2' ),
				'zone2_social3' => $this->manager->getPage ( 'social_3' ),
				'zone3' => $this->manager->getPage ( 'zone_3' ),
				'zone4' => $this->manager->getPage ( 'zone_4' ),
		) );
	}
}