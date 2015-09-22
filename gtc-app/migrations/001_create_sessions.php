<?php
class Migration_Create_Sessions extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function up()
	{
		$fields = array(
			'session_id varchar(40) DEFAULT \'0\' NOT NULL',
			'ip_address varchar(45) DEFAULT \'0\' NOT NULL',
			'user_agent varchar(120) NOT NULL',
			'last_activity int(10) unsigned DEFAULT 0 NOT NULL'
			'user_data text NOT NULL',
		);
		
		$this->dbforge->add_fields($fields);
		$this->dbforge->add_key('session_id',TRUE);
		$this->db->forge->create_table('ci_sesssions');
		$this->db->query('ALTER TABLE `ci_sesssions` ADD KEY `last_activity_idx` (`last_activity`)');
	}
	
	public function down()
	{
		$this->dbforge->drop_table('ci_sesssions');
	}
}
