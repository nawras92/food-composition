<?php


function check_selected_option($select_name, $current_option){
  if (isset($_POST[$select_name])){
    $selected_option = $_POST[$select_name];
  }else{
    $selected_option = "";
  }
  if ($selected_option == $current_option){
    echo "selected";
  }
}


 ?>
