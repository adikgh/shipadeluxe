<? 

   require 'db.php';
   require 't.php';
   require 'fun.php';
   require 'var.php';

   class core {
      public function __construct() {
         session_start();
         new db; new t; new fun;
      }
   }
   $core = new core;
   
   //
   $site = mysqli_fetch_array(db::query("select * from `site` where id = 1"));