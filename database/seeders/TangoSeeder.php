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

        // Itera su ogni elemento del JSON e salva i dati nel database
        foreach ($data as $element) {
            $icons = $element['initial_position_icon'];
            $symbols = $element['initial_position_symbol'];

            // Per ogni coppia di icon e symbol, inserisci una nuova riga nel database
            foreach ($icons as $index => $icon) {
                Tango::create([
                    'initial_position_icon' => $icon,
                    'initial_position_symbol' => $symbols[$index] ?? null, // Usa null se non c'è un valore corrispondente
                ]);
            }
        }
    }
}
