<?php

namespace App\Domain\product;

use App\Domain\product\entities\Product;

interface ProductRepository
{
    function findById(string $id);
    function findAll();
    function save(Product $product);
    function delete(string $id);
    function update(Product $product, string $id);
}
