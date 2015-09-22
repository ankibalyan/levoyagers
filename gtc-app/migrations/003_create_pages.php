<?php
class Migration_Create_Pages extends CI_Migration
{
	public function up()
	{
		$fields = array(
			'id int(11) unsigned NOT NULL AUTO_INCREMENT',
			'title varchar(100) CHARACTER SET utf8 NOT NULL',
			'slug` varchar(100) CHARACTER SET utf8 NOT NULL',
			'order int(11) NOT NULL';
			'body text CHARACTER SET utf8 NOT NULL',
		);
		
		$this->dbforge->add_fields($fields);
		$this->dbforge->add_key('id',TRUE);
		$this->db->forge->create_table('pages');
		$this->db->query('ALTER TABLE `pages`');
	}
	
	public function down()
	{
		$this->dbforge->drop_table('pages');
	}
}