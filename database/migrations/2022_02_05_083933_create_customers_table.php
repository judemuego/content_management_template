<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id');
            $table->string('customer_name');
            $table->string('address1_description');
            $table->string('address1_line1');
            $table->string('address1_line2');
            $table->string('address2_description');
            $table->string('address2_line1');
            $table->string('address2_line2');
            $table->string('address3_description');
            $table->string('address3_line1');
            $table->string('address3_line2');
            $table->string('contact_person');
            $table->string('position');
            $table->string('contact_no');
            $table->string('email_address');
            $table->string('tin_no');
            $table->string('company_business_style');
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
        Schema::dropIfExists('customers');
    }
}
