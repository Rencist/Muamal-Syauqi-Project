<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Core\Domain\Models\User\UserId;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'id' => UserId::generate()->toString(),
            'user_type' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'usia' => 20,
            'address' => 'surabaya',
            'no_telp' => '085161397830',
            'password' => Hash::make("L24kai5Ma49iK1m")
        ]);
    }
}
