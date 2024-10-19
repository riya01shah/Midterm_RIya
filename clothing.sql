CREATE DATABASE ecommerce;
USE ecommerce;
CREATE TABLE clothing (
    ClothingID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ClothingName VARCHAR(255) NOT NULL,
    ClothingDescription TEXT NOT NULL,
    Size VARCHAR(50) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Color VARCHAR(50) NOT NULL,
    Brand VARCHAR(255) NOT NULL, 
    Material VARCHAR(255) NOT NULL;
);

INSERT INTO clothing (ClothingName, ClothingDescription, Size, Price, Color, Brand, Material) VALUES
('Cotton Casual Shirt', 'A comfortable cotton shirt for casual wear.', 'M', 24.99, 'Blue', 'CasualWear', 'Cotton'),
('Denim Jeans', 'Durable denim jeans with a modern slim fit.', '32', 39.99, 'Dark Blue', 'DenimBrand', 'Denim'),
('Formal Blazer', 'A sleek formal blazer for business meetings.', 'L', 89.99, 'Black', 'ExecutiveStyle', 'Wool Blend'),
('Summer Dress', 'A light and airy dress perfect for summer days.', 'S', 29.99, 'Yellow', 'FashionHouse', 'Polyester'),
('Leather Jacket', 'Premium leather jacket with zipper pockets.', 'M', 129.99, 'Brown', 'LeatherLux', 'Leather'),
('Sports Shorts', 'Breathable shorts suitable for workouts.', 'L', 19.99, 'Black', 'AthleticPro', 'Polyester'),
('Flannel Shirt', 'Warm flannel shirt with plaid design.', 'XL', 34.99, 'Red', 'CountryStyle', 'Flannel'),
('Graphic T-shirt', 'Trendy T-shirt with a unique graphic print.', 'M', 19.99, 'White', 'UrbanEdge', 'Cotton'),
('Cargo Pants', 'Stylish cargo pants with multiple pockets.', '34', 44.99, 'Olive', 'AdventureGear', 'Cotton'),
('Wool Sweater', 'Cozy wool sweater for chilly weather.', 'L', 54.99, 'Grey', 'WinterWear', 'Wool');

