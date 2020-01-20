<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateStockInsTable extends Migration
{
    protected $table_name_1 = "stock_ins";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name_1, function (Blueprint $table) {
            /*
            $table->bigIncrements('id');
            $table->timestamps();
            */
            
            //$table->unsignedBigInteger('id')->nullable()->default(0)->unique()->comment('comment');
            //$table->uuid('id')->nullable()->default(0)->unique()->comment('universal unique identifier');
            //$table->dateTime('date_time')->nullable()->default('CURRENT_TIMESTAMP')->change();
            
            $table->bigIncrements('id')->comment('comment');
            $table->timestamps();
            //$table->unsignedBigInteger('pk')->nullable()->default(0)->comment('comment');
            $table->boolean('is_visible')->index()->nullable()->default(false)->comment('comment');
            $table->boolean('is_active')->index()->nullable()->default(false)->comment('comment');
            //$table->string('code')->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('status_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('item_id')->unsigned()->index()->nullable()->comment('comment');
            //$table->double('unit_price')->index()->nullable()->default(0)->comment('comment');
            //$table->double('unit_price_buy')->index()->nullable()->default(0)->comment('comment');
            //$table->double('unit_price_sell')->index()->nullable()->default(0)->comment('comment');
            //$table->unsignedBigInteger('measure_unit_id')->unsigned()->index()->nullable()->comment('comment');
            $table->double('quantity')->index()->nullable()->default(0)->comment('comment');
            //$table->enum('sign', ['+', '-'])->index()->nullable()->comment('comment');
            //$table->double('sign_quantity')->index()->nullable()->default(0)->comment('comment');
            //$table->text('description')->nullable()->default(null)->comment('comment');
            $table->nullableMorphs('stockable');
            $table->nullableMorphs('referenceable');
            $table->unsignedBigInteger('activity_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('transaction_type_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('company_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('strategic_business_unit_id')->unsigned()->index()->nullable()->comment('comment');
            $table->timestamp('date_time_create')->nullable()->index()->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrent()->comment('comment');
        });
        
        Schema::table($this->table_name_1, function($table) {
            //$table->primary(array('id'), ('pk'.time().Str::uuid()->toString()));
            //$table->unique(array('id'), ('unique'.time().Str::uuid()->toString()));
            //$table->index(array('id'), ('index'.time().Str::uuid()->toString()));
            //$table->foreign('status_id', ('fk'.time().Str::uuid()->toString()))->references('id')->on('statuses')->onUpdate('cascade')->onDelete('set null');
        });
        
        Schema::table($this->table_name_1, function($table) {
            //if (Schema::hasTable('table_name')){}
            /*
            if ((Schema::hasColumn($this->table_name_1, 'id')) && (Schema::hasColumn($this->table_name_1, 'pk'))){
                //DB::statement("ALTER TABLE {$this->table_name_1} MODIFY COLUMN pk INTEGER NOT NULL UNIQUE AUTO_INCREMENT;");
                //DB::statement("UPDATE {$this->table_name} SET id = pk");
            }
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_name_1);
    }
}
