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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('dpe')->nullable();
            $table->string('avis_imposition')->nullable();
            $table->string('photo_maison1')->nullable();
            $table->string('photo_maison2')->nullable();
            $table->string('photo_maison3')->nullable();
            $table->string('photo_maison4')->nullable();
            $table->string('photo_comble1')->nullable();
            $table->string('photo_comble2')->nullable();
            $table->string('photo_comble3')->nullable();
            $table->string('photo_comble4')->nullable();
            $table->string('photo_sous_sol1')->nullable();
            $table->string('photo_sous_sol2')->nullable();
            $table->string('photo_sous_sol3')->nullable();
            $table->string('photo_sous_sol4')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->nullable();
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
        Schema::dropIfExists('customers');
    }
};
