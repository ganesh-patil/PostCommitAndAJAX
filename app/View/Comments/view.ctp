
<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">
<!--                <p>--><?php //echo $this->Html->link("back", array('controller'=>'posts','action' => 'view')); ?><!--</p>-->


            </div>
            <div class="span10 ">




                <h2><?php echo h($post['Post']['post_name']); ?></h2>
                <?php  $phpdate = $post['Post']['created'];
                $mysqldate = date( 'Y-m-d', strtotime( $phpdate ) ); ?>

                <p><?php echo $mysqldate ?></p>
                <p><?php echo $post['Post']['post'] ?></p>



                <?php foreach ($post['Comment'] as $comment):

                if($comment['is_approved']==1)
                {
                    echo h($comment['username']);
                    echo '</br>';
                    echo h($comment['comment_name']);
                    echo '</br>';


                }

            endforeach ?>
                <?php
                echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'add'));

                echo $this->Form->input('username',array('lable'=>false,'id'=>'name'));
                echo $this->Form->hidden('post_id',array('value'=> $post['Post']['id']));
                echo $this->Form->input('email',array('id'=>'email'));
                echo $this->Form->input('comment_name',array('rows' => '3','id'=>'comment_name'));
                //echo $this->fck->load('Comment.comment_name');
                echo $this->Form->end('Save Comment');
                ?>

            </div>

        </div>
    </div>
</div>
</div>
