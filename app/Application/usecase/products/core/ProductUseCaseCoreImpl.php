<?php

namespace App\Application\usecase\products\core;

use App\Domain\product\entities\Product;

abstract class ProductUseCaseCoreImpl implements ProductUseCaseCore
{
    public function validate(Product $product): void
    {
        if (!$product->getName() || !$product->getPrice() || !$product->getDescription()) {
            throw new \Exception('PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY');
        }

        if (!is_string($product->getName())) {
            throw new \Exception('PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY');
        }

        if (empty($product->getName())) {
            throw new \Exception('PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY');
        }

        if (is_float($product->getPrice())) {
            throw new \Exception('PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY');
        }
    }
}
