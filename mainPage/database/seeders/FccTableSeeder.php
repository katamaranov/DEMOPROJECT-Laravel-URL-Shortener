<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FccTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunks = config('constants.chunks');
        for ($i=0; $i < count($chunks); $i++) {
        DB::table('fullchunkchecker')->insert([
            'table' => $chunks[$i],
            'full' => false,
        ]);
    }
    }
}
