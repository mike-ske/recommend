<?php

namespace Recommend\ClassFile;

// require 'classes/connect.php';

class user {

    public $username = ['username'];
    public $post_data;
    public $sql;
    public $result;
    public $query;


    // Gets the post data on initialization of objects
    public function __construct($post)
    {
        $this->post_data = $post;
       
    }

    public function addUser()
    {
        foreach ($this->username as $value) {

            if (!array_key_exists($value, $this->post_data)) {
                trigger_error('Invalid! No such field exist');
            }

        }
        $this->insert_data();
        return;
    }

    public  function insert_data()
    {
        $data = $this->post_data['username'];
  
        $this->sql = "INSERT INTO user_data (`username`) VALUES ('$data')";
        $this->query = mysqli_query( connect::db_connect(), $this->sql );
        if (!$this->query) {
            connect::addError('message', 'Failed to register user');
            // die('Failed to insert '.$data.' into database'. mysqli_errno(connect::db_connect()));
        }
        else
        {
            connect::addError('message', 'Success. User registered');
        }
        return;
    }

    public  function select_user()
    {
        $this->sql = "SELECT * FROM user_data";
        $this->query = mysqli_query( connect::db_connect(), $this->sql );

        if (!$this->query) {
            die('Failed to fetch from database');
            connect::addError('message', 'Failed to get user');
        }
        else
        {
            return $this->query;
        }
        return;
    }

}