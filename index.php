<?php require_once('utils.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Food Composition</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container mb-10">
       <div class="jumbotron mt-3 text-center">
          <h1>Search for food composition now</h1>
          <p class="lead">Write the food item name in the search box</p>
          <form class="form-inline mt-2 mt-md-0 justify-content-center" method="POST">
              <input class="form-control form-control-lg mr-sm-2"
                     value="<?php if(isset($_POST['searchTerm'])){echo $_POST['searchTerm'];} ?>"
                     name="searchTerm" type="text" placeholder="Search Term: butter">
              <select id="foodGroup" name="foodGroup" class="form-control form-control-lg mr-sm-2">
                <option value="all" <?php check_selected_option('foodGroup', 'all'); ?> >All Food Groups</option>
                <option value="1100" <?php check_selected_option('foodGroup', '1100'); ?> >Vegetables and Vegetable Products</option>
                <option value="0900" <?php check_selected_option('foodGroup', '0900'); ?>>Fruits and Fruit Juices</option>
                <option value="0100" <?php check_selected_option('foodGroup', '0100'); ?>>Dairy and Egg Products</option>
                <option value="0500" <?php check_selected_option('foodGroup', '0500'); ?>>Poultry Products</option>
                <option value="0700" <?php check_selected_option('foodGroup', '0700'); ?>>Sausages and Luncheon Meats</option>
                <option value="1300" <?php check_selected_option('foodGroup', '1300'); ?>>Beef Products</option>
                <option value="1700" <?php check_selected_option('foodGroup', '1700'); ?>>Lamb, Veal, and Game Products</option>
                <option value="2000" <?php check_selected_option('foodGroup', '2000'); ?>>Cereal Grains and Pasta</option>
                <option value="2100" <?php check_selected_option('foodGroup', '2100'); ?>>Fast Foods</option>
                <option value="2200" <?php check_selected_option('foodGroup', '2200'); ?>>Meals, Entrees, and Side Dishes</option>
                <option value="0400" <?php check_selected_option('foodGroup', '0400'); ?>>Fats and Oils</option>
                <option value="1800" <?php check_selected_option('foodGroup', '1800'); ?>>Baked Products</option>
                <option value="1600" <?php check_selected_option('foodGroup', '1600'); ?>>Legumes and Legume Products</option>
                <option value="1200" <?php check_selected_option('foodGroup', '1200'); ?>>Nut and Seed Products</option>
                <option value="1900" <?php check_selected_option('foodGroup', '1900'); ?>>Sweets</option>
                <option value="0600" <?php check_selected_option('foodGroup', '0600'); ?>>Soups, Sauces, and Gravies</option>
                <option value="0800" <?php check_selected_option('foodGroup', '0800'); ?>>Breakfast Cereals</option>
                <option value="2500" <?php check_selected_option('foodGroup', '2500'); ?>>Snacks</option>
                <option value="0200" <?php check_selected_option('foodGroup', '0200'); ?>>Spices and Herbs</option>
              </select>
              <select id="dataSource" name="dataSource" class="form-control form-control-lg mr-sm-2">
                <option value="all" <?php check_selected_option('dataSource', 'all'); ?> >
                  All Databases
                </option>
                <option value="Standard%20Reference" <?php check_selected_option('dataSource', 'Standard%20Reference'); ?> >
                  Standard Reference
                </option>
                <option value="Branded%20Food%20Products" <?php check_selected_option('dataSource', 'Branded%20Food%20Products'); ?>>
                  Branded Food Products
                </option>
              </select>
             <button class="btn btn-outline-primary btn-lg my-5" name="submit" type="submit">Search</button>
        </form>
      </div>


    <?php

     if (isset($_POST['submit'])):

       if (isset($_POST['searchTerm'])){
          $search_query = $_POST['searchTerm'];
          $search_query = str_replace(' ','%20', $search_query);
       }else{
         $search_query = "";
       }

       if (isset($_POST['foodGroup'])){
         $food_group = $_POST['foodGroup'];
         if ($food_group == 'all'){
           $food_group = "";
         }
       }else{
         $food_group = "";
       }

       if (isset($_POST['dataSource'])){
         $data_source = $_POST['dataSource'];
         if ($data_source == 'all'){
           $data_source = "";
         }
       }else{
         $data_source = "";
       }


       $url = "https://api.nal.usda.gov/ndb/search/?format=json&api_key=DEMO_KEY&q=$search_query&fg=$food_group&ds=$data_source";
       $curl = curl_init();
       curl_setopt($curl,CURLOPT_URL,$url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $result = curl_exec($curl);
       curl_close($curl);
       $json = json_decode($result);

       if (!isset($json->errors)):
     ?>

     <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-responsive">
         <thead>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Group</th>
             <th>Company</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach($json->list->item as $item): ?>
             <tr>
              <td><?php echo $item->ndbno; ?></td>
              <td><?php echo $item->name; ?> </td>
              <td><?php echo $item->group;?></td>
              <td><?php echo $item->manu;?></td>
             </tr>
           <?php endforeach;?>
         </tbody>
        </table>
      </div>
     </div>
   <?php else: ?>
     <?php foreach($json->errors->error as $error): ?>
       <?php echo $error->message; ?>
     <?php endforeach; ?>
   <?php endif; // !isset($json->errors) ?>
   <?php endif; // isset($_POST['submit'])?>



</div>


    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="">Food Composition</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item">
            <a class="nav-link" href="">Search</a>
           </li>
         </ul>
         </div>
     </nav>
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
