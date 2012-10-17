<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 17/10/12
 * Time: 4:42 PM
 * To change this template use File | Settings | File Templates.
 */

class CommentsController extends AppController {

    public function __sendRegistrationEmail() {
        if ($this->request->is('post') && !empty($this->request->data)) {
            $data['from'] = 'hi_email@yopmail.com';
            $data['fromName'] = 'bla bla';
            $data['to'] = 'hi@yopmail.com';
            $data['toName'] = 'mmmmm';
            $data['template'] = 'verify_email'; // this the ctp which goes into your View/Emails/html/verify_email.ctp
            $data['subject'] = 'Please verify your email';
            //$data['hash'] = $this->request->dataest->data['User']['hash'];
            $this->sendSmtpMail($data);
        }
        return true;
    }
    public function add() {
        if ($this->request->is('post')) {
            //pr($this->request->data);die;
            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash('Your comment has been saved.');
                if ($this->__sendRegistrationEmail()) {

                    $this->Session->setFlash(__('Mail has been sent to you on your email-id'));

                } else {
                    $this->Session->setFlash(__('There may be some error, please try again'));
                }
                $this->redirect(array('controller'=>'posts','action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save your comment.');
            }
        }
    }

}
?>