<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateItemsTable extends Migration
{
    protected $table_name_1 = "items";
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
            $table->boolean('is_visible')->nullable()->default(false)->comment('comment');//->index()
            $table->boolean('is_active')->nullable()->default(false)->comment('comment');//->index()
            $table->string('slug')->nullable()->comment('comment');//->index() // create-table
            $table->string('code')->nullable()->comment('comment');//->index()
            $table->string('name')->nullable()->comment('comment');//->index()
            $table->string('name_display')->nullable()->comment('comment');//->index()
            $table->text('description')->nullable()->default(null)->comment('comment');
            $table->text('image_uri')->nullable()->default(null)->comment('uniform resource identifier'); 
            $table->double('unit_price_buy')->nullable()->default(0)->comment('comment');//->index()
            $table->double('unit_price_sell')->nullable()->default(0)->comment('comment');//->index()
            $table->unsignedBigInteger('status_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->unsignedBigInteger('measure_unit_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->unsignedBigInteger('product_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->unsignedBigInteger('category_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->unsignedBigInteger('manufacture_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->unsignedBigInteger('item_id_parent')->unsigned()->nullable()->comment('comment');//->index()
            $table->double('piority_order')->nullable()->default(0)->comment('comment');//->index()
            $table->boolean('is_parent')->nullable()->default(false)->comment('comment');//->index()
            $table->boolean('is_child')->nullable()->default(false)->comment('comment');//->index()
            $table->boolean('is_stockable')->nullable()->default(false)->comment('comment');//->index()
            $table->timestamp('date_time_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrent()->comment('comment');//->index()
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
