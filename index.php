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
                     value=""
                     name="searchTerm" type="text" placeholder="Search Term: butter">
              <select id="foodGroup" name="foodGroup" class="form-control form-control-lg mr-sm-2">
                <option value="1100">Vegetables and Vegetable Products</option>
                <option value="0900">Fruits and Fruit Juices</option>
                <option value="0100">Dairy and Egg Products</option>
                <option value="0500">Poultry Products</option>
                <option value="0700">Sausages and Luncheon Meats</option>
                <option value="1300">Beef Products</option>
                <option value="1700">Lamb, Veal, and Game Products</option>
                <option value="2000">Cereal Grains and Pasta</option>
                <option value="2100">Fast Foods</option>
                <option value="2200">Meals, Entrees, and Side Dishes</option>
                <option value="0400">Fats and Oils</option>
                <option value="1800">Baked Products</option>
                <option value="1600">Legumes and Legume Products</option>
                <option value="1200">Nut and Seed Products</option>
                <option value="1900">Sweets</option>
                <option value="0600">Soups, Sauces, and Gravies</option>
                <option value="0800">Breakfast Cereals</option>
                <option value="2500">Snacks</option>
                <option value="0200">Spices and Herbs</option>
              </select>
              <select id="dataSource" name="dataSource" class="form-control form-control-lg mr-sm-2">
                <option value="Standard%20Reference">
                  Standard Reference
                </option>
                <option value="Branded%20Food%20Products">
                  Branded Food Products
                </option>
              </select>
             <button class="btn btn-outline-primary btn-lg my-5" name="submit" type="submit">Search</button>
        </form>
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