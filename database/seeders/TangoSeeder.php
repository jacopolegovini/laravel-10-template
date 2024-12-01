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
        // Cancella i dati esistenti nella tabella
        DB::table('tango')->truncate();

        // Leggi il file JSON
        $json = File::get(database_path('data/tango.json'));
        $data = json_decode($json, true); // Decodifica come array associativo

        // Itera su ogni elemento del JSON
        foreach ($data as $element) {
            $icons = $element['initial_position_icon'];
            $symbols = $element['initial_position_symbol'];
            $finalIcons = $element['final_position_icon'];

            // Verifica che tutti gli array abbiano la stessa lunghezza
            $maxLength = max(count($icons), count($symbols), count($finalIcons));

            for ($index = 0; $index < $maxLength; $index++) {
                Tango::create([
                    'initial_position_icon' => $icons[$index] ?? null,       // Usa null se il valore non esiste
                    'initial_position_symbol' => $symbols[$index] ?? null, // Usa null se il valore non esiste
                    'final_position_icon' => $finalIcons[$index] ?? null,  // Usa null se il valore non esiste
                ]);
            }
        }
    }
}
