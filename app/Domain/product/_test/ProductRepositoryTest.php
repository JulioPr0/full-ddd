<?php

namespace App\Domain\product\_test;

use App\Domain\product\ProductRepository;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    public function testMethodContain()
    {
        $productRepository = $this->createMock(ProductRepository::class);

        self::assertTrue(
            method_exists($productRepository, 'save'),
            'method not exists'
        );

        self::assertTrue(
            method_exists($productRepository, 'findById'),
            'method not exists'
        );

        self::assertTrue(
            method_exists($productRepository, 'findAll'),
            'method not exists'
        );

        self::assertTrue(
            method_exists($productRepository, 'delete'),
            'method not exists'
        );
    }
}
