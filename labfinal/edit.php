<?php include 'connection.php' ;?>
<?php         
  if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
  }
?>


<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}</style>

<body class="w3-light-grey">
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">
  <a class="float-right" href="mycv.php">HOME</a>

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="profile.jpg" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2>Sabiqun Nahar</h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Web Developer</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Bangladesh, Dhaka</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>sabiqunnahar123@gmail.com</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>01562816299</p>
          <hr>
        
      
  <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
 <?php 
    $sql = 'SELECT * FROM `skills`'; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      //echo "id: ".$row["id"]." - Name: ".$row["skillname"]." ".$row["skilllevel"]."<br>";
  ?>
      <p><?php echo $row["skillname"]; ?></p>
      <div class="w3-light-grey w3-round-xlarge w3-small">
        <div class="w3-container w3-center w3-round-xlarge w3-teal" 
        style="width:<?php echo $row["skilllevel"];?>%"> <?php echo $row["skilllevel"];?></div>
      </div>
  <?php 
    } 
  ?>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          <p>English</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <p>Spanish</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
          </div>
          <p>German</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
          </div>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
  <?php
    if(isset($_POST['updateskill'])){
      $name =  $_POST['sname'];
      $level = $_POST['level'];
      $sql = "UPDATE `skills` SET `skillname` = '$name', `skilllevel` = '$level' WHERE `skills`.`id` = $edit_id";
      
      if(mysqli_query($conn, $sql)){
        echo "<script>window.location='mycv.php'</script>";
      }
    }
    $sql = "SELECT * FROM `skills` WHERE id=$edit_id"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  ?>
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Edit SKILLS </h2>
       
    
    
    <form class="w3-container w3-card-4" action="" method = "post">
      <h2 class="w3-text-blue">Input Form</h2>
      <p>      
      <label class="w3-text-blue"><b>Skill Name</b></label>
      <input class="w3-input w3-border" name="sname" type="text" value="<?php echo $row['skillname'];?>"></p>
      <p>      
      <label class="w3-text-blue"><b>Update Level</b></label>
      <input class="w3-input w3-border" name="level" type="number" value="<?php echo $row['skilllevel'];?>"></p>
      <p>      
      <button class="w3-btn w3-blue" name='updateskill'>UPDATE</button></p>
    </form>

      </div>


    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>


<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
</body>
</html>
