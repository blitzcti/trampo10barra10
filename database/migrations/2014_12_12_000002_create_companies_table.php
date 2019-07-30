<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('cpf_cnpj', 15)->nullable(false)->unique();
            $table->boolean('pj')->nullable(false)->default(true);

            $table->string('name', 100)->nullable(false);
            $table->string('fantasy_name', 100)->nullable(true)->default(null);
            $table->string('email', 100)->nullable(false);
            $table->string('phone', 11)->nullable(false);

            $table->string('representative_name', 50)->nullable(false);
            $table->string('representative_role', 50)->nullable(false);

            $table->boolean('active')->nullable(false)->default(true);

            $table->bigInteger('address_id')->nullable(false)->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');

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
        Schema::dropIfExists('companies');
    }
}
