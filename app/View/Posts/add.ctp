<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('post_name');
echo $this->Form->end('Save Post');
?>
