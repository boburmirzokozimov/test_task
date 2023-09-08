<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class HotelFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const BEDROOMS = 'bedrooms';
    public const BATHROOMS = 'bathrooms';
    public const STOREYS = 'storeys';
    public const GARAGES = 'garages';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';

    public function name(Builder $builder, mixed $value): void
    {
        $builder->where('name', 'like', '%' . $value . '%');
    }

    public function bedrooms(Builder $builder, mixed $value): void
    {
        $builder->where('bedrooms', $value);
    }

    public function bathrooms(Builder $builder, mixed $value): void
    {
        $builder->where('bathrooms', $value);
    }

    public function storeys(Builder $builder, mixed $value): void
    {
        $builder->where('storeys', $value);
    }

    public function garages(Builder $builder, mixed $value): void
    {
        $builder->where('garages', $value);
    }

    public function price_from(Builder $builder, mixed $value): void
    {
        $builder->where('price', '>=', $value);
    }

    public function price_to(Builder $builder, mixed $value): void
    {
        $builder->where('price', '<=', $value);
    }

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::BEDROOMS => [$this, 'bedrooms'],
            self::BATHROOMS => [$this, 'bathrooms'],
            self::GARAGES => [$this, 'storeys'],
            self::STOREYS => [$this, 'garages'],
            self::PRICE_FROM => [$this, 'price_from'],
            self::PRICE_TO => [$this, 'price_to'],
        ];
    }
}
