<?// pr($comment) ?>

<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">
                <p><?php echo $this->Html->link("Add Post", array('controller'=>'posts','action' => 'add')); ?></p>
                <p><?php echo $this->Html->link("Manage Comments", array('controller'=>'comments','action' => 'index')); ?></p>
            </div>
            <div class="span10 ">

            </div>
        </div>
    </div>
</div>

