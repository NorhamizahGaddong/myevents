<?php namespace App\Controllers;

class Events extends BaseController
{

	public function index($page = 'home')
	{
   
      // if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
      // {
      //     // Whoops, we don't have a page for that!
      //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      // }

      // $eventsModel = new \App\Models\EventsModel();
      // $events = $eventsModel->findAll();
      // // echo var_dump($events);
      // $data['title'] = ucfirst($page); // Capitalize the first letter
      // $data['controller'] = 'pages';
      // $data['page'] = $page;
      // $data['events'] = $events;

      // echo view('templates/header', $data);
      // echo view('pages/'.$page, $data);
      // echo view('templates/footer', $data);
	}


  public function add_event() {
    helper('form');
    $eventsModel = new \App\Models\EventsModel();
    $req_method = \Config\Services::request()->getMethod();
    $session = session();
     if($req_method == 'post' && $this->validate([
      'title' => 'required',
      'venue' => 'required',
      'date' => 'required',
      'time' => 'required',
      'attendance' => 'required',
      'description' => 'required',
     ])) {

      $eventsModel->save([
        'title' => $this->request->getVar('title'),
        'venue' => $this->request->getVar('venue'),
        'date' => $this->request->getVar('date'),
        'time' => $this->request->getVar('time'),
        'attendance' => $this->request->getVar('attendance'),
        'description' => $this->request->getVar('description'),
        'user_id' => (int)$session->user_id,
        'status' => 'not_finished',
      ]);

     $data['success_message'] = "Event titled " . $this->request->getVar('title')." is successfully added";   

    }
    $data['title'] = 'Add Event';

      echo view('templates/header', $data);
      echo view('events/add_event', $data);
      echo view('templates/footer', $data);
  }

  public function edit_event($event_id) {
     $session = session();
   
    if(isset($session->logged_in)) {
      helper('form');
      $eventsModel = new \App\Models\EventsModel();
      $req_method = \Config\Services::request()->getMethod();
      $event = $eventsModel->find($event_id);

      if($req_method == 'post' && $this->validate([
        'title' => 'required',
        'venue' => 'required',
        'date' => 'required',
        'time' => 'required',
        'attendance' => 'required',
        'description' => 'required',
        'id' =>'required',
       ])) {
        $id = $this->request->getVar('id');

        $eventsModel->update($id, [
          'title' =>  $this->request->getVar('title'),
          'venue' =>  $this->request->getVar('venue'),
          'date' =>  $this->request->getVar('date'),
          'time' =>  $this->request->getVar('time'),
          'attendance' => $this->request->getVar('attendance'),
          'description' => $this->request->getVar('description'),
        ]);
        $event = $eventsModel->find($id);
        $data['event'] = $event;
        $data['success_message'] = "Event title " . $event['title'] . " successfully updated";
      

      }
      $data['event'] = $event;
      echo view('templates/header', $data);
      echo view('events/edit_event', $data);
      echo view('templates/footer', $data); 
    }
      else {
        return redirect()->to('/myevents/public/users/login');
      }
  }


  public function remove_event($event_id) {
     $session = session();
   
  if(isset($session->logged_in)) {
     $eventsModel = new \App\Models\EventsModel();
     $event = $eventsModel->find($event_id);

     $success_message = 'Event title ' . $event['title'] . " is removed!";
     $eventsModel->delete($event_id);

     return redirect()->to('/myevents/public/finished_events')->with('success_message', $success_message);
   }
      else {
        return redirect()->to('/myevents/public/users/login');
      }
  }
 
  public function finished_events() {
     $session = session();
   
    if(isset($session->logged_in)) {
      if ( ! is_file(APPPATH.'/Views/events/finished_events.php'))
      {
          // Whoops, we don't have a page for that!
          throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }

      $session = session();
      
      $eventsModel = new \App\Models\EventsModel();
      if(isset($session->logged_in)) {
              $events = $eventsModel->where('user_id',$session->user_id)->where('status','finished')->findAll();    

              // echo var_dump($events);
              $data['title'] = ucfirst($page); // Capitalize the first letter
              $data['controller'] = 'pages';
              $data['page'] = $page;
              $data['events'] = $events;

              echo view('templates/header', $data);
              echo view('events/finished_events', $data);
              echo view('templates/footer', $data); 
      }
      else {
        return redirect()->to('/myevents/public/users/login');
      }
    }
    else {
        return redirect()->to('/myevents/public/users/login');
    }

  }

  public function finished($event_id) {

      $eventsModel = new \App\Models\EventsModel();
      $event = $eventsModel->find($event_id);
      $data = [
        'status' => 'finished',
      ];
      $eventsModel->update($event_id,$data);
      return redirect()->to('/myevents/public/');
  }
   //  helper('form');

   //  $model = new \App\Models\StudentsModel();
   //  $blocksModel = new \App\Models\BlocksModel();
   //  $req_method = \Config\Services::request()->getMethod();

   //  $blocks = $blocksModel->findAll();
   //  $data['blocks'] = $blocks;

   // if($req_method == 'post' && $this->validate([
   //  'lastname' => 'required',
   //  'firstname' => 'required',
   //  'block' => 'required',
   //  'student_num' => 'required',
   // ])) {

   //  $model->save([
   //    'lastname' => $this->request->getVar('lastname'),
   //    'firstname' => $this->request->getVar('firstname'),
   //    'block' => $this->request->getVar('block'),
   //    'student_num' => $this->request->getVar('student_num')
   //  ]);

   // $data['success_message'] = $this->request->getVar('firstname')." is successfully added";   
	//--------------------------------------------------------------------

}
