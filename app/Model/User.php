<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 17/10/12
 * Time: 3:35 PM
 * To change this template use File | Settings | File Templates.
 */
class User extends AppModel {
    public $name = 'User';
    public $helpers = array('Html', 'Form','Session');
    public $hasMany = array(

        'Post' =>array(
            'className' => 'Post',
            'dependant' => true
        ),


    );
    public function beforeSave($options = array()) {
       // pr($this->alias);die;
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
          //  $this->data[$this->alias]['password'];
        }
        return true;
    }
    public function addUser($data)
    {
        $this->create();
        if ($this->save($data)) {
            return true;
        } else {
            return false;
        }
    }
}
?>