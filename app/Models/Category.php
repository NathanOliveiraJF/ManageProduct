<?php

namespace App\Models;

use App\Repository\CategoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'categories')]
class Category
{
    #[Id]
    #[Column(type: Types::INTEGER), GeneratedValue]
    protected int $id;
    #[Column]
    protected string $name;
}