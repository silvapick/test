<?php

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = [
                ['nombre' => 'Alimentación'],
                ['nombre' => 'Accesorios'],
                ['nombre' => 'Bisutería'],
                ['nombre' => 'Moda'],
                ['nombre' => 'Medicina'],
                ['nombre' => 'Textiles'],
                ['nombre' => 'Otros']
        ];

        foreach($categoria as $row){
            Categoria::create([
                'nombre' => $row['nombre']
            ]);
        }
    }
}
