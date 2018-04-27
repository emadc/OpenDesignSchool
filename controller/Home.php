<?php


/**
 * Class Home
 *
 * use to show the home page
 */
class Home
{

    public function showHome($params)
    {
        
        $manager = new LayoutManager();
       
        $menu = $manager->getMenu();
        
        $footer = $manager->getFooter();

        $myView = new View('home');
        $myView->render(array('menu' => $menu, 'footer' => $footer));

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
        $myView->redirect('home.html');
        
    }

    public function delDev($params)
    {
        extract($params);
        $manager = new OpsManager();
        $manager->delete($id);

        $myView = new View();
        $myView->redirect('home.html');
    }


}