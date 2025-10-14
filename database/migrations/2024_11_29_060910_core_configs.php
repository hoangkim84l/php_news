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
        Schema::create('core_configs', function (Blueprint $table) {
            $table->id();
            $table->text('site_name');
            $table->text('site_url');
            $table->text('site_key');
            $table->text('site_title');
            $table->text('site_description');
            $table->text('config');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
