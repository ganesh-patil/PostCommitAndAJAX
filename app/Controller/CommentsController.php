<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 17/10/12
 * Time: 4:42 PM
 * To change this template use File | Settings | File Templates.
 */

class CommentsController extends AppController {
   // public $helpers = array('Html', 'Form');
    public function beforeFilter()
    {
        $this->Auth->allow('add');
    }
    public function __sendRegistrationEmail()
    {
        //        pr($this->request->data);die;

        if ($this->request->is('post') && !empty($this->request->data)) {
            $data['from'] = 'admin_email@yopmail.com';
            $data['fromName'] = 'PostComment';
            $data['to'] = 'ganesh@yopmail.com';
            $data['toName'] = 'ganesh';
            $data['template'] = 'verify_email'; // this the ctp which goes into your View/Emails/html/verify_email.ctp
            $data['subject'] = 'Welcome to PostComment!';
            $this->sendSmtpMail($data);
        }
        return true;
    }
    public function index() {

        $this->set('comment', $this->Comment->find('all'));
    }
    public function view() {

        pr($this->request->data);die;
        //$this->set('comment', $this->Comment->find('all'));
    }
    public function approve($id=null)
    {
           //pr($id);die;
        $status=1;
        if($this->Comment->commentStatus($id,$status))
        {
            $this->Session->setFlash('comment approved');
            $this->redirect(array('controller'=>'comments','action'=>'index'));
        }
        else{
            $this->Session->setFlash('comment not  approved');
            $this->redirect(array('controller'=>'comments','action'=>'index'));
        }

        $this->autoRender=false;
    }
    public function disApprove($id=null)
    {

        $status=0;
        if($this->Comment->commentStatus($id,$status))
        {
            $this->Session->setFlash('comment disapproved');
            $this->redirect(array('controller'=>'comments','action'=>'index'));
        }
        else{
            $this->Session->setFlash('comment not  disapproved');
            $this->redirect(array('controller'=>'comments','action'=>'index'));
        }

        $this->autoRender=false;

    }
    public function delete($id=null)
    {

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Comment->delete($id)) {
            $this->Session->setFlash('The comment with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }


    }
    public function add() {
        if ($this->request->is('post'))
        {
            //pr($this->request->data);die;
            $html_encoded = htmlentities($this->request->data['Comment']['comment_name']);
            $html_encoded=strip_tags($html_encoded);
            //pr($html_encoded);die;
            $this->request->data['Comment']['comment_name']=$html_encoded;
            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {
                if ($this->__sendRegistrationEmail()) {

                    $this->Session->setFlash(__('Mail has been sent to you on your email-id'));

                } else {
                    $this->Session->setFlash(__('There may be some error, please try again'));
                }
                $this->Session->setFlash('Your comment has been saved.');

                $this->redirect(array('controller'=>'posts','action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save your comment.');
            }
        }
        else{
            $this->Session->setFlash("not added");
        }
        $this->autoRender=false;
    }



}
?>