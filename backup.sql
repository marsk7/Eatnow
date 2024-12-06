/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 80026
 Source Host           : localhost:3306
 Source Schema         : eatnow

 Target Server Type    : MySQL
 Target Server Version : 80026
 File Encoding         : 65001

 Date: 13/10/2024 14:44:42
*/

USE eatnow;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_restaurant_id_foreign` (`restaurant_id`),
  CONSTRAINT `categories_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` (`id`, `restaurant_id`, `name`) VALUES (1, 1, 'entrees');
INSERT INTO `categories` (`id`, `restaurant_id`, `name`) VALUES (2, 1, 'main');
INSERT INTO `categories` (`id`, `restaurant_id`, `name`) VALUES (3, 1, 'desserts');
INSERT INTO `categories` (`id`, `restaurant_id`, `name`) VALUES (4, 1, 'drinks');
COMMIT;

-- ----------------------------
-- Table structure for menuitems
-- ----------------------------
DROP TABLE IF EXISTS `menuitems`;
CREATE TABLE `menuitems` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int unsigned NOT NULL,
  `category_id` int unsigned NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `menuitems_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `menuitems_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of menuitems
-- ----------------------------
BEGIN;
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (1, 1, 2, 'Royal Spiced Chicken Biryani', 'images/main/1.jpeg', 'This exquisite dish features premium basmati rice cooked with a variety of aromatic spices and tender chicken. Each bite is infused with the rich, exotic flavors of the spices, while the rice is fluffy and perfectly seasoned. The chicken is juicy and flavorful, making it an ideal pairing with yogurt or curry sauces. Its enticing aroma and delicious taste make this dish a must-have on any dining table.', 13.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (2, 1, 2, 'Spicy Grilled Chicken Quarters', 'images/main/2.jpg', 'Juicy, well-marinated chicken quarters grilled to perfection, with a smoky flavor and spicy kick. Served with fresh coriander for garnish, this dish is perfect for those who enjoy bold, fiery flavors.', 17.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (3, 1, 2, 'Tangy Stir-Fried Noodles', 'images/main/3.jpeg', 'A vibrant bowl of stir-fried noodles tossed with fresh vegetables, soy sauce, and a hint of chili for an extra kick. This dish balances tangy and spicy flavors, offering a fulfilling and flavorful meal.', 11.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (4, 1, 2, 'Shredded Chicken & Corn Delight', 'images/main/4.PNG', 'A flavorful plate of tender shredded chicken topped with a tangy sauce, served alongside a creamy corn salad and fresh vegetables. A wholesome and balanced meal for a satisfying experience.', 14.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (5, 1, 2, 'Classic South Indian Dosa', 'images/main/6.jpeg', 'A golden, crispy dosa served with traditional sambar and coconut chutney. The thin and crunchy dosa pairs perfectly with the spicy lentil soup and creamy chutney, offering a taste of authentic South Indian cuisine.', 9.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (7, 1, 2, 'Lahmacun Turkish Pizza', 'images/main/Lahmacun.jpeg', 'Thin and crispy flatbread topped with a mixture of minced meat, vegetables, and spices, garnished with fresh parsley and onions. This Turkish pizza is a delightful snack or meal, full of fresh and savory flavors.', 12.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (8, 1, 2, 'Adana Iskender Kebab', 'images/main/Adana_Iskender.jpeg', 'A mouth-watering combination of spiced minced lamb served over a bed of pita bread, drizzled with tomato sauce and yogurt. A perfect balance of meaty, tangy, and creamy flavors.', 21.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (9, 1, 2, 'Lamb Cutlets Pirzola', 'images/main/Lamb_Cutlets_Pirzola.jpeg', 'Tender lamb cutlets grilled to perfection, served with rice, fresh salad, and a side of yogurt sauce. These lamb cutlets are juicy, flavorful, and make for a deliciously indulgent meal.', 23.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (10, 1, 2, 'Mixed Grill Platter', 'images/main/Mixed_Grill_Platter.jpeg', 'A generous assortment of grilled meats including lamb, chicken, and beef skewers. Served with a side of fluffy rice and fresh vegetables, this platter is perfect for sharing and indulging in a variety of flavors.', 29.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (13, 1, 1, 'Carrot and Yogurt Dip', 'images/entrees/Carrot_Dip.jpeg', 'A creamy and refreshing dip made from grated carrots blended with rich yogurt and garlic, seasoned with a hint of olive oil. Served with warm, soft breadsticks, this appetizer offers a delightful balance of sweet and tangy flavors, perfect for a light and flavorful start to your meal.', 6.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (14, 1, 1, 'Smoky Eggplant Dip', 'images/entrees/Eggplant_Dip.jpeg', 'A luscious and smoky eggplant dip mixed with creamy yogurt and topped with a drizzle of olive oil and a dash of paprika. This classic Mediterranean appetizer is served with freshly baked bread, perfect for dipping and savoring each bite.', 7.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (15, 1, 1, 'Crispy Kibbeh (İçli Köfte)', 'images/entrees/Icli_Kofte_Kibbeh.jpeg', 'Golden and crispy on the outside, these stuffed kibbeh are filled with a flavorful mixture of minced meat, spices, and pine nuts. Served with a side of creamy yogurt sauce and lemon wedges, this dish combines crunchy textures with rich, savory flavors, making it a must-try appetizer.', 9.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (16, 1, 3, 'Creamy Caramel Flan (Krem Karamel)', 'images/desserts/Krem_Karamel.jpeg', 'A smooth and creamy caramel flan with a golden layer of caramel sauce on top. This classic dessert melts in your mouth with each bite, offering a perfectly balanced sweetness and rich texture.', 5.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (17, 1, 3, 'Turkish Stretchy Ice Cream (Maraş Dondurması)', 'images/desserts/Maras_Dondurmasi.jpeg', 'A unique and elastic Turkish ice cream known for its chewy texture and rich creaminess. Topped with a sprinkle of crushed pistachios, this dessert offers a delightful experience of flavor and texture, unlike any other ice cream.', 6.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (18, 1, 3, 'World Famous Turkish Delight', 'images/desserts/World_Famous_Turkish_Delight.jpeg', 'A delightful, chewy confection made with rosewater and dusted with powdered sugar. These delicate cubes of Turkish Delight are an iconic sweet treat, perfect for satisfying your sweet tooth.', 4.99);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (19, 1, 4, 'Bacardi Superior Rum', 'images/drinks/Bacardi_Superior.jpeg', 'A premium white rum with a smooth and subtle flavor, perfect for mixing cocktails or enjoying straight. Bacardi Superior is known for its clean taste and light notes of vanilla and almond, making it an ideal choice for refreshing drinks like mojitos or daiquiris.', 8.00);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (20, 1, 4, 'Heineken Lager', 'images/drinks/Heineken.jpeg', 'A classic pale lager with a distinctively crisp and refreshing taste. Brewed from 100% natural ingredients, Heineken is known for its slightly bitter, smooth finish, making it one of the world\'s favorite beers. Perfect to pair with any meal or enjoy on its own.', 6.00);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (21, 1, 4, 'Willowglen Brut', 'images/drinks/Willowglen_Brut.jpeg', 'A light and sparkling wine with delicate bubbles and a fruity aroma. This brut offers a refreshing and zesty flavor with hints of apple and citrus, making it a delightful companion for celebrations or casual enjoyment.', 7.00);
INSERT INTO `menuitems` (`id`, `restaurant_id`, `category_id`, `name`, `picture_link`, `detail`, `price`) VALUES (23, 1, 2, 'Veggie Delight Pizza', 'images/main/pizza.jpg', 'A classic thin-crust pizza loaded with fresh vegetables. Topped with mozzarella cheese, bell peppers, mushrooms, onions, and tomato sauce, this pizza is the perfect combination of healthy and delicious. Ideal for a light, flavorful meal with a crispy base and savory toppings.', 12.99);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (1, '2024-03-29-003921', 'App\\Database\\Migrations\\CreateOrdersTable', 'default', 'App', 1728621293, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (2, '2024-03-29-004755', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1728621293, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (3, '2024-03-29-004926', 'App\\Database\\Migrations\\CreateMenuitemsTable', 'default', 'App', 1728621293, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (4, '2024-03-29-005113', 'App\\Database\\Migrations\\CreateRestaurantsTable', 'default', 'App', 1728621293, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (5, '2024-03-29-005217', 'App\\Database\\Migrations\\CreateCategoriesTable', 'default', 'App', 1728621293, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (6, '2024-03-29-005507', 'App\\Database\\Migrations\\CreateTablesTable', 'default', 'App', 1728621293, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (7, '2024-03-29-005705', 'App\\Database\\Migrations\\CreateRolesTable', 'default', 'App', 1728621293, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (8, '2024-03-29-010054', 'App\\Database\\Migrations\\CreateUserRoleTable', 'default', 'App', 1728621293, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (9, '2024-04-29-010153', 'App\\Database\\Migrations\\CreateOrderMenuitemTable', 'default', 'App', 1728621293, 1);
COMMIT;

-- ----------------------------
-- Table structure for order_menuitem
-- ----------------------------
DROP TABLE IF EXISTS `order_menuitem`;
CREATE TABLE `order_menuitem` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned NOT NULL,
  `menuitem_id` int unsigned NOT NULL,
  `number` int NOT NULL DEFAULT '1',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_menuitem_order_id_foreign` (`order_id`),
  KEY `order_menuitem_menuitem_id_foreign` (`menuitem_id`),
  CONSTRAINT `order_menuitem_menuitem_id_foreign` FOREIGN KEY (`menuitem_id`) REFERENCES `menuitems` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_menuitem_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of order_menuitem
