DROP TABLE IF EXISTS `product_attributes`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `attribute_name`;
DROP TABLE IF EXISTS `attribute_value`;
CREATE TABLE IF NOT EXISTS products (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `price` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS product_attributes (
    `id` INT NOT NULL AUTO_INCREMENT,
    `attribute_name` VARCHAR(255) NULL,
    `attribute_value` VARCHAR(255) NULL,
    `attribute_prop` VARCHAR(255) NULL,
    `products_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_product_attributes_products` FOREIGN KEY (`products_id`) REFERENCES products (`id`)
);
INSERT INTO products (
        name,
        sku,
        price,
        type
    )
values (
        'Avatar',
        '3281738291',
        '100',
        'dvd'
    ),
    (
        'Adventures of Huckleberry Finn',
        '1281738291',
        '100',
        'book'
    ),
    (
        'Char Of the Doom',
        '8281788297',
        '100',
        'furniture'
    );
INSERT INTO product_attributes (
        attribute_name,
        attribute_value,
        attribute_prop,
        products_id
    )
VALUES ('height', '288', 'CM', 1),
    ('width', '100', 'CM', 1),
    ('height', '104', 'CM', 1),
    ('length', '880', 'CM', 1),
    ('width', '410', 'CM', 1),
    ('width', '10', 'CM', 1),
    ('width', '108', 'CM', 1)
