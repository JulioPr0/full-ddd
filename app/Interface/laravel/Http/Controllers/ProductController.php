<?php

namespace App\Interface\laravel\Http\Controllers;

use App\Application\usecase\products\AddProductUseCase;
use App\Application\usecase\products\DeleteProductUseCase;
use App\Application\usecase\products\FetchProductUseCase;
use App\Application\usecase\products\ModifyProductUseCase;
use App\Application\usecase\products\ShowProductUseCase;
use App\Common\constant\App;
use App\Common\constant\Str;
use App\Domain\product\entities\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function Psy\debug;

class ProductController extends Controller
{
    public function __construct(
        private readonly AddProductUseCase    $addProductUseCase,
        private readonly ShowProductUseCase   $showProductUseCase,
        private readonly DeleteProductUseCase $deleteProductUseCase,
        private readonly FetchProductUseCase  $fetchProductUseCase,
        private readonly ModifyProductUseCase $modifyProductUseCase
    ) {}

    public function save(Request $request): JsonResponse
    {
        $product = new Product(
          $request->name,
          $request->price,
          $request->description
        );

        $this->addProductUseCase->execute($product);
        return response()->json([
            Str::STATUS => App::RESPONSE_OK,
        ], 201);
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $result = $this->showProductUseCase->execute($id);
        return response()->json([
            Str::STATUS => App::RESPONSE_OK,
            Str::DATA => $result
        ]);
    }

    public function getAll(): JsonResponse
    {
        $result = $this->fetchProductUseCase->execute();
        return response()->json([
            Str::STATUS => App::RESPONSE_OK,
            Str::DATA => $result
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $product = new Product(
            $request->name,
            $request->price,
            $request->description
        );

        $this->modifyProductUseCase->execute($product, $id);
        return response()->json([
            Str::STATUS => App::RESPONSE_OK,
            Str::MESSAGE => __('response.update_success')
        ]);
    }

    public function delete(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->deleteProductUseCase->execute($id);
        return response()->json([
            Str::STATUS => App::RESPONSE_OK,
            Str::MESSAGE => __('response.delete_success')
        ]);
    }
}
