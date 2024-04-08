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
        Schema::create('file_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip');
            $table->string('shared_id', 100)->unique();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('storage_provider_id')->unsigned();
            $table->text('name');
            $table->string('mime', 100);
            $table->bigInteger('size')->default(0);
            $table->string('extension', 10);
            $table->string('filename');
            $table->text('path');
            $table->text('link');
            $table->boolean('access_status')->default(true)->commnt('0:private 1:public');
            $table->string('password')->nullable();
            $table->bigInteger('downloads')->default(0);
            $table->bigInteger('views')->default(0);
            $table->boolean('admin_has_viewed')->default(false);
            $table->timestamp('expiry_at')->nullable();
            $table->foreign("user_id")->references("id")->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("storage_provider_id")->references("id")->on('storage_providers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('file_entries');
    }
};
