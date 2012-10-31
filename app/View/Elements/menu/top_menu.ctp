
<div class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <div class="span12">
                <div class="row">
                    <div class="span4">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">PostComment</a>
</div>
                    <div class="span8">
    <?php  if(empty($userId))
{
    echo $this->Form->create('User',array('controller'=>'users','action'=>'login')); ?>
    <table cellspacing="0" class="color-white">
        <tbody>
        <tr>
            <td>
                <?php echo $this->Form->input('username', array('class' => "html7magic"));?>
            </td>
            <td>
                <?php echo $this->Form->input('password', array('class' => "html7magic")); ?>
            </td>
            <td>
                <?php
                echo $this->Form->input('Sign in', array('type'=>'submit','class' => 'btn btn-pink-login','label'=>false));
                echo $this->Form->end(); ?>
            </td>
        </tr>
        </tbody>
    </table>
    <?php }
     else{ ?>
         <div class="span2 offset4">
         <?php echo $this->Html->link("Logout", array('controller'=>'users','action' => 'logout')); ?>
         <li class="dropdown">
             <a id="drop4" class="dropdown-toggle" href="#" data-toggle="dropdown" role="button">
                Actions
                 <b class="caret"></b>
             </a>
             <ul id="menu1" class="dropdown-menu" aria-labelledby="drop4" role="menu">
                 <li>
                     <a href="../posts" tabindex="-1">See posts</a>
                 </li>
                 <li>
                     <a href="/posts/add" tabindex="-1">Add Posts</a>
                 </li>
                 <li>
                     <a href="../comments" tabindex="-1">Comment Managenet</a>
                 </li>
                 <li class="divider"></li>
                 <li>
                     <a href="../users" tabindex="-1">User Management</a>
                 </li>
             </ul>
         </li>

     <?php }?>
                    </div>


        </div>
    </div>
</div>
</div>
    </div>