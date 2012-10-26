
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 17/10/12
 * Time: 3:50 PM
 * To change this template use File | Settings | File Templates.
 */
class PostsController extends AppController {
    public $helpers = array('Html', 'Form','Fck');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');
    }
    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }
    public function view($id) {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());

    }

    public function add() {
        if(($this->Auth->user('role_type')==1))
        {
        if ($this->request->is('post')) {
           // pr($this->request->data);die;
            if($this->Post->addData($this->request->data))
            {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            }
            else{
                $this->Session->setFlash('Unable to add your post.');
            }

        }
    }
        else{
            $this->Session->setFlash("you are not authorised to access that location ");
            $this->redirect(array('action' => 'index'));
        }
    }
}
?>
