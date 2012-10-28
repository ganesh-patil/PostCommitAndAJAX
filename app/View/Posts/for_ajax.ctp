<?php //$this->Html->script('prototype', array('inline' => false)); ?>
<h1>Add comment change</h1>
<?php echo $this->Form->create('Post');
echo $this->Form->input('Post.id', array('label' => 'Post', 'empty' => '-- Pick a Post --','options' => $posts,'onchange'=>$this->Js->request(
    array('controller'=>'Posts','action'=>'ajaxChapter'),array(

        'async' => false,
        'update' => '#CommentPostId',
        'data' => '{id:$(this).val()}',
        'dataExpression' => true
    )
)));
echo $this->Form->input('Post.comment_id', array('id'=>'CommentPostId','label' => 'Comment', 'empty' => '-- Pick a comment --'));
echo $this->Form->input('Comment.change');
//echo $this->Js->request('/Post/ajaxChapters', array( 'update' => 'PostComment_id'));
//echo $this->Js->request(
//    array('action' => 'ajaxChapters', 'Post.Id'),
//    array('async' => true, 'update' => 'Post.Comment_id')
//);
?>

<?php
echo $this->Form->end('Submit change');

?>