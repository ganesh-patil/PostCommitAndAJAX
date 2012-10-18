<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">
                <p><?php echo $this->Html->link("login", array('controller'=>'users','action' => 'login')); ?></p>

                <p><?php echo $this->Html->link("Add Post", array('controller'=>'posts','action' => 'add')); ?></p>
                <p><?php echo $this->Html->link("Add User", array('action' => 'add')); ?></p>
            </div>
            <div class="span10 ">
                <h1>Add Post</h1>
                <?php
                echo $this->Form->create('Post');
                echo $this->Form->input('post_name');
                echo $this->Form->input('post',array('rows' => '3'));
                echo $this->FOrm->input('Post.user_id',array('type'=> 'hidden','value'=>1));
                echo $this->Form->end('Save Post');
                ?>

            </div>
        </div>
    </div>
</div>

