<?php

namespace Database\Seeders;

use App\Models\user_meta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class metaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user_meta::create([
            'id' => '1',
            'user_id' => '1',
            'dob' => '1/15/2010',
            'street_address' => "Its portfolio of services includes dredging and land reclamation",
            'city' => 'Faisalabad',
            'zip_code' => 3800,
            'state' => 'Punjab',
            'country' => 'Pakistan',
            'contact_no' => '031688464'

        ]);
    }
}
