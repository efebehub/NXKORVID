<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->engine = 'InnoDB';
          $table->id();
          $table->string('uuid', 36);
          $table->string('name', 20);
          $table->string('surname', 20);
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->integer('role_id');
          $table->rememberToken();
          $table->timestamps();
        });

        $users = array(
            array("test@test.com", "Authentication", "Test", "8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92"));

        $time = now();
        foreach($users as $user) {
            DB::table('users')->insert(
                array(
                    'uuid' => Str::uuid(),
                    'name' => $user[1],
                    'surname' => $user[2],
                    'email' => $user[0],
                    'password' => $user[3],
                    'role_id' => 2,
                    'created_at' => $time,
                    'updated_at' => $time
                )
            );
        }

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
