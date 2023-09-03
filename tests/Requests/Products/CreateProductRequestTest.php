<?php


namespace Tests\Requests\Products;

use App\Http\Requests\Products\CreateProductRequest;
use PHPUnit\Framework\TestCase;

class CreateProductRequestTest extends TestCase {
  protected $formRequest;

  protected function setUp(): void
  {
    parent::setUp();
    $this->formRequest = new CreateProductRequest();
  }

  /** @test */
  public function testShouldCreateAProductSuccessfully(): void
  {
    $payload = [
      "sku" => "12312312",
      "name" => "productTest",
      "price" => 100.0,
      "description" => "descriptionTest",
      "quantity" => 100
    ];

    $this->formRequest->validated($payload);
    $isvalid = $this->formRequest->isValid();

    $this->assertTrue($isvalid);
  }

  /** @test */
  public function testShouldFailValidationWhenCreatingProductWithoutSku(): void
  {
    $payload = [
      "sku" => "",
      "name" => "productTest",
      "price" => 100.0,
      "description" => "descriptionTest",
      "quantity" => 100
    ];
    $this->formRequest->validated($payload);
    $isNotvalid =$this->formRequest->isValid();
    $this->assertFalse($isNotvalid);
  }

  /** @test */
  public function testShouldFailValidationWhenCreatingProductWithoutName(): void
  {
    $payload = [
      "sku" => "231231212",
      "name" => "",
      "price" => 100.0,
      "description" => "descriptionTest",
      "quantity" => 100
    ];
    $this->formRequest->validated($payload);
    $isNotvalid =$this->formRequest->isValid();
    $this->assertFalse($isNotvalid);
  }

  /** @test */
  public function testShouldFailValidationWhenCreatingProductWithoutPrice(): void
  {
    $payload = [
      "sku" => "231231212",
      "name" => "productTest",
      "price" => 0,
      "description" => "descriptionTest",
      "quantity" => 100
    ];
    $this->formRequest->validated($payload);
    $isNotvalid =$this->formRequest->isValid();
    $this->assertFalse($isNotvalid);
  }

  /** @test */
  public function testShouldFailValidationWhenCreatingProductWithoutDescription(): void
  {
    $payload = [
      "sku" => "231231212",
      "name" => "productTest",
      "price" => 100,
      "description" => "",
      "quantity" => 100
    ];
    $this->formRequest->validated($payload);
    $isNotvalid =$this->formRequest->isValid();
    $this->assertFalse($isNotvalid);
  }

  /** @test */
  public function testShouldFailValidationWhenCreatingProductWithoutQuantity(): void
  {
    $payload = [
      "sku" => "231231212",
      "name" => "productTest",
      "price" => 100,
      "description" => "descriptionTest",
      "quantity" => 0  
    ];
    $this->formRequest->validated($payload);
    $isNotvalid =$this->formRequest->isValid();
    $this->assertFalse($isNotvalid);
  }
}

