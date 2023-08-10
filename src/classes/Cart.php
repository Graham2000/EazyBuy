<?php
    class Cart extends User {
        private int $item_count;
        private float $total_price;

        function __construct(int $item_count, float $total_price) 
        {
            $this->item_count = $item_count;
            $this->total_price = $total_price;
        }

        public function insertCart() 
        {

        }

        public function getCart($cartId): string
        {

        }
    }
?>