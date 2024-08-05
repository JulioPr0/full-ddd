# Software Clean Architecture

## Description

This application is a RESTful API built using the Laravel framework. By adopting the principles of Test Driven Development (TDD) and Domain-Driven Design (DDD), we aim to create a solution that is agnostic to the framework, database, or other technologies (Separation of Concern).

## Installation

1. **Clone Repository**

    ```bash
    git@github.com:JulioPr0/full-ddd.git
    ```

2. **Install Dependencies**

    ```bash
    cd project-folder
    composer install
    ```

3. **Configure Environment**

    Duplicate the `.env.example` file as `.env` and adjust the environment settings (such as database settings).
   ```bash
   cp .env.example .env
   ```

5. **Migration and Seeding (Optional)**

    ```bash
    php artisan migrate --seed
    ```

6. **Run Local Server**

    ```bash
    php artisan serve
    ```

## Directory Structure

```
├───app
│   ├───Application
│   │   └───usecase
│   │       └───products
│   │           └───core
│   ├───Common
│   │   ├───constant
│   │   └───exception
│   │       └───dictionary
│   ├───Domain
│   │   └───product
│   │       ├───entities
│   │       │   └───_test
│   │       └───_test
│   ├───Infrastructure
│   │   ├───database
│   │   └───repository
│   └───Interface
│       └───laravel
│           ├───Http
│           │   ├───Controllers
│           │   │   └───_test
│           │   └───Middleware
│           ├───Models
│           └───Providers

```

## Use Case (Business Logic)

Use cases often include business logic. When describing the steps in a use case, business logic determines how each step is executed by the system.

### Products

Inside the `Application/usecase/products` directory, you will find the implementation of use cases for product management. This allows you to perform CRUD operations on user entities.

## Testing

We provide tests covering various aspects of application functionality. These tests are located in the `_test` directories in each layer of the application, including use cases, entities, and controllers.

```bash
php artisan test
```

## General Steps
1. **Domain and Subdomain Identification**
   
   Create a ProductTest.php file in `app/Domain/product/entities/_test/`
   
   Determine the main business domain and relevant subdomains.
   
2. **Create a Domain Model**

   Create a Product.php file in `app/Domain/product/entities/`
   
   Create a domain model that includes entities, object values, and aggregates.
   
3. **Writing a Unit Test**

   Create the AddProductUseCaseTest.php file in `app/Application/usecase/products/core/_test/`

   Start by writing unit tests for entities and use cases.
   
4. **Code Implementation**

   Create the AddProductUseCase.php file in `app/Application/usecase/products/core/`
  
   Implement the code required to make the test pass.

5. **Refactor**
   
   Create a ProductRepository.php file in `app/Domain/product/`

   Refactor code to improve quality without changing functionality.

## Contribution

If you would like to contribute to the development of this application, please submit a pull request. We greatly appreciate contributions from various parties.

## License

This application is licensed under the [Lisensi MIT](LICENSE).
