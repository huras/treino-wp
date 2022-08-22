<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class LutronListTableClass extends WP_List_Table 
{
    // define data set for WP_List_Table => data
    var $data = array(
        ["id" => 1, "name" => "Sanhjau", "email" => "Sanhjau@mail.com"],
        ["id" => 2, "name" => "Aman", "email" => "Aman@mail.com"],
        ["id" => 3, "name" => "Rohit", "email" => "Rohit@mail.com"],
        ["id" => 4, "name" => "Gopal", "email" => "Gopal@mail.com"],
    );

    // prepare_items
    public function prepare_items(){
        $this->items = $this->data;
        
        $columns = $this->get_columns();

        $this->_column_headers = array($columns);
    }

    // get_dolumns
    public function get_columns(){
        $columns = array();

        $columns = array(
            "id" => "ID",
            "name" => "Name",
            "email" => "Email"
        );

        return $columns;
    }

    // columns_default
    public function column_default($item, $column_name){
        switch ($column_name) {
            case 'id':
                return $item[$column_name];
                break;
            case 'name':
                return $item[$column_name];
                break;
            case 'email':
                return $item[$column_name];
                break;
            default:
                return 'no value';
                break;
        }
    }
}

function lfp_list_table_layout(){
    $lfp_list_table = new LutronListTableClass();
    $lfp_list_table->prepare_items();
    $lfp_list_table->display();
}

lfp_list_table_layout();