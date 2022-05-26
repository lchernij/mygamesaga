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
        Schema::create('game_plataforms', function (Blueprint $table) {
            $table->id();

            $table->string("name")->index();
            $table->string("company")->index()->nullable();
            $table->string("acronym")->index()->nullable();
            $table->boolean("is_active")->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_plataforms');
    }
};
