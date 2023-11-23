<?php


namespace App\Src\Product\Tests\Requests\Products;

use Config\DI\Builder;
use PHPUnit\Framework\TestCase;
use Respect\Validation\Exceptions\NestedValidationException;

class CreateProductRequestTest extends TestCase
{
  protected $request;

  protected function setUp(): void
  {
    parent::setUp();
    $this->request = Builder::getContainer("CreateProductRequest");
  }

  /** @test */
  public function testValidDataProduct(): void
  {
    $data = [
      "sku" => "12279567",
      "name" => "Bebida de Arroz",
      "price" => 100.0,
      "description" => "bebida de arroz",
      "quantity" => 10000
    ];

    $this->expectNotToPerformAssertions();
    $this->request->validated($data);
  }

  /** @test */
  public function testInvalidDataProduct(): void
  {
    $data = [
      "sku" => "",
      "name" => "",
      "description" => "",
      "price" => "",
      "quantity" => ""
    ];

    $this->expectException(NestedValidationException::class);
    $this->request->validated($data);
  }
}

