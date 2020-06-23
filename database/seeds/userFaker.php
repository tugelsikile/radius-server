<?php
require_once base_path().'/vendor/autoload.php';
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class userFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lvlID  = DB::table('user_levels')->where('name','=','Administrator')->get();
        if ($lvlID->count()>0){
            $lvlID = $lvlID->first()->id;
            $faker  = Faker::create('id_ID');
            for($i = 1; $i <= random_int(10,20); $i++){
                $fullname = $faker->name;
                $username = $faker->userName;
                DB::table('users')->insert([
                    'id' => Uuid::uuid4()->toString(),
                    'level_id' => $lvlID,
                    'name' => $username,
                    'email' => $username.'@'.$faker->freeEmailDomain,
                    'password' => Hash::make($username),
                    'fullname' => $fullname,
                    'ktp' => $faker->creditCardNumber,
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address
                ]);
            }
            $faker  = Faker::create('en_US');
            for($i = 1; $i <= random_int(10,20); $i++){
                $fullname = $faker->name;
                $username = $faker->userName;
                DB::table('users')->insert([
                    'id' => Uuid::uuid4()->toString(),
                    'level_id' => $lvlID,
                    'name' => $username,
                    'email' => $username.'@'.$faker->freeEmailDomain,
                    'password' => Hash::make($username),
                    'fullname' => $fullname,
                    'ktp' => $faker->creditCardNumber,
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address
                ]);
            }
            $faker  = Faker::create('ms_MY');
            for($i = 1; $i <= random_int(10,20); $i++){
                $fullname = $faker->name;
                $username = $faker->userName;
                DB::table('users')->insert([
                    'id' => Uuid::uuid4()->toString(),
                    'level_id' => $lvlID,
                    'name' => $username,
                    'email' => $username.'@'.$faker->freeEmailDomain,
                    'password' => Hash::make($username),
                    'fullname' => $fullname,
                    'ktp' => $faker->creditCardNumber,
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address
                ]);
            }
            $faker  = Faker::create('ru_RU');
            for($i = 1; $i <= random_int(10,20); $i++){
                $fullname = $faker->name;
                $username = $faker->userName;
                DB::table('users')->insert([
                    'id' => Uuid::uuid4()->toString(),
                    'level_id' => $lvlID,
                    'name' => $username,
                    'email' => $username.'@'.$faker->freeEmailDomain,
                    'password' => Hash::make($username),
                    'fullname' => $fullname,
                    'ktp' => $faker->creditCardNumber,
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address
                ]);
            }
        }
    }
}
