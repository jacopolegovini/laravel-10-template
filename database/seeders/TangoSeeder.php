<?php

namespace Database\Seeders;

use App\Models\Tango;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class TangoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tango')->delete();
        $json = File::get('database/data/tango.json');
        $data = json_decode($json);
    }
}
