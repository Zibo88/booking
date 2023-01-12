<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserFkToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            
            $table->unsignedBigInteger('user_id')->nullable()->after('apartment_id');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            
            $table->dropForeign('packages_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