-- ----------------------------
BEGIN;
INSERT INTO `order_menuitem` (`id`, `order_id`, `menuitem_id`, `number`, `note`) VALUES (1, 1, 1, 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_id` int NOT NULL,
  `user_id` int unsigned NOT NULL,
  `restaurant_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tips` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
BEGIN;
INSERT INTO `orders` (`id`, `table_id`, `user_id`, `restaurant_id`, `price`, `time`, `tips`, `status`) VALUES (1, 1, 1, 1, 13.99, '2024-10-11 22:10:46', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for restaurants
-- ----------------------------
DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of restaurants
-- ----------------------------
BEGIN;
INSERT INTO `restaurants` (`id`, `name`, `logo_link`, `address`, `profile`) VALUES (1, 'eatnow', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`) VALUES (1, 'admin');
INSERT INTO `roles` (`id`, `name`) VALUES (2, 'user');
COMMIT;

-- ----------------------------
-- Table structure for tables
-- ----------------------------
DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int unsigned NOT NULL,
  `qrcode_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tables_restaurant_id_foreign` (`restaurant_id`),
  CONSTRAINT `tables_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tables
-- ----------------------------
BEGIN;
INSERT INTO `tables` (`id`, `restaurant_id`, `qrcode_link`) VALUES (1, 1, 'images/qrcode/table1.PNG');
INSERT INTO `tables` (`id`, `restaurant_id`, `qrcode_link`) VALUES (2, 1, 'images/qrcode/table2.PNG');
INSERT INTO `tables` (`id`, `restaurant_id`, `qrcode_link`) VALUES (3, 1, 'images/qrcode/table3.PNG');
COMMIT;

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_role_user_id_foreign` (`user_id`),
  KEY `user_role_role_id_foreign` (`role_id`),
  CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of user_role
-- ----------------------------
BEGIN;
INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `create_time`) VALUES (1, 1, 1, '2024-10-11 20:46:35');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'signup',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `isAdmin`, `created_at`, `created_from`) VALUES (1, 'Marsk', '', 'Marsk', 'Ma', 'marsk327@gmail.com', NULL, 1, '2024-10-11 20:43:08', 'signup');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
