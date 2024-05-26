<?php

namespace App\Infrastructure\repository;

use App\Domain\product\ProductRepository;
use App\Domain\product\entities\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ProductRepositoryPostgres implements ProductRepository
{
    function findById(string $id)
    {
        return DB::table('products')
            ->where('id', $id)->get()->first();
    }

    function findAll(): Collection
    {
        return DB::table('products')->get();
    }

    function save(Product $product): bool
    {
        return DB::table('products')->insert([
            'id' => Str::uuid(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'description' => $product->getDescription(),
        ]);
    }

    function delete(string $id): int
    {
        return DB::table('products')->delete($id);
    }

    function update(Product $product, string $id): int
    {
        return DB::table('products')
            ->where('id', $id)
            ->update([
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription()
            ]);
    }
}
