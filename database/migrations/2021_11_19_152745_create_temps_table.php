<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps', function (Blueprint $table) {
            $table->id();
            $table->string('kolom1');
            $table->string('kolom2');
            $table->string('kolom3');
            $table->string('kolom4');
            $table->string('kolom5');
            $table->string('kolom6');
            $table->string('kolom7');
            $table->string('kolom8');
            $table->string('kolom9');
            $table->string('kolom10');
            $table->string('kolom11');
            $table->string('kolom12');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temps');
    }
}
