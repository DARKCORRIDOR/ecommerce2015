create schema ecommerce;

use ecommerce;
create table customer (
    customerID varchar(10) primary key,
    customerName text,
    customerAddress text,
    customerEmail varchar(30)
);

insert into customer(customerID,customerName,customerAddress,customerEmail)
values("ECOMM11111", "Niena Alhassan", "Berekuso, Eastern Region", "niena.alhassan@gmail.com");

create table customerOrder (
    orderID varchar(8) primary key,
    customerID varchar(10),
    order_date date,
    foreign key (customerID)
        references customer (customerID)
);

insert into customerOrder(orderID,customerID,order_date)
values("EOR00001", "ECOMM11111", "2014-01-21");


create table product (
    productId varchar(10) primary key,
    producer varchar(50)
);



insert into product(productId,producer,productName)
values("PRODUCT001", "NESTLE", "MILO"),
("PRODUCT002", "NESTLE", "NIDO"),
("PRODUCT003", "PEPSODENT", "UNILEVER"),
("PRODUCT004", "SOME_COMPANY","SULTANA_RICE");
INSERT INTO `product`(`productId`, `producer`, `productName`, `productImage`, `price`)
 values("PRODUCT005","TikiWorks","plate","plate.jpg",6.00),
 ("PRODUCT006","GUCCI","scarf","scarf.jpg",6.00),
 ("PRODUCT007","COACH","sunglasses","shades.jpg",6.00),
 ("PRODUCT008","Stichyz","socks","socks.jpg",5.00),
 ("PRODUCT009","TikiWorks","vase","vase.jpg",50.00),
 ("PRODUCT010","Xiaomi","phone","xiaomiPhone.jpg",800.00);

INSERT INTO `orderdetails`(`orderID`, `productId`, `quantity`, `price`, `total`)
 VALUES ('EOR00001','PRODUCT008',1,0.00,0);


select count(*)  from orderdetails;

alter table product add productName varchar(25);
alter table product add productImage varchar(25);
alter table product add price decimal(8,2);
select 
    *
from
    product;
SELECT count(productName) FROM product;
select productName,price from product
       LIMIT 0, 2;
create table OrderDetails (
    orderID varchar(8),
    productId varchar(10),
    quantity int(3),
    price decimal(8 , 2 ),
    total decimal(8 , 2 ),
    foreign key (orderID)
        references customerOrder (orderID),
    foreign key (productId)
        references product (productId)
);

INSERT INTO OrderDetails(orderID,productId,quantity,price,total)
VALUES("EOR00001","PRODUCT004",5,30.00,5*30),
("EOR00001","PRODUCT001",5,30.00,5*30),
("EOR00001","PRODUCT002",5,30.00,5*30);


SELECT 
    productName
from
    OrderDetails,
    customerOrder,
    product,
    customer
where
    (orderDetails.orderID = customerOrder.orderID)
        and (orderDetails.productId = product.productID)
        and customer.customerID = 'ECOMM11111';

drop table if exists product1;

CREATE TABLE IF NOT EXISTS `product1` (
  `productId` varchar(10) NOT NULL,
  `producer` varchar(50) DEFAULT NULL,
  `productName` text,
  `productImage` varchar(25) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=myISAM DEFAULT CHARSET=latin1;

ALTER TABLE product1 ADD FULLTEXT (productName);
INSERT INTO `product1`(`productId`, `producer`, `productName`, `productImage`, `price`)
 values("PRODUCT005","TikiWorks","Monkeys like banana","plate.jpg",6.00),
 ("PRODUCT006","GUCCI","I have a lot of likes on facebook","scarf.jpg",6.00),
 ("PRODUCT007","COACH","sunglasses look so cool","shades.jpg",6.00),
 ("PRODUCT008","Stichyz","socks are like petty stuff to quarrel over","socks.jpg",5.00),
 ("PRODUCT009","TikiWorks","vase or naah","vase.jpg",50.00),
 ("PRODUCT010","Xiaomi","i like phones phone ","xiaomiPhone.jpg",800.00);
INSERT INTO `product`(`productId`, `producer`, `productName`, `productImage`, `price`)
 values
 ("PRODUCT011","TikiWorks","Kitchen Set","kitchenette.jpg",1500.00),
 ("PRODUCT012","Tiki Farms","Peach fruits","peaches5.jpg",10.00),
 ("PRODUCT013","Stichyz","Pink Mini Dress","pink_robe.JPG",75.00),
 ("PRODUCT014","TikiWorks","Green Dining Room Set","green kitchen.jpg",1000.00),
 ("PRODUCT015","Stichyz","Sneakers with bows ","cool.JPG",100.00);
INSERT INTO `product`(`productId`, `producer`, `productName`, `productImage`, `price`)
 values
 ("PRODUCT016","Stichyz","Pink back pack","back_pack.jpg",150.00),
 ("PRODUCT017","Stichyz","Black Coat","black dresses.PNG",150.00),
 ("PRODUCT018","TikiWorks","Happy Flower Pots","flowerpots.jpg",50.00),
 ("PRODUCT019","TikiWorks","Twin Bed Set","twinbeds.jpg",1500.00),
 ("PRODUCT020","Stichyz","Black Wedge","blackwedge.JPG",100.00);

SELECT * FROM product1 WHERE MATCH(productName) AGAINST ('like');
SELECT * FROM product1;
SELECT * FROM product where productName like '%milo%';


create table users(
user_id int(6) primary key,
User_Name text ,
phone integer(10),
email varchar (25)
);

create table posts(
post_id int(5) primary key,
user_id int(6) ,
item varchar(25),
post_type set ('buy','sell'),
min_price decimal (8,2),
max_price decimal(8,2),
post_status set ('closed','pending'),
post_date date,
foreign key(user_id) references users(user_id)
);

insert into posts (post_id,user_id,item,post_type,min_price,max_price,post_status,post_date)
values(1,500200,'tomatoes','buy',20.00,100.00,'pending',CUR_DATE());
insert into posts (post_id,user_id,item,post_type,min_price,max_price,post_status,post_date)
values(1,500250,'yam','buy',5.00,7.00,'pending',CUR_DATE());
