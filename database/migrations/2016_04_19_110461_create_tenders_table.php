<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id');
            $table->integer('tender_id');
            $table->string('tender_number', 127);
            $table->string('name_of_the_work', 255);
            $table->integer('tender_type_id');
            $table->decimal('cost_of_work', 5, 2)->comment('in Rupees');
            $table->decimal('ernest_money_deposit', 5, 2)->comment('in Rupees');
            $table->decimal('cost_of_tender', 5, 2)->comment('in Rupees');
            $table->integer('completion_period');
            $table->integer('validity_of_offer');
            $table->dateTime('issue_from');
            $table->dateTime('issue_to');
            $table->dateTime('receipt_of_offer');
            $table->dateTime('tender_opening_date');
            $table->string('nit', 255);
            $table->string('tender', 255);
            $table->string('corrigendum', 255)->nullable();
            $table->integer('added_by');
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('tenders');
    }
}
