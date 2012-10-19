<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 18/10/12
 * Time: 5:39 PM
 * To change this template use File | Settings | File Templates.
 */
class FckHelper extends Helper {

    var $helpers = Array('Html');

    function load($id) {
        $did = '';
        foreach (explode('.', $id) as $v) {
            $did .= ucfirst($v);
        }

        $code = "CKEDITOR.replace( '".$did."' );";
        return $this->Html->codeBlock($code);
    }
}
?>