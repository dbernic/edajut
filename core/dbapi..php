<?php


class DB {

   var $conn;
   var $config;
   var $isConnected;
   
   private static $instance = null;

   public static function getInstance(){
       if (self::$instance === null) {
           self::$instance = new DB();
       }
       
       return self::$instance;
   }
           
   function __construct() {
       $this->config = parse_ini_file('application.config');
       $this->connect();
   }


   private function connect() {

      $dsn = 'mysql:host='.$this->config['host']
              .';port=3306;dbname='.$this->config['dbase']
              .';user='.$this->config['user']
              .';password='.$this->config['pass'];

      $this->conn =  new PDO( $dsn );
   }

   
   function getInsertId() {
      return $this->conn->lastInsertId();
   }

   function getLastError($conn=NULL) {
      if (!is_resource($conn)) $conn =& $this->conn;
      return $conn->errorInfo();
   }


   /**
    * @name:  prepareDate
    * @desc:  prepares a date in the proper format for specific database types
    *         given a UNIX timestamp
    * @param: $timestamp: a UNIX timestamp
    * @param: $fieldType: the type of field to format the date for
    *         (in MySQL, you have DATE, TIME, YEAR, and DATETIME)
    */
   function prepareDate($timestamp, $fieldType = 'DATETIME') {
      $date = '';
      if (!$timestamp === false && $timestamp > 0) {
         switch ($fieldType) {
            case 'DATE' :
               $date = date('Y-m-d', $timestamp);
               break;
            case 'TIME' :
               $date = date('H:i:s', $timestamp);
               break;
            case 'YEAR' :
               $date = date('Y', $timestamp);
               break;
            default :
               $date = date('Y-m-d H:i:s', $timestamp);
               break;
         }
      }
      return $date;
   }
   
   function query($query){
       
   }
   
   function getArray($query){
       
   }
   
   function selectTable($table, $where=null){
       
   }
   
   function selectById($table, $id){
       
   }
   
   function insertInto($table, $array){
       
   }
   
   function updateById($table, $array, $id){
       
   }

}