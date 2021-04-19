<?php 
require "vendor/autoload.php";
class Mongo {

    protected $db;


    function __construct()
    {   
        
        // $server = 'mongo_server';
        // $username = 'mongo_username';
        // $password = 'mongo_password';
        // $dbname = 'mongo_dbname';

        $con = new MongoDB\Client("mongodb://localhost:27017");

        if($con){
            $db = $con->selectDatabase('doctadb');
            if($db){
                $this->db = $db;
            }
        }
    }


    // create new collection
    public function create_new_collection(){
        $result  = $this->db->createCollection('user_table');

        print_r($result);
    }



    //data insert query
    public function insert_data(){

        $col = $this->db->selectCollection('docta_patient');

        if($col){
            $data = array(

                        'name' => 'rasel',
                        'email' => 'rasel@example.com',
                        'phone' => '123456',
                        'address' => 'Khilkhet',
                        'country' => 'Bangladesh'
                    );

           $insertOneResult = $col->insertOne($data);  
           echo "<pre>";
           print_r($insertOneResult);
        }

    }

    //data insert query
    public function insert_many_data(){

        $col = $this->db->selectCollection('docta_patient');

        if($col){
            $data = array(
                    [
                        'name' => 'rasel',
                        'email' => 'rasel@example.com',
                        'phone' => '123456',
                        'address' => 'Khilkhet',
                        'country' => 'Bangladesh'
                    ],

                    [
                        'name' => 'misor',
                        'email' => 'misor@example.com',
                        'phone' => '123456111',
                        'address' => 'Khilkhet',
                        'country' => 'Bangladesh'
                    ],

                    [
                        'name' => 'alamin',
                        'email' => 'alamin@example.com',
                        'phone' => '123456123',
                        'address' => 'Khilkhet',
                        'country' => 'Bangladesh'
                    ],

                    [
                        'name' => 'tareq',
                        'email' => 'tareq@example.com',
                        'phone' => '123456123213',
                        'address' => 'Khilkhet',
                        'country' => 'Bangladesh'
                    ],

                    [
                        'name' => 'shahab-uddin',
                        'email' => 'shahab-uddin@example.com',
                        'phone' => '123456123123',
                        'address' => 'Khilkhet',
                        'country' => 'Bangladesh'
                    ]
                );

           $insertOneResult = $col->insertMany($data);  
           echo "<pre>";
           print_r($insertOneResult);
        }

    }



    // data retrive query
    public function data_find(){
        $col = $this->db->selectCollection('docta_patient');
        $cursor = $col->find( [],[
            'limit' => 5
        ]);

        $data = array();

        foreach ($cursor as $document) {
            $data = $document['name']."<br>";
        }

        echo "<pre>";
        print_r($data);
    }


    // update query
    public function update_data(){
        $col = $this->db->selectCollection('docta_patient');
        $updateResult = $col->updateOne(
            ['phone' => 'Shaifull'],
            ['$set' => ['country' => 'Bangladesh','email'=>'ful@gmail.com']]
        );

        echo "<pre>";
        print_r($updateResult);
    }


    // replace query
    public function replace_data(){
        $col = $this->db->selectCollection('docta_patient');
        $updateResult = $col->replaceOne(
            ['phone' => 'Shaifull'],
            ['name' => 'Robert', 'email' => 'robert@gmail.com','country'=>'USA','phone'=>'12365489966']
        );

        echo "<pre>";
        print_r($updateResult);
    }


    // upsert query
    public function upsert(){
        $col = $this->db->selectCollection('docta_patient');

        $updateResult = $col->updateOne(
            ['name' => 'Bob'],
            ['$set' => ['state' => 'ny']],
            ['upsert' => true]
        );

        echo "<pre>";
        print_r($updateResult);

    }


    // Delete  query
    public function delete_data(){
        $col = $this->db->selectCollection('docta_patient');
        $deleteResult = $col->deleteOne(['username' => 'test']);

        echo "<pre>";
        print_r($deleteResult);
    }

}


$Mongo = new Mongo();

echo $Mongo->create_new_collection();