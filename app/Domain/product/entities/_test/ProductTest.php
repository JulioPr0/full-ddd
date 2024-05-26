<?php

namespace App\Domain\product\entities\_test;

use App\Domain\product\entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCreateNotComplete()
    {

        self::expectException(\Exception::class);

        $product = new Product(
            null,
            2000.0,
            'example product'
        );

        var_dump($product);
    }

    public function testCreateComplete()
    {

        $product = new Product(
            'product 1',
            2000.0,
            'example product'
        );

        $this->assertEquals('product 1', $product->getName());
        $this->assertEquals(2000, $product->getPrice());
        $this->assertEquals('example product', $product->getDescription());
    }
}
