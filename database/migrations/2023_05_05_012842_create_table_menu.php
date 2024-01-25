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
        Schema::create('2121110393_menu', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('link',255);
            $table->unsignedInteger('table_id');
            $table->string('type',255);
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->nulltable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('2121110393_menu');
    }
};
