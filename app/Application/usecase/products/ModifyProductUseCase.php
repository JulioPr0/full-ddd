<?php

namespace App\Application\usecase\products;

use App\Application\usecase\products\core\ProductUseCaseCoreImpl;
use App\Domain\product\entities\Product;
use App\Domain\product\ProductRepository;

class ModifyProductUseCase extends ProductUseCaseCoreImpl
{

    public function __construct(private readonly ProductRepository $productRepository) {}
    public function execute(Product $product, string $id): void
    {
        parent::validate($product);
        $this->isAvailable($id);
        $this->isAffected($product, $id);
    }

    private function isAvailable(?string $id): void
    {
        $result = $this->productRepository->findById($id);
        if (!$result) throw new \Exception('MODIFY_PRODUCT_USE_CASE.PRODUCT_NOT_FOUND');
    }

    private function isAffected(Product $product, string $id): void
    {
        $affected = $this->productRepository->update($product, $id);
        if ($affected <= 0) throw new \Exception('MODIFY_PRODUCT_USE_CASE.PRODUCT_UPDATE_FAIL');
    }
}
