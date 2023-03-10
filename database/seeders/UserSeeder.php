<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users =[
            [
                'name' => 'Laely',
                'username' => 'Laely',
                'level' => 'masyarakat',
                'password' => bcrypt('masyarakat'),
                'passwordshow' => ('masyarakat'),
                'telepon' => '0812'

            ],
            [
                'name' => 'admin',
                'username' => 'admin',
                'level' => 'admin',
                'password' => bcrypt('admin'),
                'passwordshow' => ('admin'),
                'telepon' => '0812'

            ],
            [
                'name' => 'petugas',
                'username' => 'petugas',
                'level' => 'petugas',
                'password' => bcrypt('petugas'),
                'passwordshow' => ('petugas'),
                'telepon' => '0896'
            ],
            [
                'name' => 'masyarakat',
                'username' => 'masyarakat',
                'level' => 'masyarakat',
                'password' => bcrypt('masyarakat'),
                'passwordshow' => ('masyarakat'),
                'telepon' => '0856'
            ],

        ];
        foreach($users as $key => $value){
            user::create($value);
        }
    }
}
