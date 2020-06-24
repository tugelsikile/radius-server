<?php
require_once base_path().'/vendor/autoload.php';
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;

class routersFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker  = Faker::create('en_US');
        $users = DB::table('users')->select(['id','name'])->get();
        if ($users->count()>0){
            foreach ($users as $key => $user){
                $chk = DB::table('routers')->where('user_id','=',$user->id)->get();
                if ($chk->count()===0){
                    $ip = $faker->ipv4;
                    DB::table('routers')->insert([
                        'id' => Uuid::uuid4()->toString(),
                        'user_id' => $user->id,
                        'name' => $ip . '@' . $user->name,
                        'address' => $ip,
                        'api_username' => $user->name,
                        'api_password' => $user->name,
                        'secret' => $user->name,
                        'created_by' => json_encode(['name'=>'seeder'])
                    ]);
                }
            }
        }
    }
}
