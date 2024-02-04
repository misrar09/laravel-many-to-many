<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [

                'name' => 'Israr M.',
                'country' => 'Pakistan',
            ],
            [
                'name' => 'William Kotler',
                'country' => 'UK',
            ],
            [
                'name' => 'Elon Musk',
                'country' => 'USA',
            ],
            [
                'name' => 'Francesco Ferrante',
                'country' => 'Italy',
            ],
            [
                'name' => 'Lee Thomas',
                'country' => 'Germany',
            ],

        ];

        foreach ($authors as $author) {
            $newType = new Author();
            $newType->fill($author);
            $newType->save();
        }
    }
}
