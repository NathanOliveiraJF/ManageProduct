<?php

namespace Config\DI;


use App\Src\Product\Http\Requests\CreateProductRequestImpl;
use App\Src\Product\Services\ProductsServiceImpl;
use DI\Container;
use DI\ContainerBuilder;
use Jenssegers\Blade\Blade;

use function DI\factory;

class Builder
{
  private static $builder;
  public static function builderContainer(): Container
  {
    self::$builder = new ContainerBuilder();
    self::$builder->addDefinitions([
      'CreateProductRequestImpl' => factory(function () {
        return new CreateProductRequestImpl();
      }),
      'ProductsServiceImpl' => factory(function () {
        return new ProductsServiceImpl();
      }),
      'Blade' => factory(function () {
        return new Blade(__DIR__ . '/../../resources/views', __DIR__ . '/../../cache');
      }),
    ]);

    return self::$builder->build();
  }

  public static function getContainer(string $dependency)
  {
    return self::builderContainer()->get($dependency);
  }
}
