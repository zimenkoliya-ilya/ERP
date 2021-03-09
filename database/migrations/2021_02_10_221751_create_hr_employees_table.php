<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('hr_employees', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('registration_num')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('state_id')->unique();
            $table->foreign('state_id')->references('id')->on('hr_states');
            $table->unsignedBigInteger('district_id')->unique();
            $table->foreign('district_id')->references('id')->on('hr_districts');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('sex_id')->nullable();
            $table->foreign('sex_id')->references('id')->on('hr_sexes');
            $table->unsignedBigInteger('birth_place')->nullable();
            $table->foreign('birth_place')->references('id')->on('hr_states');
            $table->string('insurance_book_num')->nullable();
            $table->string('military_service')->nullable();
            $table->string('drivers_license')->nullable();
            $table->unsignedBigInteger('blood_type_id')->nullable();
            $table->foreign('blood_type_id')->references('id')->on('hr_blood_types');
            $table->string('pro_driver_license_num')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('cloth_size')->nullable();
            $table->string('shoe_size')->nullable();
            $table->unsignedBigInteger('bank_account_id')->nullable();
            $table->foreign('bank_account_id')->references('id')->on('hr_banks');
            $table->string('additional_info')->nullable();
            $table->string('expected_salary')->nullable();
            $table->unsignedBigInteger('interested_positioin_id')->nullable();
            $table->foreign('interested_positioin_id')->references('id')->on('hr_positions');
            $table->string('availability_date')->nullable();
            $table->string('proposed_salary')->nullable();
            $table->unsignedBigInteger('source_id')->nullable();
            $table->foreign('source_id')->references('id')->on('hr_sources');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('hr_statuses');
            $table->string('first_start_date')->nullable();
            $table->string('time_off')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('zg_users');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('zg_companies');
            $table->string('barcode')->nullable();
            $table->string('created')->nullable();
            $table->string('modified')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('hr_employees');
    }
}
