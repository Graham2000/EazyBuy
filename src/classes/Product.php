<?php
    class Product extends Database 
    {
        private string $description;
        private string $manufacturer;
        private string $operatingSystem;
        private float $price;
        private string $ram;
        private string $storage;
        private string $technology;
        private int $categoryID;

        public function getProduct($productID): array
        {
            $sql = "SELECT product_id, product_name, manufacturer, 
                        operating_system, price, img_cover, 
                        img_primary, img_secondary, screen_size, 
                        screen_unit, memory_size, memory_type, 
                        storage_size, storage_type
                    FROM product
                    INNER JOIN image
                    ON product.img_id = image.img_id
                    INNER JOIN screen 
                    ON product.screen_id = screen.screen_id
                    INNER JOIN memory 
                    ON product.memory_id = memory.memory_id
                    INNER JOIN storage 
                    ON product.storage_id = storage.storage_id
                    WHERE product_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$productID]);
            $product = $stmt->fetchAll();

            return $product;
        }
        
        public function getPrice($productID): array
        {
            $sql = "SELECT price, product_name
                    FROM product
                    WHERE product_id = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$productID]);
            $price = $stmt->fetch();

            return $price;
        }

        // params: filters getAllProducts
        public function getAllProducts($categoryName): array
        {
            $sql = "SELECT product_id, product_name, manufacturer, 
                    cpu, price, operating_system, memory_size, 
                    memory_type, storage_size, storage_type, 
                    screen_size, screen_unit, img_primary, category_name
                    FROM product
                    INNER JOIN memory
                    ON product.memory_id = memory.memory_id
                    INNER JOIN storage
                    ON product.storage_id = storage.storage_id
                    INNER JOIN image
                    ON product.img_id = image.img_id
                    INNER JOIN screen
                    ON product.screen_id = screen.screen_id
                    INNER JOIN category
                    ON product.category_id = category.category_id
                    WHERE category_name = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$categoryName]);
            $products = $stmt->fetchAll();

            return $products;
        }


        public function getFilteredProducts($categoryName, $productName, $manufacturer, $maxPrice, $cpu, $screenSize, $screenUnit, $memorySize, $memoryType, $storageSize, $storageType, $technology, $os, $frontCamera, $rearCamera): array
        {
            $sql = "SELECT product_id, product_name, manufacturer, 
                    cpu, price, operating_system, memory_size, 
                    memory_type, storage_size, storage_type, 
                    screen_size, screen_unit, img_primary, category_name
                    FROM product
                    INNER JOIN memory
                    ON product.memory_id = memory.memory_id
                    INNER JOIN storage
                    ON product.storage_id = storage.storage_id
                    INNER JOIN image
                    ON product.img_id = image.img_id
                    INNER JOIN screen
                    ON product.screen_id = screen.screen_id
                    INNER JOIN category
                    ON product.category_id = category.category_id
                    WHERE category_name = ?
                    AND (product_name LIKE ? OR ? IS NULL)
                    AND (manufacturer LIKE ? OR ? IS NULL)
                    AND (price <= ? OR ? IS NULL)
                    AND (cpu = ? OR ? IS NULL)
                    AND (screen_size = ? OR ? IS NULL)
                    AND (screen_unit = ? OR ? IS NULL)
                    AND (memory_size = ? OR ? IS NULL)
                    AND (memory_type = ? OR ? IS NULL)
                    AND (storage_size = ? OR ? IS NULL)
                    AND (storage_type = ? OR ? IS NULL)
                    AND (technology = ? OR ? IS NULL)
                    AND (operating_system = ? OR ? IS NULL)
                    AND (front_camera = ? OR ? IS NULL)
                    AND (rear_camera = ? OR ? IS NULL)";

            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$categoryName, '%'.$productName.'%', $productName, $manufacturer, $manufacturer, $maxPrice, $maxPrice, $cpu, $cpu, $screenSize, $screenSize, $screenUnit, $screenUnit, $memorySize, $memorySize, $memoryType, $memoryType, $storageSize, $storageSize, $storageType, $storageType, $technology, $technology, $os, $os, $frontCamera, $frontCamera, $rearCamera, $rearCamera]);
            $products = $stmt->fetchAll();

            return $products;
        }

        public function getTopProducts($categoryName)
        {
            $sql = "SELECT DISTINCT product.product_id, product_name, category_name, img_primary, price, COUNT(*) AS 'product_count'
                    FROM order_product
                    INNER JOIN product 
                    ON order_product.product_id = product.product_id
                    INNER JOIN image 
                    ON product.img_id = image.img_id
                    INNER JOIN category 
                    ON product.category_id = category.category_id
                    WHERE category_name = ?
                    GROUP BY product_name
                    ORDER BY COUNT(*) DESC
                    LIMIT 10";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$categoryName]);
            $products = $stmt->fetchAll();

            return $products;
        }

        public function formatPrice($price) 
        {
            $price = explode(".", $price);
            
            return [$price[0], $price[1]];
        }
    }
?>