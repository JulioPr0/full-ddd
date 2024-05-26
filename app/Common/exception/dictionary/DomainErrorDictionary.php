<?php

namespace App\Common\exception\dictionary;

use App\Common\exception\InvariantErrorException;
use App\Common\exception\NotFoundErrorException;

class DomainErrorDictionary
{
    public static function translate($error): \Exception
    {
        $directories = [
            'PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY'
            => new InvariantErrorException(__('exception.PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY')),
            'PRODUCT.LIMIT_CHAR'
            => new InvariantErrorException(__('exception.PRODUCT.LIMIT_CHAR')),
            'DELETE_PRODUCT_USE_CASE.PRODUCT_NOT_FOUND'
            => new NotFoundErrorException(__('exception.DELETE_PRODUCT_USE_CASE.PRODUCT_NOT_FOUND')),
            'MODIFY_PRODUCT_USE_CASE.PRODUCT_NOT_FOUND'
            => new NotFoundErrorException(__('exception.MODIFY_PRODUCT_USE_CASE.PRODUCT_NOT_FOUND')),
            'MODIFY_PRODUCT_USE_CASE.PRODUCT_UPDATE_FAIL'
            => new InvariantErrorException(__('exception.MODIFY_PRODUCT_USE_CASE.PRODUCT_UPDATE_FAIL'))
        ];

        return $directories[$error->getMessage()] ?? $error;
    }
}
