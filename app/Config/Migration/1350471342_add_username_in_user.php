<?php
class AddUsernameInUser extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     * @access public
     */
    public $description = '';

    /**
     * Actions to be performed
     *
     * @var array $migration
     * @access public
     */
    public $migration = array(
        'up' => array(
            'create_field' => array(
                'users' => array(
                    'username' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL
                    )
                )
            )

        ),
        'down' => array(
        ),
    );

    /**
     * Before migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function before($direction) {

        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function after($direction) {
        if($direction=='up'){
            if (!class_exists('Auth')) {
                App::uses('AuthComponent', 'Controller/Component');
            }
            $userModel = $this->generateModel('User');
            $userData = $userModel->find('first',array('conditions'=>array('role_type'=>1)));
            $userData['User']['username']=$userData['User']['email'];
            $userModel->saveAll($userData);

        }
        return true;
    }
}
