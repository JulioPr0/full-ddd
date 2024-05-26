<?php

namespace App\Application\usecase\products;

use App\Application\usecase\products\core\ProductUseCaseCoreImpl;
use App\Domain\product\ProductRepository;

class DeleteProductUseCase extends ProductUseCaseCoreImpl
{
    public function __construct(
        private readonly ProductRepository $productRepository
    ) {}

    public function execute(string $id)
    {
        $this->isAvailable($id);
        $this->productRepository->delete($id);
    }

    private function isAvailable(?string $id): void
    {
        $result = $this->productRepository->findById($id);
        if (!$result) throw new \Exception('DELETE_PRODUCT_USE_CASE.PRODUCT_NOT_FOUND');
    }
}
