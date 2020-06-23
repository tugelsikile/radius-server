<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedRoutes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'name' => 'mikrotik_api' ],
            [ 'name' => 'nas' ],
            [ 'name' => 'bandwidth' ],
            [ 'name' => 'group' ],
            [ 'name' => 'profile' ],
            [ 'name' => 'customer' ],
            [ 'name' => 'voucher' ],
            [ 'name' => 'session' ],
        ];
        foreach ($data as $item){
            $chk = DB::table('routes')->where('name','=',$item['name'])->get();
            if ($chk->count()===0){
                DB::table('routes')->insert($item);
            }
        }
    }
}
