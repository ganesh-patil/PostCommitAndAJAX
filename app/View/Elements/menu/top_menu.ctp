<div class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Post Comment</a>
            <div class="nav-collapse collapse">

            <?php echo $this->Form->create('User',array('class'=>"navbar-form pull-right inline",'controller'=>'users','action'=>'login')); ?>
            <?php echo $this->Form->input('username',array('class' => "span2",'placeholder'=>'Email','label' => false,'div'=>false));?>
            <?php echo $this->Form->input('password',array('class' => "span2",'placeholder'=>'password','label' => false,'div'=>false));?>
            <?php echo $this->Form->input('Login',array('type'=>'submit','class'=>"btn btn-primary",'label'=>false,'div'=>false));
                echo $this->Form->end();?>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>