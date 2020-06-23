<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class SeedUserPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = DB::table('routes')->get();
        $levels = DB::table('user_levels')->get();
        if ($routes->count()>0 && $levels->count()>0){
            foreach ($levels as $key => $level){
                foreach ($routes as $keyR => $route){
                    $chk = DB::table('user_permissions')->where(['route'=>$route->name,'level_id'=>$level->id])->get();
                    if ($chk->count()===0){
                        DB::table('user_permissions')->insert([
                            'id' => Uuid::uuid4()->toString(),
                            'level_id' => $level->id,
                            'route' => $route->name,
                            'R_opt' => $level->name == 'Super Administrator' ? 1 : 0,
                            'C_opt' => $level->name == 'Super Administrator' ? 1 : 0,
                            'U_opt' => $level->name == 'Super Administrator' ? 1 : 0,
                            'D_opt' => $level->name == 'Super Administrator' ? 1 : 0
                        ]);
                    }
                }
            }
        }
    }
}
