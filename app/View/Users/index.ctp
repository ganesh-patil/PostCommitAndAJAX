<p><?php echo $this->Html->link("login", array('controller'=>'users','action' => 'login')); ?></p>

<p><?php echo $this->Html->link("Add Post", array('controller'=>'posts','action' => 'add')); ?></p>
<p><?php echo $this->Html->link("Add User", array('action' => 'add')); ?></p>

<table>
<h1>Users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>email</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['name'],
            array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['email']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>
