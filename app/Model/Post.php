<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 17/10/12
 * Time: 3:36 PM
 * To change this template use File | Settings | File Templates.
 */
class Post extends AppModel {
    public $name = 'Post';
     public $hasMany = array(

         'Comment' =>array(
             'className' => 'Comment',
             'dependant' => true
         )
       );
    public $belongsTo = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'user_id'
        )
    );
}
?>