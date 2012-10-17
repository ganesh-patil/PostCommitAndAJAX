<?php //pr($post);die;?>
<h1><?php echo h($post['Post']['post_name']); ?></h1>
  <?php
     foreach($post['Comment'] as $comment)
     {
         echo "User:       ";
         echo $comment['username'];
         echo '</br>';
         echo "Comment:      ";
         echo $comment['comment_name'];
         echo '</br>';
     }

    ?>

<?php
echo "add your own comment ";
echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'add'));
echo $this->Form->input('username');
echo $this->Form->hidden('post_id',array('value'=> $post['Post']['id']));
echo $this->Form->input('email');
echo $this->Form->input('comment_name');
echo $this->Form->end('Save Comment');
?>
