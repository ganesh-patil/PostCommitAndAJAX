<?// pr($comment) ?>
<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">
                <p><?php echo $this->Html->link("Back", array('controller'=>'posts','action' => 'index')); ?></p>
            </div>
            <div class="span10 ">
                <h1>Users</h1>
                <table cellpadding="0" cellspacing="0" width="100%" class="table table-condensed">
                    <tr>
                        <th>Index</th>
                        <th>comment</th>
                        <th>post</th>
                        <th>Action</th>
                    </tr>

                    <!-- Here is where we loop through our $posts array, printing out post info -->
                    <?php  $counter=1?>
                    <?php foreach ($comment as $comments): ?>
                    <tr>
                        <td><?php echo $counter++ ?></td>
                        <td>
                            <?php echo $comments['Comment']['comment_name'] ?>

                        </td>
                        <td>
                            <?php echo $comments['Post']['post_name'] ?>

                        </td>
                        <td>
                            <?php if($comments['Comment']['is_approved']==0)
                            echo $this->Html->link('Approve',array('controller' => 'comments', 'action' => 'approve', $comments['Comment']['id']));
                              else
                             echo $this->Html->link('Disapprove',array('controller' => 'comments', 'action' => 'disApprove', $comments['Comment']['id'])); ?>

                            <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $comments['Comment']['id']),array('confirm' => 'Are you sure?'));?>
                        </td>


                    </tr>
                    <?php endforeach; ?>
                    <?php unset($comments); ?>
                </table>
            </div>
        </div>
    </div>
</div>

