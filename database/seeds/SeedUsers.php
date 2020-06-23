<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeedUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lvlID = DB::table('user_levels')->where('name','=','Super Administrator')->get();
        if ($lvlID->count()>0){
            $data = [
                'id' => Uuid::uuid4()->toString(),
                'level_id' => $lvlID->first()->id,
                'name' => 'adminradius',
                'email' => 'adminradius@panjunan-solusi.net',
                'password' => Hash::make('adminradius'),
                'fullname' => 'Super Administrator'
            ];
            DB::table('users')->insert($data);
        }
    }
}
