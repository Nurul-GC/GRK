<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        // Layout de mesas do Restaurante Kasper
        $tables = [
            // Mesas para duas pessoas (Casais / Individual)
            ['number' => 'Mesa 01', 'capacity' => 2, 'status' => 'available'],
            ['number' => 'Mesa 02', 'capacity' => 2, 'status' => 'available'],
            ['number' => 'Mesa 03', 'capacity' => 2, 'status' => 'available'],

            // Mesas padrão (Famílias pequenas / Amigos)
            ['number' => 'Mesa 04', 'capacity' => 4, 'status' => 'available'],
            ['number' => 'Mesa 05', 'capacity' => 4, 'status' => 'available'],
            ['number' => 'Mesa 06', 'capacity' => 4, 'status' => 'available'],
            ['number' => 'Mesa 07', 'capacity' => 6, 'status' => 'available'],

            // Área VIP / Grupos Grandes
            ['number' => 'VIP 01', 'capacity' => 8, 'status' => 'available'],
            ['number' => 'VIP 02', 'capacity' => 10, 'status' => 'available'],

            // Uma mesa temporariamente em manutenção para testes
            ['number' => 'Mesa 08', 'capacity' => 4, 'status' => 'maintenance'],
        ];

        foreach ($tables as $table) {
            Table::create($table);
        }
    }
}
