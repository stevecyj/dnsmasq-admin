<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * roles_table
         */
        Schema::create('roles_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('slug', 50);
            $table->timestamps();
        });

        /**
         * permissions_table
         */
        Schema::create('permissions_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('slug', 50);
            $table->string('http_method')->nullable();
            $table->text('http_path')->nullable();
            $table->timestamps();
        });

        /**
         * menu_table
         */
        Schema::create('menu_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('order')->default(0);
            $table->string('title', 50);
            $table->string('icon', 50);
            $table->string('uri', 50)->nullable();
            $table->string('permission')->nullable();
            $table->timestamps();
        });

        /**
         * role_users_table
         */
        Schema::create('role_users_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('order')->default(0);
            $table->string('title', 50);
            $table->string('icon', 50);
            $table->string('uri', 50)->nullable();
            $table->string('permission')->nullable();
            $table->timestamps();
        });

        /**
         * role_permissions_table
         */
        Schema::create('role_permissions_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('order')->default(0);
            $table->string('title', 50);
            $table->string('icon', 50);
            $table->string('uri', 50)->nullable();
            $table->string('permission')->nullable();
            $table->timestamps();
        });

        /**
         * user_permissions_table
         */
        Schema::create('user_permissions_table', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->index(['user_id', 'permission_id']);
            $table->timestamps();
        });

        /**
         * role_menu_table
         */
        Schema::create('role_menu_table', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->index(['user_id', 'permission_id']);
            $table->timestamps();
        });

        /**
         * operation_log_table
         */
        Schema::create('operation_log_table', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->index(['user_id', 'permission_id']);
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
        Schema::dropIfExists('roles_table');
        Schema::dropIfExists('permissions_table');
        Schema::dropIfExists('menu_table');
        Schema::dropIfExists('role_users_table');
        Schema::dropIfExists('role_permissions_table');
        Schema::dropIfExists('user_permissions_table');
        Schema::dropIfExists('role_menu_table');
        Schema::dropIfExists('operation_log_table');
    }
}
