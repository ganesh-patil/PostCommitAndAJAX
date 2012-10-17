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
    public $hasMany = array(

        'Post' =>array(
            'className' => 'Post',
            'dependant' => true
        ),


    );
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}
?>