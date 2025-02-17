
alter table users add cpassword varchar(10) DEFAULT NULL after password;
alter table users add profile varchar(10) DEFAULT NULL after cpassword;
alter table users add status varchar(10) DEFAULT NULL after profile;
alter table users add user_type_id varchar(10) DEFAULT NULL after name;
alter table users add gender varchar(10) DEFAULT NULL after user_type_id;
alter table users add phone varchar(10) DEFAULT NULL after gender;
alter table users add address varchar(10) DEFAULT NULL after phone;
alter table users add aadhaar_no varchar(10) DEFAULT NULL after address;
alter table users add date_of_birth varchar(10) DEFAULT NULL after aadhaar_no;
alter table users add status varchar(10) DEFAULT NULL after date_of_birth;
alter table users add wallet decimal(10,2) DEFAULT NULL after status;
alter table users add domain_renewal date DEFAULT NULL after status;
alter table users add server_renewal date DEFAULT NULL after domain_renewal;
alter table users add url varchar(100) DEFAULT NULL after server_renewal;
alter table users add username varchar(50) DEFAULT NULL after url;

CREATE TABLE `bill` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone` varchar(10) DEFAULT NULL,
  `service_list` varchar(100) DEFAULT NULL,
  `service_details` varchar(200) DEFAULT NULL,
  `amount` varchar(10) DEFAULT NULL,
  `paid_unpaid` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

alter table bill add bill_id varchar(10) DEFAULT NULL after id;
alter table bill add utrno varchar(20) DEFAULT NULL after bill_id;
alter table bill add name varchar(20) DEFAULT NULL after utrno;

CREATE TABLE `web_register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `api` varchar(10) DEFAULT NULL,
  `domain` varchar(10) DEFAULT NULL,
  `domain_name` varchar(50) DEFAULT NULL,
  `website_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;