<?php

$this->startSetup();

$this->run("

	CREATE TABLE IF NOT EXISTS {$this->getTable('customer_extended_info')} (
		`info_id` int(10) unsigned NOT NULL auto_increment,
		`entity_id` int(10) unsigned NOT NULL,
            `matriculation_year` int(11) NOT NULL,
            `matriculation_school` TEXT NOT NULL default '',
            `matriculation_city` VARCHAR (1024) NOT NULL default '',
            `matriculation_stream` VARCHAR (1024) default '',
            `matriculation_marks` VARCHAR (50) NOT NULL default '',
            `intermediate_year` int(11) NOT NULL,
            `intermediate_school` TEXT NOT NULL default '',
            `intermediate_city` VARCHAR (1024) NOT NULL default '',
            `intermediate_stream` VARCHAR (1024) default '',
            `intermediate_marks` VARCHAR (50) NOT NULL default '',
            `graduation_year` int(11) NOT NULL,
            `graduation_college` TEXT NOT NULL default '',
            `graduation_university` TEXT NOT NULL default '',
            `graduation_city` VARCHAR (1024) NOT NULL default '',
            `graduation_stream` VARCHAR (1024) default '',
            `graduation_marks` VARCHAR (50) NOT NULL default '',
            `pgraduation_year` int(11) NOT NULL,
            `pgraduation_college` TEXT NOT NULL default '',
            `pgraduation_university` TEXT NOT NULL default '',
            `pgraduation_city` VARCHAR (1024) NOT NULL default '',
            `pgraduation_stream` VARCHAR (1024) default '',
            `pgraduation_marks` VARCHAR (50) NOT NULL default '',
            `others` TEXT NOT NULL default '',
            `created_at` TIMESTAMP DEFAULT 0,
            `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (`info_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Collection: Page';

		ALTER TABLE `customer_extended_info` ADD CONSTRAINT `FK_CUSTOMER_ENTITY_ID_CUSTOMER_ENTITY_ENTITY_ID` FOREIGN KEY (`entity_id`) REFERENCES `customer_entity`(`entity_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

	");

$this->endSetup();