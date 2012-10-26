<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">

                <p><?php echo $this->Html->link("Back", array('action' => 'index')); ?></p>
            </div>
            <div class="span10 ">
                <h1>Add User</h1>
                <?php
                echo $this->Form->create('User');
                echo $this->Form->input('name');
                echo $this->Form->input('username');
                echo $this->Form->input('email');
                echo $this->Form->input('password');
                echo $this->Form->input('role_type',array('type'=> 'hidden','value'=>0));
                echo $this->Form->end('Save');
                ?>

            </div>
        </div>
    </div>
</div>

