<div class="users form">
<!--    --><?php //echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>
<?php
//echo $this->Form->create('Login');
//echo $this->Form->input('Login.email');
//echo $this->Form->input('Login.username');
//echo $this->Form->input('Login.password'); #actual field in db
//echo $this->Form->input('Login.retype_password',array('type'=>'password')); #not in DB, only for comparison check...
//echo $this->Form->end('submit');
//?>