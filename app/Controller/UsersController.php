<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 17/10/12
 * Time: 3:38 PM
 * To change this template use File | Settings | File Templates.
 */
class UsersController extends AppController {
    public $helpers = array('Html', 'Form','Session');
      public    $components=array('RequestHandler');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->authenticate = array(
            'Form' => array('User' => 'user'),
            'Basic' => array('User' => 'user')
        );
        $this->Auth->allow('index', 'add','logout','login','fetchShoes');
    }

    public function fetchShoes()
    {
        //pr($this->request->data);die;
        if($this->request->is('post'))
        {
        $ch = curl_init('http://shoewala.webonise.com/users.json');
        $data = array("username" => $this->request->data['User']['username'], "password" => $this->request->data['User']['password']);
        $data_string = json_encode($data);
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//by default this variable is false we have set to true otherwise it will not return anything
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $response=curl_exec ($ch);
        $this->log($response);//http://shoewala.webonise.com/us
        curl_close ($ch);

        if($response != 'null')
        {
            $this->fetchProducts($response);
        }
        else
        {
            $this->Session->setFlash('Authentication failure');
            $this->redirect(array('action'=>'fetchShoes'));
        }

        }


    }
    public function fetchProducts($response)
    {
        //pr('in fetch');die;
        $ch = curl_init('http://shoewala.webonise.com/products.json');
        $response=array('response'=>$response);
        $data_string = json_encode($response);
        curl_setopt ($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//by default this variable is false we have set to true otherwise it will not return anything
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $response=curl_exec ($ch);
        $this->log($response);
       // pr($response);die;
        curl_close ($ch);
        //$this->autoRender=false;
        //pr($response);die;
    }

    public function index() {
        //log($_POST);

        $this->set('users', $this->User->find('all'));
    }
    public function adminWelcome() {

    }
    public function view($id=null)
    {

        $this->set('user', $this->User->find('first',array('conditions'=> array('User.id'=>$id))));
    }
    public function login($username=null,$password=null) {

       // if ($this->request->is('post')) {
            //pr($this->request->data);die;

            //pr($username);die;
        $this->request->data['User']['username']=$username;
        $this->request->data['User']['password']=$password;
        //pr($this->request->data);die;
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
                // $this->Session->flash();
                $this->redirect(array('action'=>'index'));
            }
        }
        //$this->autoRender=false;
  //  }

    public function dashboard()
    {
        if ($this->Auth->user('role_type') == 1) {
            $this->redirect(array('controller' => 'users', 'action' => 'adminWelcome'));
        }
        else
        {
            $this->redirect(array('controller' => 'posts', 'action' => 'index'));
        }

    }

    public function add() {
      //  $this->log($_POST);
            if ($this->request->is('post')) {
                $this->log($_POST);

                if($this->User->addUser($this->request->data))
                {
                    $this->Session->setFlash('Registered');
                    $this->redirect(array('action' => 'index'));
                }
                else
                {
                    $this->Session->setFlash(' Not Registered');
                    $this->redirect(array('action' => 'index'));
                }

            }


    }

    public function logout() {
        $this->Session->setFlash('Loggegd out');
        $this->redirect($this->Auth->logout());
    }
}
?>