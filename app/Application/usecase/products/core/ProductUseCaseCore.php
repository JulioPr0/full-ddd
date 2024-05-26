<?php

namespace App\Application\usecase\products\core;

use App\Domain\product\entities\Product;

interface ProductUseCaseCore
{
    public function validate(Product $product);
}
