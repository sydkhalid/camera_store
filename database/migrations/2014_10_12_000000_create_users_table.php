<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        $tb_users= array(
            array('id' => '1','name' => 'syed','email' => 'sydkhalid7@gmail.com','password' => '$2b$10$GjcjNJwxxu6V8ILccWDOBOvJvmR1yjzD8DuXhXQZtk8NftUw4k26C'),
            array('id' => '2','name' => 'test','email' => 'test@gmail.com','password' => '$2b$10$GjcjNJwxxu6V8ILccWDOBOvJvmR1yjzD8DuXhXQZtk8NftUw4k26C'),
        );
        DB::table('users')->insert($tb_users);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
