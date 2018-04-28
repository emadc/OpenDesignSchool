<?php


/**
 * Class Home
 *
 * use to show the 404 page
 */
class NotFound
{
	public function __construct()
	{
		$manager = new LayoutManager();
		$menu = $manager->getMenu();
		$footer = $manager->getFooter();
		$myView = new View('404');
		$myView->render(array('menu' => $menu, 'footer' => $footer));
	}
	
	public function notFound(){}
}