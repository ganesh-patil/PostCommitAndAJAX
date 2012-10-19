<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $helpers = array('Html', 'Form','Fck','Js' => array('Jquery'),
);
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'dashboard'),
            'logoutRedirect' => array('controller' => 'posts', 'action' => 'index')
        ),
        'SwiftMailer'
    );
    public function beforeRender()
    {
        parent::beforeRender();
        $userId=$this->userLoggedIn();

        $roleType=$this->roleType();
        $this->set(compact('userId','roleType'));
    }
    public function userLoggedIn()
    {
        $userId= $this->Auth->user('id');
        if(!empty($userId))
            return $userId;
        else
            return false;
    }
    public function roleType()
    {
        $roleType=$this->Auth->user('role_type');
        if($roleType==1)
            return true;// Admin
        else
            return false;//normal user
    }
    public function sendSmtpMail($data = array()) {

        $this->SwiftMailer->from = $data['from'];
        $this->SwiftMailer->fromName = $data['fromName'];
        $this->SwiftMailer->to = $data['to'];
        $this->SwiftMailer->toName = $data['toName'];

        $this->set('data', $data);
        if ($data['from'] == null) {
            return false;
        } elseif ($data['to'] == null) {
            return false;
        } elseif ($data['subject'] == null) {
            return false;
        } elseif (!$this->SwiftMailer->send($data['template'], $data['subject'])) {
            $this->log('Error sending email "$template".', LOG_ERROR);
            return false;
        } else {
            return true;
        }
    }


}
