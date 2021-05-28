<?php

namespace Recommend\ClassFile;

use Recommend\ClassFile\connect;


class product {

    public static $item;
    public static $data = ['product_name', 'product_category', 'product_rating', 'product_purchase', 'user'];
    private $post;

    public $sql;
    public $result;
    public $query;


    public function __construct($data_items)
    {
        $this->post = $data_items;
    }


    public function getData()
    {
        // === First loop through the array $data and check the 
        // array values against the POST DATA ==> $data_items 
        foreach (self::$data as $data_values) {
            
            if (!array_key_exists($data_values, $this->post)) 
            {
                trigger_error($data_values . ' Invalid input field');
                connect::addError('message', 'Input field does not Exist');
                return;
            }
            
        }
       
    }

    public function insertProduct($id)
    {
        /**
         * Function takes in the data and inserts it into data base
         */
        $product_name = trim($this->post['product_name']);
        $product_rating = trim($this->post['product_rating']);
        $product_purchase = trim($this->post['product_purchase']);
        $product_category = trim($this->post['product_category']);
     
        $this->sql = "INSERT INTO `recommend_user` (`user_id`, `product_name`, `product_rating`, `product_purchase`, `product_category`) 
                    VALUES ('$id', '$product_name', '$product_rating', '$product_purchase', '$product_category')";
        $this->query = mysqli_query(connect::db_connect(), $this->sql);
        if (!$this->query) 
        {
            connect::addError('message', 'Failed to insert Product');
        }
        else
        {
            connect::addError('message', 'Success! ');
        }
        return $this->query;

    }

    public function selectProduct(Int $id)
    {
        /**
         * This function selects products based on the user ID
         */
        $this->sql = "SELECT * FROM recommend_user WHERE `user_id` = $id ";
        $this->query = mysqli_query( connect::db_connect(), $this->sql );
        
        if (!$this->query) 
        {
           connect::$addError('message', 'Failed! Data nnot found');
        }
        else
        {
            connect::$addError('message', ' ');
            return $this->query;
        }
        return;
    }










}