<?php

$installer = $this;

$installer->startSetup();

$installer->run("
	DROP TABLE IF EXISTS {$installer->getTable('training/animal')};
	CREATE TABLE {$installer->getTable('training/animal')} (
		entity_id INT(11) Unsigned auto_increment primary key,
		name varchar(255) not null default '',
		type varchar(255) not null default '',
		edible tinyint(1) unsigned not null default 1
	) Engine=InnoDB DEFAULT CHARSET=utf8;
	");

$installer->endSetup();