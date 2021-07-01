<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin', 'permissions' => [1, 2, 3, 4, 5, 6, 7]],
            ['name' => 'Instalador', 'permissions' => [6]],
            ['name' => 'Recepção', 'permissions' => [1, 3]],
            ['name' => 'Comercial', 'permissions' => [1, 3]],
            ['name' => 'Compras', 'permissions' => [4, 5]]
        ];

        $permissions = ['leads', 'projects', 'clients', 'offers', 'providers', 'vehicles', 'users'];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }

        foreach($roles as $r){
            $new_role = Role::create(['name' => $r['name']]);
            foreach($r['permissions'] as $p){
                $new_role->givePermissionTo($p);
            }
        }
        
        $admin = User::create([
            'name' => 'Tiago Matos',
            'email' => 'tiagovmatos@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('teste123'),
            'remember_token' => Str::random(10)
        ]);

        $admin->assignRole(1);

        for ($i = 1; $i <= 5; $i++) {
            $faker = Faker::create('pt_BR');

            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => bcrypt('teste123'),
                'remember_token' => Str::random(10)
            ]);

            $user->assignRole($i);
        }
    }
}
