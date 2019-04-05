<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%db}}`.
 */
class m190405_204035_create_db_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
$dbType = $this->db->driverName;
$tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
$tableOptions_mssql = "";
$tableOptions_pgsql = "";
$tableOptions_sqlite = "";
/* MYSQL */
if (!in_array('db', $tables))  { 
if ($dbType == "mysql") {
	$this->createTable('{{%db}}', [
		'id' => 'SMALLINT(6) NOT NULL AUTO_INCREMENT',
		0 => 'PRIMARY KEY (`id`)',
		'name' => 'VARCHAR(50) NOT NULL',
		'email' => 'VARCHAR(100) NOT NULL',
		'whatsapp' => 'VARCHAR(15) NOT NULL',
		'phone' => 'VARCHAR(15) NOT NULL',
		'address' => 'VARCHAR(250) NOT NULL',
		'create_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ',
	], $tableOptions_mysql);
}
}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `db`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
