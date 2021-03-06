<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeDescription = __d('cake_dev', 'Postcomment');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta(array("name"=>"viewport","content"=>"width=device-width,  initial-scale=1.0"));
    echo $this->Html->meta('icon');

    echo $this->Html->css('bootstrap');
    echo $this->Html->css('bootstrap-responsive');
    // docs.css is only for this exapmple, remove for app dev
    //echo $this->Html->css('docs');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    //echo $this->fetch('js');
  //  echo $this->javascript->link('ckeditor/ckeditor', NULL, false);
    echo $this->Html->script(array('jquery-1.8.2','jquery-ui','jquery.validate','jquery.validation.functions','bootstrap-dropdown'));
    echo $this->Html->script('libs/modernizr.min');
    echo $this->Html->script('libs/jquery');
    echo $this->Html->script('ckeditor/ckeditor.js');
   echo $this->Html->script('libs/jquery');
    echo $this->Html->script('ckeditor/ckeditor');

    echo $this->Html->script('libs/bootstrap.min');
    echo $this->Html->script('bootstrap/application');
    echo $this->fetch('script');
    ?>

</head>
<body data-spy="scroll" data-target=".subnav" data-offset="50">

<header class="container">

<!--    <h1>--><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?><!--</h1>-->
    <?php echo $this->element('menu/top_menu'); ?>

</header> <!-- /container -->

<div id="container">
    <div id="content">
<!--        --><?php //echo $this->Session->flash(); ?>
      <?php   echo $this->Session->flash('flash', array('element' => 'failure')); ?>


<?php //echo $this->element('menu/top_menu'); ?>

        <?php echo $this->fetch('content'); ?>
    </div>
</div>

<footer class="container">
<!--    --><?php //echo $this->Html->link(
//    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
//    'http://www.cakephp.org/',
//    array('target' => '_blank', 'escape' => false)
//);
    ?>
    <p>© Company 2012</p>
</footer><!-- /container -->

<?php //echo $this->element('sql_dump'); ?>
</body>
</html>