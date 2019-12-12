<?php namespace App\Controllers;

class Pages extends BaseController
{

	public function index($page = 'home')
	{
   
      if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
      {
          // Whoops, we don't have a page for that!
          throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }

      $eventsModel = new \App\Models\EventsModel();
      // echo var_dump(session());
      // die;
     $session = session();
   
      if(isset($session->logged_in)) {
              $events = $eventsModel->where('user_id',$session->user_id)->where('status','not_finished')->findAll();    

              // echo var_dump($events);
              $data['title'] = ucfirst($page); // Capitalize the first letter
              $data['controller'] = 'pages';
              $data['page'] = $page;
              $data['events'] = $events;

              echo view('templates/header', $data);
              echo view('pages/'.$page, $data);
              echo view('templates/footer', $data); 
      }
      else {
        return redirect()->to('/myevents/public/users/login');
      }
	}


	//--------------------------------------------------------------------

}
