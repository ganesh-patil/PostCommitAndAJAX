<?php
class AlterFields extends CakeMigration {

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
                'posts' => array(
                    'post' => array(
                        'type'    =>'string',
                        'null'    => false,
                        'length'  => 255,
                        'default' => NULL),
                ),
                'comments' => array(
                    'is_approved' => array(
                        'type'    =>'integer',
                        'null'    => false,
                        'length'  => 1,
                        'default' => 0),
                )
            )
		),
		'down' => array(
            'drop_field' => array(
                'posts' => array(
                    'post'),
                'comments' => array(
                    'is_approved')
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
		return true;
	}
}
