<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Users extends CI_Migration {

	public function up()
	{
		// Drop table 'users if it exists		
		$this->dbforge->drop_table('users');

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'email' => array(
				'type' => 'TEXT',
				'null' => FALSE,
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => FALSE
			),
			'type' =>array(
				'type' =>  'VARCHAR',
				'constraint' => 100,
			),
			'key' => array(
				'type' => 'VARCHAR',
				'constraint' => 32,
				'null' => TRUE,
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users',TRUE);
		$this->db->query('ALTER TABLE  `users` CHANGE  `type`  `type` ENUM(\'Administrator\',\'General\') NOT NULL DEFAULT  \'General\'');
		
		// Dumping data for table 'users'
		$data = array(
			array(
				'id' => '1',
				'username' => 'admin',
				'email' => 'admin@site.com',
				'password' => sha1('admin'.config_item('encryption_key')),
				'type' => 'Administrator',
				'key' => '',
			),
		);
		$this->db->insert_batch('users', $data);
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}