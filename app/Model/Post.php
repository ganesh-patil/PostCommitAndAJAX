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
    public function addData($data)
    {
       // pr($data);die;
        $html_encoded = htmlentities($data['Post']['post']);
        $html_encoded=strip_tags($html_encoded);
        //pr($html_encoded);die;
        $data['Post']['post']=$html_encoded;
        $this->create();
        if ($this->save($data)) {
            return true;
        } else {
            return false;
        }
    }
}
?>