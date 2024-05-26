<?php

namespace App\Application\usecase\products;

use App\Application\usecase\products\core\ProductUseCaseCoreImpl;
use App\Domain\product\ProductRepository;

class FetchProductUseCase extends ProductUseCaseCoreImpl
{
    public function __construct(private readonly ProductRepository $productRepository) {}

    public function execute()
    {
        return $this->productRepository->findAll();
    }
}
