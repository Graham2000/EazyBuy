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

        public function getProduct($productId): string
        {

        }

        // params: filters
        public function getProducts($categoryName): array
        {
            $sql = "SELECT product_id, description, manufacturer, operating_system, price, ram, storage, technology 
                    FROM product 
                    INNER JOIN category
                    ON product.product_id = category.category_id
                    WHERE category_name = ?";
            $stmt = $this->openConn()->prepare($sql);
            $stmt->execute([$categoryName]);
            $products = $stmt->fetchAll();
            return $products;
        }
    }
?>