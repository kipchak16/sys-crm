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
        Schema::create('dutys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('comment')->nullable();
            $table->date('date');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->string('category');
            $table->string('value')->nullable();
            $table->integer('point')->nullable();

            $table->integer('created_by');
            $table->string('status');

            $table->timestamp("CREATED_AT")->useCurrent();
            $table->timestamp("UPDATED_AT")->useCurrent()->useCurrentOnUpdate();

            //$table->softDeletes();
            $table->timestamp("DELETED_AT")->nullable();

            $table->boolean('c')->default(false);
            $table->boolean('s')->default(false);
            $table->boolean('k')->default(false);
            $table->boolean('m')->default(false);
            $table->boolean('a')->default(false);

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_duty');
    }
};
