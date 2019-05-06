<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 60)->nullable(false);
            $table->string('endereco', 50)->nullable(false);
            $table->string('bairro', 50)->nullable(false);
            $table->string('cidade', 30)->nullable(false);
            $table->string('uf', 2)->nullable(false);
            $table->string('cep', 9)->nullable(false);
            $table->string('fone', 11)->nullable(false);
            $table->string('email', 50)->nullable(false);
            $table->string('ramal', 5);
            $table->integer('validade_convenio')->nullable(false);
            $table->date('ultimo_backup');
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
        Schema::dropIfExists('system_configurations');
    }
}
