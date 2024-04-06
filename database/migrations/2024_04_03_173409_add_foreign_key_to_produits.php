<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->unsignedInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')
                                                          ->onUpdate('cascade')
                                                          ->onDelete('cascade');

            Schema::enableForeignKeyConstraints(); //pour activer les contraintes des clé étrangeres 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();  //pour dsactiver les contraintes des clé étrangeres 
            $table->dropForeign(['categorie_id']);

        });
    }
};
