<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => 'Admin',
                'number' => '99999999999',
                'password' => '12345678',
            ]);

            $user->assignRole('admin');

            Auth::guard('web')->logout();

            DB::commit();
        }
        catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
