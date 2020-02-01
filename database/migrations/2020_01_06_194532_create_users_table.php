<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateUsersTable extends Migration
{
    protected $table_name_1 = "users";
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
            $table->unsignedBigInteger('status_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->string('code')->nullable()->comment('comment');//->index()
            $table->string('nic_number')->nullable()->comment('comment');//->index()
            $table->string('driving_licence_number')->nullable()->comment('comment');//->index()
            //$table->string('name_first')->nullable()->comment('comment');//->index()
            //$table->string('name_last')->nullable()->comment('comment');//->index()
            $table->string('name_full')->nullable()->comment('comment');//->index()
            $table->string('name_display')->nullable()->comment('comment');//->index()
            $table->string('phone_number')->nullable()->comment('comment');//->index()
            $table->string('email')->nullable()->comment('comment');//->index()
            $table->string('username')->nullable()->comment('comment');//->index()
            $table->string('password')->nullable()->comment('comment');//->index()
            $table->rememberToken()->comment('comment');
            $table->text('image_uri')->nullable()->default(null)->comment('uniform resource identifier'); 
            $table->unsignedBigInteger('company_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->unsignedBigInteger('strategic_business_unit_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->string('code_active')->nullable()->comment('comment');//->index()
            
            $table->unsignedBigInteger('user_type_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->unsignedBigInteger('vehicle_park_id')->unsigned()->nullable()->comment('comment');//->index()
            $table->string('registration_number')->nullable()->comment('comment');//->index()
            $table->string('address')->nullable()->comment('comment');//->index()
            $table->double('latitude')->nullable()->default(0)->comment('comment');//->index()
            $table->double('longitude')->nullable()->default(0)->comment('comment');//->index()
            $table->text('description')->nullable()->default(null)->comment('comment');
            $table->unsignedBigInteger('user_id_create')->unsigned()->nullable()->comment('comment');//->index()
            $table->timestamp('date_time_create')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrent()->comment('comment');//->index()
            
            //$table->boolean('is_multi_factor_authentication')->index()->nullable()->default(false)->comment('comment');
            //$table->boolean('is_onetime_authentication')->index()->nullable()->default(false)->comment('comment');
            //$table->boolean('is_token_authentication')->index()->nullable()->default(false)->comment('comment');
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
