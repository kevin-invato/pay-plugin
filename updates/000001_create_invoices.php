<?php namespace Responsiv\Pay\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('responsiv_pay_invoices', function($table) {
            $table->increments('id');
            $table->string('hash')->nullable()->index();
            $table->string('user_ip')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('street_addr')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('vat_id')->nullable(); // @todo rename to tax_id_number
            $table->decimal('total', 15, 2)->default(0);
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('discount', 15, 2)->default(0);
            $table->decimal('tax', 15, 2)->default(0);
            $table->decimal('tax_discount', 15, 2)->default(0);
            $table->boolean('is_tax_exempt')->default(false);
            $table->string('currency', 10)->nullable(); // @todo rename currency_code
            $table->text('tax_data')->nullable();
            $table->string('return_page')->nullable();
            $table->boolean('is_throwaway')->default(false);
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('template_id')->unsigned()->nullable()->index();
            $table->integer('payment_method_id')->unsigned()->nullable()->index();
            $table->string('related_id')->index()->nullable();
            $table->string('related_type')->index()->nullable();
            $table->integer('state_id')->unsigned()->nullable()->index();
            $table->integer('country_id')->unsigned()->nullable()->index();
            $table->integer('status_id')->unsigned()->nullable()->index();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->timestamp('status_updated_at')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('responsiv_pay_invoices');
    }
};
