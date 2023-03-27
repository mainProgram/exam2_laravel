<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $passager = Role::create(['name' => 'passager']);
        $chauffeur = Role::create(['name' => 'chauffeur']);
        $business = Role::create(['name' => 'business']);
    }
}
