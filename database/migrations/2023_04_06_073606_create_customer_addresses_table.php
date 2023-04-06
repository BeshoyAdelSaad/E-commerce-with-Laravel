<?php

use App\Models\Country;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('zipcode');
            // $table->string('country_code');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->timestamps();
            // $table->foreign('country_code')->references('code')->on('countries');
            $table->foreignIdFor(Country::class,'country_code');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
