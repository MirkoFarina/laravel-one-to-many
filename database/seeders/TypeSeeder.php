<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_type = ['front-end', 'back-end','full stack'];

        foreach($data_type as $item) {
            $new_type = new Type();
            $new_type->name = $item;
            $new_type->slug = Str::slug($new_type->name);
            $new_type->save();
        }
    }
}
