<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('user_profiles', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->string('full_name', 150);
$table->string('email', 150)->nullable()->comment('Additional email');
$table->string('national_id', 20)->unique()->comment('NIK - National Identification Number');
$table->string('family_card_number', 20)->nullable()->comment('KK - Family Card Number');
$table->string('phone_number', 20)->nullable();
$table->string('birth_place', 100)->nullable();
$table->date('birth_date')->nullable();
$table->enum('gender', ['male', 'female', 'other'])->nullable();
$table->text('address')->nullable();
$table->string('nationality', 100)->nullable();
$table->string('province', 100)->nullable();
$table->string('city_district', 100)->nullable();
$table->string('sub_district', 100)->nullable();
$table->string('village', 100)->nullable();
$table->string('rw', 5)->nullable()->comment('Community group');
$table->string('rt', 5)->nullable()->comment('Neighborhood group');
$table->string('postal_code', 10)->nullable();
$table->string('father_name', 150)->nullable();
$table->string('mother_name', 150)->nullable();
$table->integer('siblings_count')->nullable();
$table->integer('child_number')->nullable();
$table->text('bio')->nullable()->comment('Short description about user');
$table->timestamps();
});
}


public function down(): void
{
Schema::dropIfExists('user_profiles');
}
};