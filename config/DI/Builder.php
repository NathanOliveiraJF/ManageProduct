<?php

namespace Config\DI;

use App\Http\Requests\Products\CreateProductRequest;
use App\Services\ProductsService;
use DI\Container;
use DI\ContainerBuilder;

use function DI\factory;

class Builder 
{
  private static $builder;
  public static function builderContainer(): Container
  {
    self::$builder = new ContainerBuilder();
    self::$builder->addDefinitions([
      'CreateProductRequest' => factory(function () {
        return new CreateProductRequest();
      }),
      'ProductsService' => factory(function () {
        return new ProductsService();
      })
    ]);

    return self::$builder->build();
  }

  public static function getContainer(string $dependency)
  {
    return self::builderContainer()->get($dependency);
  }
}
