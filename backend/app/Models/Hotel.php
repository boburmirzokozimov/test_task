<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Hotel
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $storeys
 * @property int $garages
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static Builder|Hotel newModelQuery()
 * @method static Builder|Hotel newQuery()
 * @method static Builder|Hotel query()
 * @method static Builder|Hotel whereBathrooms($value)
 * @method static Builder|Hotel whereBedrooms($value)
 * @method static Builder|Hotel whereCreatedAt($value)
 * @method static Builder|Hotel whereDeletedAt($value)
 * @method static Builder|Hotel whereGarages($value)
 * @method static Builder|Hotel whereId($value)
 * @method static Builder|Hotel whereName($value)
 * @method static Builder|Hotel wherePrice($value)
 * @method static Builder|Hotel whereStoreys($value)
 * @method static Builder|Hotel whereUpdatedAt($value)
 * @method static Builder|Hotel filter(\App\Http\Filters\FilterInterface $filter)
 * @mixin Eloquent
 */
class Hotel extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
    ];
}
