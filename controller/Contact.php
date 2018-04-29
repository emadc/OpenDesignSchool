<?php


/**
 * Class Contact
 *
 * use to show the contact page
 */
class Contact
{

	public function showContact($params)
	{
		
		$manager = new LayoutManager();
		
		$menu = $manager->getMenu();
		
		$footer = $manager->getFooter();
		
		$myView = new View('contact');
		$myView->render(array('menu' => $menu, 'footer' => $footer));
	}

    public function edit($params)
    {
        extract($params);

        if(isset($id)) {

            $manager = new ContactManager();
            $contact = $manager->find($id);

        } else {
            $contact = new ContactObj();
        }

        $myView = new View('edit');
        $myView->render(array('contact' => $contact));

    }
    
    public function save($params)
    {
//     	echo "params<pre>"; var_dump($params); 
        extract($params);
//         echo "values<pre>"; var_dump($values); exit();
        $manager = new ContactManager();
        $manager->save($values);

        $myView = new View();
        $myView->redirect('contact');
        
    }

    public function delDev($params)
    {
        extract($params);
        $manager = new OpsManager();
        $manager->delete($id);

        $myView = new View();
        $myView->redirect('contact');
    }


}