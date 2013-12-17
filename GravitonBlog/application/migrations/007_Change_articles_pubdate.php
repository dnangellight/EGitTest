<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Change_articles_pubdate extends CI_Migration {

	public function up()
	{
		$fields = array(
                        'pubdate' => array(
                                                         'name' => 'pubdate',
                                                        'type' => 'VARCHAR',
				'constraint' => '11',
                                                ),
);
$this->dbforge->modify_column('articles', $fields);
	}

	public function down()
	{
		$fields = array(
                        'pubdate' => array(
                                                         'name' => 'pubdate',
                                                        'type' => 'VARCHAR',
                        		'constraint' => '11',
                                                ),
);
$this->dbforge->modify_column('articles', $fields);
	}
}