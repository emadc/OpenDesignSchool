<?php


/**
 * Class Home
 *
 * use to show the home page
 */
class Home
{

	private $manager;
	private $menu;
	private $footer;
	
	public function __construct()
	{
		$this->manager = new LayoutManager();
		$this->menu = $this->manager->getMenu();
		$this->footer = $this->manager->getFooter();
	}
	
    public function showHome($params)
    {
    	$manager = new ServicesManager();
    	$services = $manager->getServices(true);
    	
        $myView = new View('home');
        $myView->render(array('menu' => $this->menu, 'footer' => $this->footer, 'services' => $services));

    }

    public function notFound()
    {
    	$myView = new View('404');
    	$myView->render(array('menu' => $this->menu, 'footer' => $this->footer));
    }
    
    
    public function editDev($params)
    {
        extract($params);

        if(isset($id)) {

            $manager = new OpsManager();
            $devinette = $manager->find($id);

        } else {
            $devinette = new Devinette();
        }

        $myView = new View('edit');
        $myView->render(array('devinette' => $devinette));

    }
    
    public function addDev($params)
    {
        extract($params);

        $manager = new OpsManager();
        $manager->save($values);

        $myView = new View();
        $myView->redirect('home');
        
    }

    public function delDev($params)
    {
        extract($params);
        $manager = new OpsManager();
        $manager->delete($id);

        $myView = new View();
        $myView->redirect('home');
    }


}