<?php

namespace App\Domain\product\entities;

use Exception;

class Product
{
    /**
     * @throws Exception
     */

    private string $name;
    private int $price;
    private string $description;

    /**
     * @throws Exception
     */
    public function __construct($name, $price, $description) {
        $this->validation($name, $price, $description);
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    /**
     * @throws Exception
     */
    private function validation(
        $name,
        $price,
        $description): void
    {
        if ($name == null || $name == '') {
            throw new Exception('PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY');
        }

        if (!is_string($name)) {
            throw new Exception('PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY');
        }

        if ($price == null) {
            throw new Exception('PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY');
        }

        if (!is_float($price)) {
            throw new Exception('PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY');
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
