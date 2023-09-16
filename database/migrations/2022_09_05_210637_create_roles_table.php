<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('roles', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->id();
          $table->text('name', 20);
          $table->timestamps();
      });

      $time = now();
      DB::table('roles')->insert(
          array(
              'name' => 'ADMIN_ROLE',
              'created_at' => $time,
              'updated_at' => $time
          )
      );

      DB::table('roles')->insert(
          array(
              'name' => 'USER_ROLE',
              'created_at' => $time,
              'updated_at' => $time
          )
      );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
