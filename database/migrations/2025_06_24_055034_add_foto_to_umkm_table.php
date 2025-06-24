<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/**
 * Class AddFotoToUmkmTable
 *
 * This migration adds a 'foto' column to the 'umkm' table.
 */
class AddFotoToUmkmTable extends Migration
{
public function up()
{
    Schema::table('umkm', function (Blueprint $table) {
        $table->string('foto', 255)->after('nama');
    });
}

public function down()
{
    Schema::table('umkm', function (Blueprint $table) {
        $table->dropColumn('foto');
    });
}
}