<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Operation;
use App\Models\Organization;

class OperationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $organizations = Organization::factory()->count(100)->create();

        for ($i = 0; $i < 10000; $i++) {
            Operation::factory()->create([
                'sum' => rand(10, 1000),
                'seller_id' => $organizations->random(),
                'buyer_id' => $organizations->random(),
            ]);
        }
    }
}
