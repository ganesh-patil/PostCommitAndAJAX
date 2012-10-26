<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 17/10/12
 * Time: 3:37 PM
 * To change this template use File | Settings | File Templates.
 */
class Comment extends AppModel {
    public $name= 'Comment';
    public $belongsTo = array(
        'Post' => array(
            'className'    => 'Post',
            'foreignKey'   => 'post_id'
        )
    );


    public function commentStatus($id,$status)
    {
        $comment=$this->find('first',array('fields'=>array('Comment.id','Comment.is_approved'),'conditions'=> array('Comment.id'=>$id)));
        //pr($comment);die;
        $saveData['Comment']['id']=$comment['Comment']['id'];
        $saveData['Comment']['is_approved']=$status;
        if($this->save($saveData))
        {
            return true;
        }
        else{
            return false;
        }
    }
}

?>