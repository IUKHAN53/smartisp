<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            MikrotikSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            PoliceStationSeeder::class,
            BrandSeeder::class,
            ProductCategoriesSeeder::class,
            UnitSeeder::class,
            VendorSeeder::class,
            UpazilSeeder::class,
            ProductSeeder::class,
            CustomerTypeSeeder::class,
            ZoneSeeder::class,
            PackageSeeder::class,
        ]);
    }
}
