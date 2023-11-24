DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS products (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `price` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `attribute_name` VARCHAR(255) NULL,
    `attribute_value` VARCHAR(255) NULL,
    `attribute_prop` VARCHAR(255) NULL,
    PRIMARY KEY (`id`)
);
INSERT INTO products (
        name,
        sku,
        price,
        type,
        attribute_name,
        attribute_value,
        attribute_prop
    )
VALUES (
        'Avatar',
        '3281738291',
        '100',
        'dvd',
        'Size',
        '600',
        'MB'
    ),
    (
        'Adventures of Huckleberry Finn',
        '1281738291',
        '100',
        'book',
        'Weight',
        '800',
        'KG'
    ),
    (
        'Chair',
        '8281788297',
        '100',
        'furniture',
        'Dimensions',
        '10x50x20',
        NULL
    );
