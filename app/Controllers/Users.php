<?php namespace App\Controllers;

class Users extends BaseController
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

  public function signup() {

    helper('form');
    $userModel = new \App\Models\UsersModel();
    $request_method =  \Config\Services::request()->getMethod();
   
    if($request_method == 'post' && $this->validate([
      'firstname' => 'required',
      'lastname' => 'required',
      'username'  => 'required|is_unique[users.username]',
      'password' => 'required',
      'repassword' => 'required|matches[password]'
    ])){
      // echo $this->request->getVar('password');
      // die;
      // $hash_password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

      $userModel->save([
        'firstname' => $this->request->getVar('firstname'),
        'lastname' => $this->request->getVar('lastname'),
        'username' => $this->request->getVar('username'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ]);


        return redirect()->to('/myevents/public/')->with('success_message', "Signup Successfully");
    }


      $data['title'] = 'Login page';
      echo view('templates/header', $data);
      echo view('users/signup', $data);
      echo view('templates/footer', $data);
  }

  public function login() {
    $data['title'] = 'Login page';
    $usersModel = new \App\Models\EventsModel();

    $session = session();
    if($session->getFlashdata('success_message')){
      $data['success_message'] = $session->getFlashdata('success_message');
    }

    helper('form');
    $userModel = new \App\Models\UsersModel();
    $request_method =  \Config\Services::request()->getMethod();
   
    if($request_method == 'post' && $this->validate([
      'username'  => 'required',
      'password' => 'required'
    ])){
      $username = $this->request->getVar('username');
      $password = $this->request->getVar('password');

      $user = $userModel->where('username', $username)->first();
      // ulitin mo na lang signup
      // echo  password_verify($password, $hass_p);
      // die();
      if(!is_null($user) && password_verify($password, $user['password'])){
        $newdata = [
                'user_id' => $user['id'],
                'username'  => $username,
                'name'     => $user['firstname']." ".$user['lastname'],
                'usertype' => $user['usertype'],
                'logged_in' => TRUE
        ];
  
        $session->set($newdata);
        // echo var_dump($session);
        return redirect()->to('/myevents/public/')->with('success_message', "Login Successfully");
      }else{
        $data['error_message'] = "Incorrect username or password";
      }
    }


      echo view('templates/header', $data);
      echo view('users/login', $data);
      echo view('templates/footer', $data);

  }

  public function logout(){
    $session = session();
    $session->remove(['username', 'name', 'usertype', 'logged_in','user_id']);
    return redirect()->to('/myevents/public/users/login')->with('success_message', "Logout Successfully");
  }

	//--------------------------------------------------------------------

}
