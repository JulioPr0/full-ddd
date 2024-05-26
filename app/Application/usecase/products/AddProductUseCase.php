<?php

namespace App\Application\usecase\products;

use App\Domain\product\entities\Product;
use App\Domain\product\ProductRepository;
use App\Application\usecase\products\core\ProductUseCaseCoreImpl;

class AddProductUseCase extends ProductUseCaseCoreImpl
{
    public function __construct(
        private readonly ProductRepository $productRepository
    ) {}

    public function execute(Product $product): void
    {
        parent::validate($product);
        $this->productRepository->save($product);
    }
}
