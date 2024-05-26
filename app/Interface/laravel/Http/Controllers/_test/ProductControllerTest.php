<?php

namespace App\Interface\laravel\Http\Controllers\_test;

use App\Common\constant\App;
use App\Common\constant\Str;
use App\Infrastructure\database\Postgres;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    protected \PDO $pdo;
    private function cleanTable(): void
    {
        $this->pdo = Postgres::get()->connect();
        $this->pdo->exec('TRUNCATE TABLE products');
    }

    private function insertDummy(): void
    {
        $this->pdo = Postgres::get()->connect();
        $query = "INSERT INTO products(id, name, price, description) VALUES ('1', 'product 1', 2000, 'description')";
        $this->pdo->exec($query);
    }

    public function testFindByIdSuccess()
    {
        $this->cleanTable();
        $this->insertDummy();

        $this->get('/api/product/1')
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'data' => [
                    'id' => '1',
                    'name' => 'product 1',
                    'price' => '2000',
                    'description' => 'description'
                ],
            ]);
    }

    public function testInsertProductFail()
    {
        $this->cleanTable();

        $this->post('/api/product', [
            'price' => 20.0,
            'description' => 'asd',
        ])->assertJson([
            'status' => 'fail',
            'message' => 'Data product yang anda kirim terdapat kesalahan. Mohon periksa kembali'
        ])->setStatusCode(400);
    }

    public function testInsertProductSuccess()
    {
        $this->cleanTable();

        $this->post('/api/product', [
            'name' => 'asd',
            'price' => 20.0,
            'description' => 'asd',
        ])->assertJson([
            'status' => 'success',
        ])->assertStatus(201);
    }

    public function testDeleteFail()
    {
        $this->delete('/api/product/xxx')
            ->assertStatus(404)
            ->assertJson([
                'status' => 'fail',
                'message' => __('exception.DELETE_PRODUCT_USE_CASE.PRODUCT_NOT_FOUND')
            ]);
    }

    public function testFindAll()
    {
        $this->cleanTable();
        $this->insertDummy();

        $this->get('/api/product')
            ->assertStatus(200)
            ->assertJson([
                Str::STATUS => App::RESPONSE_OK,
                Str::DATA => [
                    [
                        'id' => '1',
                        'name' => 'product 1',
                        'price' => 2000,
                        'description' => 'description',
                    ]
                ]
            ]);
    }

    public function testUpdateProductNotFound()
    {
        $this->cleanTable();
        $this->insertDummy();

        $this->put('/api/product/xx', [
            'name' => 'Julio',
            'price' => 5000.0,
            'description' => 'description 1'
        ])->assertStatus(404)->assertJson([
                Str::STATUS => App::RESPONSE_FAIL,
                Str::MESSAGE => __('exception.MODIFY_PRODUCT_USE_CASE.PRODUCT_NOT_FOUND')]);
    }

    public function testUpdateProductFail()
    {
        $this->cleanTable();
        $this->insertDummy();

        $this->put('/api/product/1', [
            'name' => 10,
            'price' => 5000.0,
            'description' => 'description 1'
            ])->assertStatus(400)->assertJson([
                Str::STATUS => App::RESPONSE_FAIL,
                Str::MESSAGE => __('exception.PRODUCT.NOT_CONTAIN_NEEDED_PROPERTY')
            ]);
    }

    public function testUpdateProductSuccess()
    {
        $this->cleanTable();
        $this->insertDummy();

        $this->put('/api/product/1', [
            'name' => 'Komeng',
            'price' => 5000.0,
            'description' => 'description 1'
        ])->assertStatus(200)->assertJson([
            Str::STATUS => App::RESPONSE_OK,
            Str::MESSAGE => __('response.update_success')]);
    }
}
