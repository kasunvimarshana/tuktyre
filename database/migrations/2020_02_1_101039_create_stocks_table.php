<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateStocksTable extends Migration
{
    protected $table_name_1 = "stocks";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }
    
    private function createView(){
        return <<<SQL
            CREATE VIEW {$this->table_name_1} AS
            SELECT
                stock_ins.id AS stock_id,
                stock_ins.is_visible AS stock_is_visible,
                stock_ins.is_active AS stock_is_active,
                stock_ins.status_id AS stock_status_id,
                stock_ins.stockable_id AS stock_stockable_id,
                stock_ins.stockable_type AS stock_stockable_type,
                stock_ins.referenceable_id AS stock_referenceable_id,
                stock_ins.referenceable_type AS stock_referenceable_type,
                stock_ins.activity_id AS stock_activity_id,
                stock_ins.transaction_type_id AS stock_transaction_type_id,
                stock_ins.company_id AS stock_company_id,
                stock_ins.strategic_business_unit_id AS stock_strategic_business_unit_id,
                stock_ins.user_id_create AS stock_user_id_create,
                stock_ins.description AS stock_description,
                stock_ins.date_time_create AS stock_date_time_create,
                stock_in_items.id AS stock_item_id,
                stock_in_items.is_visible AS stock_item_is_visible,
                stock_in_items.is_active AS stock_item_is_active,
                stock_in_items.is_countable AS stock_item_is_countable,
                stock_in_items.status_id AS stock_item_status_id,
                stock_in_items.item_id AS stock_item_item_id,
                COALESCE(stock_in_items.unit_price, 0) AS stock_item_unit_price,
                COALESCE((stock_in_items.quantity * (1))) AS stock_item_quantity,
                stock_in_items.stockable_id AS stock_item_stockable_id,
                stock_in_items.stockable_type AS stock_item_stockable_type,
                stock_in_items.referenceable_id AS stock_item_referenceable_id,
                stock_in_items.referenceable_type AS stock_item_referenceable_type,
                stock_in_items.stock_in_id AS stock_item_stock_in_id,
                stock_in_items.date_time_create AS stock_item_date_time_create,
                'stock_in' AS note
            FROM
                stock_ins AS stock_ins,
                stock_in_items AS stock_in_items
            WHERE
                stock_ins.id = stock_in_items.stock_in_id
                
            UNION ALL
            
            SELECT
                stock_outs.id AS stock_id,
                stock_outs.is_visible AS stock_is_visible,
                stock_outs.is_active AS stock_is_active,
                stock_outs.status_id AS stock_status_id,
                stock_outs.stockable_id AS stock_stockable_id,
                stock_outs.stockable_type AS stock_stockable_type,
                stock_outs.referenceable_id AS stock_referenceable_id,
                stock_outs.referenceable_type AS stock_referenceable_type,
                stock_outs.activity_id AS stock_activity_id,
                stock_outs.transaction_type_id AS stock_transaction_type_id,
                stock_outs.company_id AS stock_company_id,
                stock_outs.strategic_business_unit_id AS stock_strategic_business_unit_id,
                stock_outs.user_id_create AS stock_user_id_create,
                stock_outs.description AS stock_description,
                stock_outs.date_time_create AS stock_date_time_create,
                stock_out_items.id AS stock_item_id,
                stock_out_items.is_visible AS stock_item_is_visible,
                stock_out_items.is_active AS stock_item_is_active,
                stock_out_items.is_countable AS stock_item_is_countable,
                stock_out_items.status_id AS stock_item_status_id,
                stock_out_items.item_id AS stock_item_item_id,
                COALESCE(stock_out_items.unit_price, 0) AS stock_item_unit_price,
                COALESCE((stock_out_items.quantity * (-1)), 0) AS stock_item_quantity,
                stock_out_items.stockable_id AS stock_item_stockable_id,
                stock_out_items.stockable_type AS stock_item_stockable_type,
                stock_out_items.referenceable_id AS stock_item_referenceable_id,
                stock_out_items.referenceable_type AS stock_item_referenceable_type,
                stock_out_items.stock_out_id AS stock_item_stock_out_id,
                stock_out_items.date_time_create AS stock_item_date_time_create,
                'stock_out' AS note
            FROM
                stock_outs AS stock_outs,
                stock_out_items AS stock_out_items
            WHERE
                stock_outs.id = stock_out_items.stock_out_id
        SQL;
    }

    private function dropView(){
        return <<<SQL
        DROP VIEW IF EXISTS {$this->table_name_1};
        SQL;
    }
}