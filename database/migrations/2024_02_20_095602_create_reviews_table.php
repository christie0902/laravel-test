<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            //create perfect type for the id column: big int, primary key, autoincrement
            $table->id();
            $table->foreignId('movie_id');
            //foreignID = unsignedBigInteger || make sure same type with id
            $table->text('text');
            //create 2 columns created_at and updated_at - DATETIME
            $table->timestamps();
        });
    }



    //  * Reverse the migrations.
    //  */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
