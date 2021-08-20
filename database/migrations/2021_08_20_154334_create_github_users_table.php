<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGithubUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_users', function (Blueprint $table) {
            $table->id();
            $table->string('github_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('name')->nullable();
            $table->string('followers')->nullable();
            $table->string('stars')->nullable();
            $table->string('github_profile_url')->nullable();
            $table->string('repos_url')->nullable();
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
        Schema::dropIfExists('github_users');
    }
}
