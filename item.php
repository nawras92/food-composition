<?php include_once('header.php'); ?>

<div class="container">
  <div class="jumbotron mt-3 text-center">
   <h1>Food Composition for butter ------</h1>
   <p class="lead">Here you are the food compositions of what you searched for</p>
  </div>


   <?php
     $url = "https://api.nal.usda.gov/ndb/reports/?ndbno=01009&type=b&format=json&api_key=DEMO_KEY";
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $url);
     curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
     $result = curl_exec($curl);
     curl_close($curl);
     $json = json_decode($result);
   ?>

   <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-responsive">
       <thead>
         <tr>
           <th>Name</th>
           <th>Value</th>
           <th>Unit</th>
           <th>Group</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach($json->report->food->nutrients as $nutrient): ?>
           <tr>
            <td><?php echo $nutrient->name;?></td>
            <td><?php echo $nutrient->value;?></td>
            <td><?php echo $nutrient->unit;?></td>
            <td><?php echo $nutrient->group;?> </td>
           </tr>
         <?php endforeach; //end foreach($json->report->food->nutrients as $nutrient): ?>
       </tbody>
      </table>
    </div>
   </div>
   </div>



</div>





<?php include_once('footer.php'); ?>
