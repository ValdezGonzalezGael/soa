<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->getData() as $keyName => $name){
            DB::table('groups')->insert([
                'name'  => $name,
                'key_name'  => $keyName,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                
            ]);
        }
        
    }
    private function getData()
        {
            return[
                'administradores' => 'Administradores',
                'invitados' => 'Invitados',
                'registrados' => 'Registrados',
            ];
        }
}
