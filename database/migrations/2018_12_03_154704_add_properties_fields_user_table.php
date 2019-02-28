<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPropertiesFieldsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('lastname')->after('name');
            $table->string('phone')->after('email');
            $table->unsignedInteger('user_type_id')->after('phone');
            $table->foreign('user_type_id')->references('id')->on('user_type');
        });

        $clientSeeder = new ClientUserTableSeeder();
        $clientSeeder->run();

        $driverSeeder = new DriverUserTableSeeder();
        $driverSeeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('phone');
            $table->dropForeign('users_type_id_foreign');
            $table->dropColumn('user_type_id');
        });

    }
}
