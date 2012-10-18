
<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">
                <p><?php echo $this->Html->link("Add Post", array('controller'=>'posts','action' => 'add')); ?></p>
                <p><?php echo $this->Html->link("logout", array('controller'=>'users','action' => 'logout')); ?></p>

            </div>
            <div class="span10 ">
                <h1>Posts</h1>
                <table cellpadding="0" cellspacing="0" width="100%" class="table table-condensed">
                    <tr>
                        <th>Id</th>
                        <th>post_name</th>

                    </tr>

                    <!-- Here is where we loop through our $posts array, printing out post info -->

                    <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo $post['Post']['id']; ?></td>
                        <td>
                            <?php echo $this->Html->link($post['Post']['post_name'],
                            array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php unset($post); ?>
                </table>
            </div>

            </div>
        </div>
    </div>
</div>








