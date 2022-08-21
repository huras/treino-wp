<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class LutronListTableClass extends WP_List_Table 
{
    // define data set for WP_List_Table => data

    // prepare_items
    public function prepare_items(){
    }

    // get_dolumns
    public function get_columns(){
    }

    // columns_default
    public function column_default($item, $column_name){
    }
}

function lfp_list_table_layout(){
    $lfp_list_table = new LutronListTableClass();
    $lfp_list_table->prepare_items();
    $lfp_list_table->display();
}

lfp_list_table_layout();