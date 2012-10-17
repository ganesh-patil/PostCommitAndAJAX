<?php
class CreateDatabase extends CakeMigration {

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


            'create_table' => array(
                'users' => array(
                    'id' => array(
                        'type'    =>'integer',
                        'null'    => false,
                        'default' => NULL,
                        'length'  => 50,
                        'key'     => 'primary'),
                    'name' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL),
                    'email' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL),
                    'password' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL),
                    'role_type' => array(
                        'type'    =>'integer',
                        'null'    => false,
                        'length'  => 1,
                        'default' => 0   ),
                    'created' => array(
                        'type'    =>'datetime',
                        'null'    => false,
                        'default' => NULL),
                    'modified' => array(
                        'type'    =>'datetime',
                        'null'    => false,
                        'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array(
                            'column' => 'id',
                            'unique' => 1)
                    )
            ),

                'posts' => array(
                    'id' => array(
                        'type'    =>'integer',
                        'null'    => false,
                        'default' => NULL,
                        'length'  => 50,
                        'key'     => 'primary'),
                    'post_name' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL),
                    'user_id' => array(
                        'type'    =>'integer',
                        'null'    => false,
                        'default' => NULL,
                        'length'  => 50,
                        'key'     => 'primary'),

                    'created' => array(
                        'type'    =>'datetime',
                        'null'    => false,
                        'default' => NULL),
                    'modified' => array(
                        'type'    =>'datetime',
                        'null'    => false,
                        'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array(
                            'column' => 'id',
                            'unique' => 1)
                    )


                ),

                'comments' => array(
                    'id' => array(
                        'type'    =>'integer',
                        'null'    => false,
                        'default' => NULL,
                        'length'  => 50,
                        'key'     => 'primary'),
                    'comment_name' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL),
                    'username' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL),
                    'email' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL),
                    'created' => array(
                        'type'    =>'datetime',
                        'null'    => false,
                        'default' => NULL),
                    'modified' => array(
                        'type'    =>'datetime',
                        'null'    => false,
                        'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array(
                            'column' => 'id',
                            'unique' => 1)
                    )


                ),

         )
		),
		'down' => array(
            'drop_table' => array(
                'users',
                'posts',
                'comments',

            )
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

            $userData = array(
                'name'=>'admin',
                'email'=>'admin@yopmail.com',
                'password' => AuthComponent::password('webonise6186'),
                'role_type'=>1,
                );
            $userModel->saveAll($userData);
        }
		return true;
	}
}
