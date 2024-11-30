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
        // Elimina tutti i dati esistenti nella tabella
        DB::table('tango')->delete();

        // Legge il contenuto del file JSON
        $json = File::get('database/data/tango.json');
        $data = json_decode($json);

        // Itera su ciascun oggetto nel JSON
        foreach ($data as $element) {
            $icons = $element->initial_position_icon; // Array lineare
            $symbols = $element->initial_position_symbol; // Matrice

            // Assicurati che il numero di simboli sia coerente con gli icone
            $flatSymbols = [];
            foreach ($symbols as $symbolRow) {
                foreach ($symbolRow as $symbol) {
                    $flatSymbols[] = $symbol; // Appiattisci la matrice dei simboli
                }
            }

            // Itera attraverso gli icone e associa i simboli corrispondenti
            foreach ($icons as $index => $iconValue) {
                Tango::create([
                    'initial_position_icon' => $iconValue,
                    'initial_position_symbol' => $flatSymbols[$index] ?? null, // Usa `null` se non c'è un simbolo corrispondente
                ]);
            }
        }
    }
}
