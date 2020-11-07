DROP TABLE IF EXISTS `#__analyses`;

CREATE TABLE IF NOT EXISTS `#__analyses` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`asset_id` INT(10)     NOT NULL DEFAULT '0',
`created_by` int(11) NOT NULL,
`explanation` text,
`type_of_analysis` varchar(255),
`image` text,
`date` datetime,
`adder_id` int(11),
`published` TINYINT(4) NOT NULL DEFAULT '1',
`catid`	    int(11)    NOT NULL DEFAULT '0',
`params`   VARCHAR(1024) NOT NULL DEFAULT '',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;