<?php
session_start();
class Shopping_cart{

public function insert($arr){

   
if(!empty($_SESSION["cart"])){
  $id_array = array_column($_SESSION["cart"], "cart_id");
  if(!in_array($arr["cart_id"], $id_array)){
     $count = count($_SESSION["cart"]);
     
     $_SESSION["cart"][$count] = $arr;
    
  
  } else {
    foreach($_SESSION["cart"] as $key => $val){
    
      if($arr["cart_id"] == $val["cart_id"]){
       $arr["qty"] = $arr["qty"] + $val["qty"];
      $_SESSION["cart"][$key] = $arr;
      }
    
    }
  }

} else {
  $_SESSION["cart"][0] = $arr;
}
}
public function delete($id){

foreach($_SESSION["cart"] as $index => $val){
if($id == $val["cart_id"]){
unset($_SESSION["cart"][$index]);
}
}


}


public function display(){
$dis= [];
if(!empty($_SESSION["cart"])){
   foreach($_SESSION["cart"] as $key =>$val){
   $dis[] = $val;
}  
}
return $dis;
}



}
