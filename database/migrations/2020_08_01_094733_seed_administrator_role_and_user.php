<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedAdministratorRoleAndUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user_id = DB::table('users')->insertGetId([
            "username" => "administrator",
            "email" => "admin@savannabits.com",
            "name" => "System Admin",
            "first_name" => "System",
            "last_name" => "Admin",
            "password" => bcrypt(env('ADMIN_PASS','password')),
            "created_at" => now(),
            "updated_at" => now()
        ]);
        //ROLE
        $role_id = DB::table(config('permission.table_names.roles','roles'))->insertGetId([
            "display_name" => "Administrator",
            "slug" => str_slug("Administrator"),
            "guard_name" => "web",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        // Attach role to user
        DB::table(config('permission.table_names.model_has_roles'))->insert([
            "role_id" => $role_id,
            config('permission.column_names.model_morph_key') => $user_id,
            "model_type" => \App\User::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
