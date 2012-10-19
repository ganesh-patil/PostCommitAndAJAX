<?// pr($post);die; ?>
<?php echo $this->Html->script('ckeditor/ckeditor');?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.button').button();
        $('.back').click(function(){
            parent.history.back();
            return false;
        });
    })
 </script>

<script src="/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
    var SelfID = jQuery(this).attr("id");

    jQuery(function(){
        jQuery("#name").validate({
            expression: "if (isNaN(VAL) && VAL) return true; else return false;;",
            message: "Please enter name"
        });
        jQuery("#name").validate({
            expression: "if (VAL.match(/^[a-zA-z ]*$/)) return true; else return false;;",
            message: "Please enter valid name"
        });


        jQuery("#email").validate({
            expression: "if (VAL) return true; else return false;;",
            message: "Please enter email-id"
        });

        jQuery("#email").validate({
            expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;;",
            message: "Please enter valid  email"
        });


    });

</script>

<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">
                <?php echo $this->Html->link('Back','',array('class'=>"button back btn btn-pink")); ?>
            </div>
            <div class="span10 ">



<!--            --><?php //pr($post);die;?>
            <h2><?php echo h($post['Post']['post_name']); ?></h2>
               <?php  $phpdate = $post['Post']['created'];
                $mysqldate = date( 'Y-m-d', strtotime( $phpdate ) ); ?>

                <p><?php echo $mysqldate ?></p>



                <? $html_decoded = html_entity_decode($post['Post']['post']);?>
                <?php echo $html_decoded; ?><!--</p>-->


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
 //               echo $this->Html->link('ckeditor/ckeditor', NULL, false);

            echo $this->Form->create('Comment',array('controller'=>'comments','action'=>'add'));

            echo $this->Form->input('username',array('lable'=>false,'id'=>'name'));
            echo $this->Form->hidden('post_id',array('value'=> $post['Post']['id']));
            echo $this->Form->input('email',array('id'=>'email'));
            echo $this->Form->textarea('comment_name',array('class'=>'ckeditor'));
            //echo $this->fck->load('Comment.comment_name');
            // echo $this->Form->textarea('content',array('class'=>'ckeditor'));
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
