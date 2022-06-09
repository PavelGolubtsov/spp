<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriorityTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority_task', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('task_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table
                ->foreignId('priority_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
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
        Schema::dropIfExists('priority_task');
    }
}
