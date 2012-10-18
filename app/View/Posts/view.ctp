<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">
                <p><?php echo $this->Html->link("Add Post", array('controller'=>'posts','action' => 'add')); ?></p>
                <p><?php echo $this->Html->link("logout", array('controller'=>'users','action' => 'logout')); ?></p>

            </div>
            <div class="span10 ">



<!--            --><?php //pr($post);die;?>
            <h2><?php echo h($post['Post']['post_name']); ?></h2>
            <p><?php echo h($post['Post']['post']); ?></p>


            <?php foreach ($post['Comment'] as $comment):

                if($comment['is_approved']==0)
                {
                    echo h($comment['username']);
                    echo '</br>';
                    echo h($comment['comment_name']);
                    echo '</br>';


                }

             endforeach ?>
            <?php
            echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'add'));

            echo $this->Form->input('username',array('lable'=>false));
            echo $this->Form->hidden('post_id',array('value'=> $post['Post']['id']));
            echo $this->Form->input('email');
            echo $this->Form->input('comment_name',array('rows' => '3'));
            //echo $this->fck->load('Comment.comment_name');
                echo $this->Form->end('Save Comment');
            ?>

            </div>

        </div>
    </div>
</div>
</div>










<!--====================-->
<!--<div class="container">-->
<!--    <p>--><?php //echo $this->Html->link("Add Post", array('controller'=>'posts','action' => 'add')); ?><!--</p>-->
<!--    <p>--><?php //echo $this->Html->link("logout", array('controller'=>'users','action' => 'logout')); ?><!--</p>-->
<!---->
<!--    <h1>Posts</h1>-->
<!--    <table cellpadding="0" cellspacing="0" width="100%" class="table table-condensed">-->
<!--        <tr>-->
<!--            <th>Id</th>-->
<!--            <th>post_name</th>-->
<!---->
<!--        </tr>-->
<!---->
<!--        <!-- Here is where we loop through our $posts array, printing out post info -->-->
<!---->
<!--        --><?php //foreach ($posts as $post): ?>
<!--        <tr>-->
<!--            <td>--><?php //echo $post['Post']['id']; ?><!--</td>-->
<!--            <td>-->
<!--                --><?php //echo $this->Html->link($post['Post']['post_name'],
//                array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
<!--            </td>-->
<!--        </tr>-->
<!--        --><?php //endforeach; ?>
<!--        --><?php //unset($post); ?>
<!--    </table>-->
<!--</div>-->
<!---->
<!---->
<!---->
<?php ////pr($post);die;?>
<!--<h1>--><?php //echo h($post['Post']['post_name']); ?><!--</h1>-->
<!--  --><?php
//     foreach($post['Comment'] as $comment)
//     {
//         echo "User:       ";
//         echo $comment['username'];
//         echo '</br>';
//         echo "Comment:      ";
//         echo $comment['comment_name'];
//         echo '</br>';
//     }
//
//    ?>
<!---->
<?php
//echo "add your own comment ";
//echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'add'));
//echo $this->Form->input('username');
//echo $this->Form->hidden('post_id',array('value'=> $post['Post']['id']));
//echo $this->Form->input('email');
//echo $this->Form->input('comment_name');
//echo $this->Form->end('Save Comment');
//?>
