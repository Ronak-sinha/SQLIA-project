-- Create database
DROP DATABASE IF EXISTS `sqli`;
CREATE DATABASE IF NOT EXISTS `sqli` ;
USE `sqli`;


-- Create `users` table
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- table `users` content
DELETE FROM `users`;
INSERT INTO `users` (`id`, `username`, `password`) VALUES 
(1, 'admin', 'pwd1'),
(2, 'ronak', 'sinha'),
(3, 'shreyash', 'vit'),
(4, 'rohit', 'vit'),
(5, '19bit0019', 'ronak'),
(6, '19bit0001', 'shreyash'),
(7, '19bit0318', 'rohit'),
(8, 'abc', '123'),
(9, 'isaa', 'project'),
(10, 'pdf', 'pass');


-- Create `books` table
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL DEFAULT '0',
  `author` VARCHAR(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3;

-- table `books` content
DELETE FROM `books`;
INSERT INTO `books` (`id`, `title`, `author`) VALUES 
(1, 'PALACE OF ILLUSIONS', 'Chitra Banerjee Divakaruni'),
(2, 'THE WHITE TIGER', 'Aravind Adiga'),
(3, 'PASHMINA', 'Nidhi Chanani'),
(4, 'THE WINDFALL', 'Diksha Basu'),
(5, 'Amnesty', 'Aravind Adiga'),
(6, 'THE IBIS TRILOGY', 'Amitav Ghosh'),
(7, 'A HIMALAYAN LOVE STORY', 'Namita Gokhale'),
(8, 'THE GUEST', 'Mitali Meelan'),
(9, 'The Inheritance of Loss', 'Kiran Desai'),
(10, 'The Home and the World', 'Rabindranath Tagore'),
(11, 'Emblems of Transformation', 'Kiran Desai'),
(12, 'An Era of Darkness\: The British Empire in India', 'Shashi Tharoor'),
(13, 'Inglorious Empire', 'Shashi Tharoor');