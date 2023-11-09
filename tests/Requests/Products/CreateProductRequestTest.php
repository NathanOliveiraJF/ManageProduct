<?php


namespace Tests\Requests\Products;

use Config\DI\Builder;
use PHPUnit\Framework\TestCase;

class CreateProductRequestTest extends TestCase {
  protected $createProductRequest;

  protected function setUp(): void
  {
    parent::setUp();
    $this->createProductRequest = Builder::getContainer("CreateProductRequest");
  }

  /** @test */
  public function testValidProduct(): void
  {
    $payload = [
      "sku" => "12279567",
      "name" => "Bebida de Arroz",
      "price" => 100.0,
      "description" => "bebida de arroz",
      "quantity" => 10000 
    ];

    $this->createProductRequest->validated($payload);
    $isvalid = $this->createProductRequest->isValid();
    $this->assertTrue($isvalid);
  }

  /** @test */
  public function testInvalidProduct(): void
  {
    $payload = [
      "sku" => "",
      "name" => "",
      "price" => "",
      "description" => "",
      "quantity" => ""
    ];

    $this->createProductRequest->validated($payload);
    $isNotValid = $this->createProductRequest->isValid();
    $this->assertTrue($isNotValid);
  }
}

