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



    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'add','logout');
    }

    public function index() {
        $this->set('users', $this->User->find('all'));
    }
    public function adminWelcome() {

    }
    public function view($id=null)
    {

        $this->set('user', $this->User->find('first',array('conditions'=> array('User.id'=>$id))));
    }
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
                // $this->Session->flash();
                $this->redirect(array('action'=>'index'));
            }
        }
        //$this->autoRender=false;
    }

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

            if ($this->request->is('post')) {
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