<?php

use Illuminate\Database\Seeder;

use App\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /* ***** */
        $newModel_Item_Default = Item::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug("Default"),
            //'code' => str_slug("Default"),
            'name' => ucwords("Default"),
            'name_display' => ucwords("Default"),
            //'description' => null,
            //'image_uri' => null,
            //'unit_price_buy' => 0,
            //'unit_price_sell' => 0,
            //'status_id' => null,
            //'measure_unit_id' => null,
            //'product_id' => null,
            //'category_id' => null,
            //'manufacture_id' => null,
            //'item_id_parent' => null,
            //'piority_order' => null,
            'is_parent' => true,
            'is_child' => false,
            'is_stockable' => false,
            //'date_time_create' => null,
        ]);
        
        $newModel_Item_Tyre = Item::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug(null),
            //'code' => str_slug(null),
            'name' => ucwords("Tyre"),
            'name_display' => ucwords("Tyre"),
            //'description' => null,
            //'image_uri' => null,
            //'unit_price_buy' => 0,
            //'unit_price_sell' => 0,
            //'status_id' => null,
            //'measure_unit_id' => null,
            //'product_id' => null,
            //'category_id' => null,
            //'manufacture_id' => null,
            //'item_id_parent' => null,
            //'piority_order' => null,
            'is_parent' => true,
            'is_child' => false,
            'is_stockable' => false,
            //'date_time_create' => null,
        ]);
        
        $newModel_Item_Battery = Item::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug(null),
            //'code' => str_slug(null),
            'name' => ucwords("Battery"),
            'name_display' => ucwords("Battery"),
            //'description' => null,
            //'image_uri' => null,
            //'unit_price_buy' => 0,
            //'unit_price_sell' => 0,
            //'status_id' => null,
            //'measure_unit_id' => null,
            //'product_id' => null,
            //'category_id' => null,
            //'manufacture_id' => null,
            //'item_id_parent' => null,
            //'piority_order' => null,
            'is_parent' => true,
            'is_child' => false,
            'is_stockable' => false,
            //'date_time_create' => null,
        ]);
        
        $newModel_Item_AlloyWheel = Item::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug(null),
            //'code' => str_slug(null),
            'name' => ucwords("Alloy Wheels"),
            'name_display' => ucwords("Alloy Wheels"),
            //'description' => null,
            //'image_uri' => null,
            //'unit_price_buy' => 0,
            //'unit_price_sell' => 0,
            //'status_id' => null,
            //'measure_unit_id' => null,
            //'product_id' => null,
            //'category_id' => null,
            //'manufacture_id' => null,
            //'item_id_parent' => null,
            //'piority_order' => null,
            'is_parent' => true,
            'is_child' => false,
            'is_stockable' => false,
            //'date_time_create' => null,
        ]);
        /* ***** */
        
        /* *** */
        $newModel_Item_Tyre_ChildrenArray = array(
            $newModel_Item_Tyre->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("400/8 DSI"),
                'name_display' => ucwords("400/8 DSI"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Tyre->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Tyre->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("400/8 CEAT"),
                'name_display' => ucwords("400/8 CEAT"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Tyre->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Tyre->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("450/10 DSI"),
                'name_display' => ucwords("450/10 DSI"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Tyre->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Tyre->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("450/10 CEAT"),
                'name_display' => ucwords("450/10 CEAT"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Tyre->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Tyre->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("450/12 DSI"),
                'name_display' => ucwords("450/12 DSI"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Tyre->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Tyre->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("450/12 CEAT"),
                'name_display' => ucwords("450/12 CEAT"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Tyre->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
        );
        
        $newModel_Item_Tyre->itemChildren()->saveMany( $newModel_Item_Tyre_ChildrenArray );
        /* *** */
        
        /* *** */
        $newModel_Item_Battery_ChildrenArray = array(
            $newModel_Item_Battery->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("Dagenite 12v 35ah"),
                'name_display' => ucwords("Dagenite 12v 35ah"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Battery->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Battery->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("Dagenite 9v 65ah"),
                'name_display' => ucwords("Dagenite 9v 65ah"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Battery->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Battery->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("Exide 12v 35ah"),
                'name_display' => ucwords("Exide 12v 35ah"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Battery->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Battery->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("Exide 9v 65ah"),
                'name_display' => ucwords("Exide 9v 65ah"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Battery->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Battery->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("Amaron 12v 35ah"),
                'name_display' => ucwords("Amaron 12v 35ah"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Battery->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Battery->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("Amaron 9v 65ah"),
                'name_display' => ucwords("Amaron 9v 65ah"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Battery->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Battery->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("Lucas 12v 35ah"),
                'name_display' => ucwords("Lucas 12v 35ah"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Battery->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_Battery->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("Lucas 9v 60ah"),
                'name_display' => ucwords("Lucas 9v 60ah"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_Battery->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
        );
        
        $newModel_Item_Battery->itemChildren()->saveMany( $newModel_Item_Battery_ChildrenArray );
        /* *** */
        
        /* *** */
        $newModel_Item_AlloyWheel_ChildrenArray = array(
            $newModel_Item_AlloyWheel->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("MD01"),
                'name_display' => ucwords("MD01"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_AlloyWheel->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_AlloyWheel->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("MD02"),
                'name_display' => ucwords("MD02"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_AlloyWheel->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_AlloyWheel->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("MD03"),
                'name_display' => ucwords("MD03"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_AlloyWheel->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_AlloyWheel->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("MD04"),
                'name_display' => ucwords("MD04"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_AlloyWheel->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_AlloyWheel->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("MD05"),
                'name_display' => ucwords("MD05"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_AlloyWheel->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_AlloyWheel->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("MD06"),
                'name_display' => ucwords("MD06"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_AlloyWheel->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_AlloyWheel->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("MD07"),
                'name_display' => ucwords("MD07"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_AlloyWheel->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
            
            $newModel_Item_AlloyWheel->itemChildren()->firstOrCreate([
                //'id' => 1,
                'is_visible' => true,
                'is_active' => true,
                //'slug' => str_slug(null),
                //'code' => str_slug(null),
                'name' => ucwords("MD08"),
                'name_display' => ucwords("MD08"),
                //'description' => null,
                //'image_uri' => null,
                //'unit_price_buy' => 0,
                //'unit_price_sell' => 0,
                //'status_id' => null,
                //'measure_unit_id' => null,
                //'product_id' => null,
                //'category_id' => null,
                //'manufacture_id' => null,
                'item_id_parent' => $newModel_Item_AlloyWheel->id,
                //'piority_order' => 0,
                'is_parent' => true,
                'is_child' => true,
                'is_stockable' => true,
                //'date_time_create' => null,
            ]),
        );
        
        $newModel_Item_AlloyWheel->itemChildren()->saveMany( $newModel_Item_AlloyWheel_ChildrenArray );
        /* *** */
    }
}

