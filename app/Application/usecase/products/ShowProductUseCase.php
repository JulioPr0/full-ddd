<?php

namespace App\Application\usecase\products;

use App\Application\usecase\products\core\ProductUseCaseCoreImpl;
use App\Domain\product\ProductRepository;

class ShowProductUseCase extends ProductUseCaseCoreImpl
{
    public function __construct(
        private readonly ProductRepository $productRepository
    ) {}

    public function execute(?string $id)
    {
        return $this->productRepository->findById($id);
    }
}
