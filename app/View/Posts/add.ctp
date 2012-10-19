
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






    });

    jQuery(function(){
        jQuery("#name").validate({
            expression: "if (isNaN(VAL) && VAL) return true; else return false;;",
            message: "Please enter name"
        });
        jQuery("#post").validate({
            expression: "if ( VAL.length > 50) return true; else return false;;",
            message: "post must be 50 characters"
        });



    });




    </script>

<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">


                <p><?php echo $this->Html->link("Add Post", array('controller'=>'posts','action' => 'add')); ?></p>
                <p><?php echo $this->Html->link("Add User", array('action' => 'add')); ?></p>
            </div>
            <div class="span10 ">
                <h1>Add Post</h1>
                <?php
                echo $this->Form->create('Post');
                echo $this->Form->input('post_name',array('id'=>'name'));
                echo $this->Form->textarea('post',array('class'=>'ckeditor','id'=>'post'));
                echo $this->FOrm->input('Post.user_id',array('type'=> 'hidden','value'=>1));
                echo $this->Form->end('Save Post');
                ?>

            </div>
        </div>
    </div>
</div>

