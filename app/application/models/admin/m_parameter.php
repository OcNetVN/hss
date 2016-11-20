<?php
class M_parameter extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }
        
        public function loadcategory(){
        $sql = "SELECT * FROM `category` WHERE `pid` IS NULL";
        $arr_Category = $this->db->query($sql)->result();
        $arr = array('Category' => $arr_Category);
        return $arr;
        }
   
        public function loadsubcategory(){
            $cate = $_POST['Category'];
            $sql  = "SELECT * FROM `category` WHERE `pid`='$cate'";
            $arr_SubCate = $this->db->query($sql)->result();
            $arr = array('SubCate' => $arr_SubCate);
            return $arr;
        }

        public function loadsubItem()
        {
          $ItemID = "";
          if(isset($_POST['Item']))
            $ItemID = $_POST['Item'];
          $sql = "SELECT * FROM `category` WHERE `id` ='$ItemID'";
          $ar_Sub = $this->db->query($sql)->result();
          $req = "";
          if(count($ar_Sub) != 0)
          {
            $req = 1;
          }

          $arr = array('Result'=>$req,'ItemDetail'=>$ar_Sub);
          return $arr;
        }
        
     public function deleteItem(){
        $subCate = $_POST['subCate'];
        if($subCate != ""){
            $sql  = "DELETE FROM `category` WHERE `id`='$subCate'";
            $this->db->query($sql); 
        }
        $arr = array('SubCate' => $subCate);
        return $arr;
     }
   
      public function SaveCategory(){
          $id = $_POST['Cate'];
          $name = $_POST['Name'];
          if($id != null){
              $sql = "SELECT * FROM `category` WHERE `id`='$id'";
              $Cate = $this->db->query($sql)->result();
              if(count($Cate) != 0){
                  $sql_update = "UPDATE `category` SET `enCont`='$name' WHERE `id`='$id'";
                  $this->db->query($sql_update);
              }
              else{
                  $sql = "INSERT INTO `category`(`enCont`,`createdDate`)VALUES('$name',NOW())";
                  $this->db->query($sql);
              }
              
          }
          else{
              $sql = "INSERT INTO `category`(`enCont`,`createdDate`)VALUES('$name',NOW())";
              $this->db->query($sql);
          }
          
      }
   
      public function AddItem(){
          $id           = $_POST['Cate'];
          $ItemName     = $_POST['ItemName'];
          $ItemNameMn   = "";
          if(isset($_POST['ItemNameMn']))
            $ItemNameMn   = $_POST['ItemNameMn'];
            $ItemNameMn   =  str_replace("'","",$ItemNameMn);
          $Subcate      = $_POST['Subcate'];
          if($id != null){
              $sql = "SELECT * FROM `category` WHERE `id`='$Subcate'";
              $Cate = $this->db->query($sql)->result();
              if(count($Cate) != 0){
                  $sql_update = "UPDATE `category` 
                                SET `enCont`='$ItemName',`cnCont`='$ItemNameMn' 
                                WHERE `id`='$Subcate'";
                  $this->db->query($sql_update);
              }
              else{
                  $sql = "INSERT INTO `category`(`enCont`,`cnCont`,`pid`,`createdDate`)VALUES('$ItemName','$ItemNameMn','$id',NOW())";
                  $this->db->query($sql);
              }
              
          }
          
      }
}