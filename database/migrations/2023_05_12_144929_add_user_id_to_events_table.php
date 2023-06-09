<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // acho que isso ta errado (foi o que foi ensinado no curso)
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // acho que o correto é isso: deleta campo user_id
            $table->dropColumn('user_id');
        });
    }
};
