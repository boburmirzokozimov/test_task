<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Fluent;
use Illuminate\Support\LazyCollection;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LazyCollection::make(function () {
            $handle = fopen(base_path("database/seeders/data.csv"), 'r');

            while (($line = fgetcsv($handle, 4096)) !== false) {
                $dataString = implode(", ", $line);
                $row = explode(',', $dataString);
                yield $row;
            }

            fclose($handle);
        })
            ->skip(1)
            ->each(function (array $chunk) {
                $fluent = new Fluent($chunk);

                $records = [
                    "name" => $fluent[0],
                    "price" => $fluent[1],
                    "bedrooms" => $fluent[2],
                    "bathrooms" => $fluent[3],
                    "storeys" => $fluent[4],
                    "garages" => $fluent[5],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

                DB::table('hotels')->insert($records);
            });
    }
}
