DROP TABLE article;

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_text` text,
  `article_event_dt` date NOT NULL,
  `article_created_dt` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE employee;

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `emp_fname` varchar(50) NOT NULL,
  `emp_lname` varchar(50) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_pass` varchar(50) NOT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `emp_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE images;

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_link` varchar(255) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE users;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(40) NOT NULL,
  `user_profile` varchar(100) DEFAULT NULL,
  `user_type` int(5) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO users VALUES("1","hophearun","hophearun@gmail.com","21232f297a57a5a743894a0e4a801fc3","admin_profile.jpg","1");



