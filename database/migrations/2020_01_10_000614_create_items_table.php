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
            //$table->->uuid('id')->nullable()->default(0)->unique()->comment('universal unique identifier');
            //$table->dateTime('date_time')->nullable()->default('CURRENT_TIMESTAMP')->change();
            
            $table->bigIncrements('id')->comment('comment');
            $table->timestamps();
            //$table->unsignedBigInteger('pk')->nullable()->default(0)->comment('comment');
            $table->boolean('is_visible')->index()->nullable()->default(false)->comment('comment');
            $table->boolean('is_active')->index()->nullable()->default(false)->comment('comment');
            $table->string('slug')->index()->nullable()->comment('comment'); // create-table
            $table->string('code')->index()->nullable()->comment('comment');
            $table->string('name')->index()->nullable()->comment('comment');
            $table->string('name_display')->index()->nullable()->comment('comment');
            $table->text('description')->nullable()->default(null)->comment('comment');
            $table->text('image_uri')->nullable()->default(null)->comment('uniform resource identifier'); 
            $table->double('price_buy')->index()->nullable()->default(0)->comment('comment');
            $table->double('price_sell')->index()->nullable()->default(0)->comment('comment');
            $table->unsignedBigInteger('status_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('measure_unit_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('product_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('category_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('manufacture_id')->unsigned()->index()->nullable()->comment('comment');
            $table->unsignedBigInteger('item_id_parent')->unsigned()->index()->nullable()->comment('comment');
            $table->double('piority_order')->index()->nullable()->default(0)->comment('comment');
            $table->boolean('is_parent')->index()->nullable()->default(false)->comment('comment');
            $table->boolean('is_child')->index()->nullable()->default(false)->comment('comment');
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
