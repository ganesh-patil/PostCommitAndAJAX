<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 17/10/12
 * Time: 3:38 PM
 * To change this template use File | Settings | File Templates.
 */
class UsersController extends AppController {
    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'add','logout');
    }

    public function index() {
        $this->set('users', $this->User->find('all'));
    }
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}
?>