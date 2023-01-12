<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->unsignedBigInteger('typology_id')->nullable()->after('price');
            $table->foreign('typology_id')
            ->references('id')
            ->on('typologies')
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
            // elimino la relazione partendo dalla tabella in cui si trova la colonna da eliminare
            $table->dropForeign('packages_typology_id_foreign');
        // elimino la colonna
        $table->dropColumn('typology_id');
        });
    }
}



