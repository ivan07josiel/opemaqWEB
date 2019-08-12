<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roda seeders dos usuarios
        $this->call(UsersTableSeeder::class);

        // Roda seeders das funcoes
        $this->call(FuncoesTableSeeder::class);

        // Roda seeders dos funcionarios
        $this->call(FuncionariosTableSeeder::class);

        // Roda seeders dos propriedades
        $this->call(PropriedadesTableSeeder::class);

        // Roda seeders dos tratores
        $this->call(TratoresTableSeeder::class);

        // Roda seeders dos conjuntos mecanizados
        $this->call(CMecanizadosTableSeeder::class);

        // Roda seeders das operaçãos 
        $this->call(OperacaoTableSeeder::class);
    }
}
