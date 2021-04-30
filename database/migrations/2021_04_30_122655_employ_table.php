<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employ', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('is_created')->default(0)->comment('0:no 1:yes');
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
        Schema::dropIfExists('employ');
    }
}
