<?php

use Illuminate\Database\Migrations\Migration;

//roles
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //there are 3 differents roles 
        $adminRole = Role::create(['name' => 'admin']);
        $basicRole = Role::create(['name' => 'basic']);
        $premiumRole = Role::create(['name' => 'premium']);
        
        //only admin users can load premium content
        $loadPremiumPermission = Permission::create(['name' => 'load premium content']);
        
        //only admin and premium user are able to watch premium content
        $watchPremiumPermission = Permission::create(['name' => 'watch premium content']);

        //admin permisions
        $adminRole->givePermissionTo($loadPremiumPermission);
        $adminRole->givePermissionTo($watchPremiumPermission);

        $premiumRole->givePermissionTo($watchPremiumPermission);

        $user->givePermissionTo('edit articles');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
};




