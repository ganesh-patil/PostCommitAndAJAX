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
    public $helpers = array('Html', 'Form','Fck','Session','Facebook.Facebook');
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'dashboard'),
            'logoutRedirect' => array('controller' => 'posts', 'action' => 'index')
        ),
        'SwiftMailer',
        'Facebook.Connect',
        'RequestHandler'
    );
public function beforeFilter()
{
    $this->set('facebook_user',$this->Connect->user());
}
//    function beforeFilter() {
//        parent::beforeFilter();
//
//        // For RESTful web service requests, change the authentication mechanism to HTTP basic.
//        if (array_key_exists('api', $this->params) && $this->params['api']) {
//            // Prevent the AuthComponent from forwarding the request by setting the loginAction to the current request's URI.
//            $this->Auth->loginAction = $this->here;
//
//            $this->Security->loginOptions = array(
//                'type' => 'basic',
//                'login' => '_api_login'
//            );
//            $this->Security->requireLogin();
//        }
//    }
//
//    function _api_login($args) {
//        // Attempt to find a user record using the API key (username) specified.
//        $user = $this->Auth->getModel()->findByApiKey($args['username'], array('username', 'password'));
//
//        // If a user is found and the credentials are validated by the AuthComponent::login() method, allow the request.
//        if ($user && $this->Auth->login($user))
//            $this->Auth->allow($this->params['action']);
//        else
//            $this->Security->blackHole($this, 'login');
//    }

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
