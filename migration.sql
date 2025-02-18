
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

CREATE TABLE `demonite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rs_coin` decimal(10,2) DEFAULT 0,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

INSERT INTO `demonite` VALUES (1,500),(2,200),(3,100),(4,50),(5,20),(6,10),(7,5),(8,2),(9,1);

CREATE TABLE `demo_payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `count` decimal(10,2) DEFAULT 0,
  `total` decimal(10,2) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;