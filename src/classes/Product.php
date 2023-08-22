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

        /*
        function __construct(string $description, string $manufacturer, string $operatingSystem, 
                             float $price, string $ram, string $storage, string $technology, 
                             string $categoryID) 
        {
            $this->description = $description;
            $this->manufacturer = $manufacturer;
            $this->operatingsystem = $operatingSystem;
            $this->price = $price;
            $this->ram = $ram;
            $this->storage = $storage;
            $this->technology = $technology;
            $this->categoryID = $categoryID;
        }*/

        public function insertProduct() 
        {

        }

        public function getProduct($productID): array
        {
            $sql = "SELECT product_id, product_name, price, img_cover, img_primary, img_secondary
            FROM product
            INNER JOIN image
            ON product.img_id = image.img_id
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

        public function getFilteredProducts($categoryName, $productName, $manufacturer, $maxPrice, $cpu, $screenSize, $screenUnit, $memorySize, $memoryType, $storageSize, $storageType): array
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
                    AND (storage_type = ? OR ? IS NULL)";

            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$categoryName, '%'.$productName.'%', $productName, $manufacturer, $manufacturer, $maxPrice, $maxPrice, $cpu, $cpu, $screenSize, $screenSize, $screenUnit, $screenUnit, $memorySize, $memorySize, $memoryType, $memoryType, $storageSize, $storageSize, $storageType, $storageType]);
            $products = $stmt->fetchAll();

            return $products;
        }
    }
?>