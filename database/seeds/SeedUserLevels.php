<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class SeedUserLevels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_operator    = Uuid::uuid4()->toString();
        $id_manager     = Uuid::uuid4()->toString();
        $id_admin       = Uuid::uuid4()->toString();
        $data = [
            [
                'id' => $id_operator,
                'name' => 'Operator',
                'hide_from' => null,
                'description' => 'Operator Radius',
                'created_by' => json_encode(['name'=>'seeder'])
            ],
            [
                'id' => $id_manager,
                'name' => 'Manager',
                'hide_from' => null,
                'description' => 'Manager Radius',
                'created_by' => json_encode(['name'=>'seeder'])
            ],
            [
                'id' => $id_admin,
                'name' => 'Administrator',
                'hide_from' => null,
                'description' => 'Administrator Radius',
                'created_by' => json_encode(['name'=>'seeder'])
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'name' => 'Super Administrator',
                'hide_from' => json_encode([$id_admin,$id_manager,$id_operator]),
                'description' => 'Super admin website',
                'created_by' => json_encode(['name'=>'seeder'])
            ]
        ];
        foreach ($data as $item){
            $chk = DB::table('user_levels')->where('name','=',$item['name'])->get();
            if ($chk->count()===0){
                DB::table('user_levels')->insert($item);
            }
        }
    }
}
