<?php

namespace Config\DI;

use App\Http\Requests\Products\CreateProductRequest;
use App\Services\ProductsService;
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
      'CreateProductRequest' => factory(function () {
        return new CreateProductRequest();
      }),
      'ProductsService' => factory(function () {
        return new ProductsService();
      }),
      'Blade' => factory(function () {
        return new Blade(__DIR__.'/../../resources/views', __DIR__.'/../../cache');
      }),
    ]);

    return self::$builder->build();
  }

  public static function getContainer(string $dependency)
  {
    return self::builderContainer()->get($dependency);
  }
}
