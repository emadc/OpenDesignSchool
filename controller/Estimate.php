<?php


/**
 * Class Home
 *
 * use to show the devis page
 */
class Estimate
{

    public function showHome($params)
    {
        
        $manager = new OpsManager();
        $devinettes = $manager->findAll();

        $myView = new View('home');
        $myView->render(array('devinettes' => $devinettes));

    }

    public function showContact($params)
    {

        $myView = new View('contact');
        $myView->render();
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