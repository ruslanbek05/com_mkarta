DROP TABLE IF EXISTS `#__analyses`;

CREATE TABLE IF NOT EXISTS `#__analyses` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`created_by` int(11) NOT NULL,
`explanation` text,
`type_of_analysis` varchar(255),
`image` text,
`date` datetime,
`adder_id` int(11),
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;