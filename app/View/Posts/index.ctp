<?php //pr($posts);die?>
<div class="container">
    <div class="container-fluid well sidebar-nav">
        <div class="row-fluid">
            <div class="span2 bs-docs-sidebar ">
                <p><?php echo $this->Html->link("Add Post", array('controller'=>'posts','action' => 'add')); ?></p>
                <p><?php echo $this->Html->link("logout", array('controller'=>'users','action' => 'logout')); ?></p>

            </div>
            <div class="span10 ">


                    <?php foreach ($posts as $post): ?>

                        <h1><?php echo $post['Post']['post_name']; ?></td></h1>

                <?php $mysqldate = date( 'Y-m-d', strtotime( $post['Post']['created']) ); ?>

                <p><?php echo $mysqldate ?></p>
<?php
                $array_of_words = explode(" ", $post['Post']['post']);

                //Loop the array the requested number of times and build an output, re-inserting spaces.
                for ($i = 0; $i <= 0; $i++) {
                 $html_decoded = html_entity_decode($array_of_words[$i]);
                    echo   $html_decoded . " ";
                } ?>
                <?php echo $this->Html->link("Read More", array('controller'=>'posts','action' => 'view',$post['Post']['id'])); ?>
<!--                    --><?php //echo $post['Post']['post']; ?><!--</td>-->

                    <?php endforeach; ?>
                    <?php unset($post); ?>
                </table>
            </div>

            </div>
        </div>
    </div>
</div>








