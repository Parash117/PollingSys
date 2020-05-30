<html>
<title>Answers</title>
<?php
include('dbconnection.php');
  if(isset($_GET["sub"])){
    $sub = $_GET["sub"];
  }
  $sql = "SELECT * FROM $sub";

?>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
*,
*:before,
*:after {
  margin: 0px;
  padding: 0px;
  box-sizing: inherit;
  text-decoration: none;
  list-style: none;
}
html {
  font-size: 62.5%;
}
  body {
      box-sizing: border-box;
  background-image:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,100,121,0.9724264705882353) 0%, rgba(0,212,255,1) 100%);
}
.center {
  margin: auto;
  width: 50%;
  border: 0px solid green;
  padding: 10px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition:all 0.3s;
  background-color: #ffffff;
  border-radius: 8px;
  padding-right: 15px;
  padding-left: 15px;
  padding-bottom: 3px;
  padding-top: 10px; /* 5px rounded corners */
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.card1 {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: all 0.3s;
  background-color: #E0E0E0;
  border-radius: 8px;
  padding-right: 15px;
  padding-left: 15px;
  padding-bottom: px;
  padding-top: 2px; /* 5px rounded corners */
}
.card1:hover {
  box-shadow: 0 8px 20px 0 rgba(0,0,0,0.2);
}

.button1{
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
}
.button2{
  background-color: #FF0000; /* red */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
}
.progress .bar {
    animation: PewPew .4s ease-in-out 1;
}
.bar-title {
    opacity: 0;
    animation: showIT 0.4s forwards ease-in 0.7s;
  }

@keyframes PewPew {
    0% {transform: translateX(-100%);}
    100% {transform: translateX(0);}
}

@keyframes showIT  {
  0% {opacity: 0;}
    100% { opacity: 1;}
  
}
</style>
</head>
<body>
<div class="center">
  <h5>Poll: Where do you usually browse</h5>
  <div id="placehere" >
   <?php
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {?>
            
    
            <div class="card ">
==================<strong><?php echo "Question no.".$row['ID'] ?></strong>=================
                <br>
                <?php 
                  $totalvote = $row["a"]+$row["b"]+$row["c"]+$row["d"]+$row["e"];
                  if($totalvote == 0){
                    $totalvote = 1;
                  }
                  $aper = ($row["a"]/$totalvote)*100;
                  $bper = ($row["b"]/$totalvote)*100;
                  $cper = ($row["c"]/$totalvote)*100;
                  $dper = ($row["d"]/$totalvote)*100;
                  $eper = ($row["e"]/$totalvote)*100;

                ?>
                <div class="card1">
                <strong>Ans : a</strong>
                <span class="pull-right"><?php echo $aper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'am'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">-</button>
                <button class="button1" onClick="<?php echo 'ap'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>
                <div class="progress">
                <!-- <?php echo $aper."%"; ?> -->
                    <div class="bar progress-danger active" style="width: 70%;">
                    <span class="bar-title">70%</span>
                     </div>
                </div></div>
                
                <div class="card1">
                <strong>Ans : b</strong>
                <span class="pull-right"><?php echo $bper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'bm'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'b'?>">-</button>
                <button class="button1" onClick="<?php echo 'bp'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>
                <div class="progress">
                    <div class="bar progress-info active" style="width: <?php echo $bper."%"; ?>;"></div>
                </div></div>

                <div class="card1">
                <strong>Ans : c</strong>
                <span class="pull-right"><?php echo $cper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'cm'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'c'?>">-</button>
                <button class="button1" onClick="<?php echo 'cp'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>
                <div class="progress ">
                <div class="bar progress-striped active" style="width: <?php echo $cper."%"; ?>;"></div>
                </div></div>

                <div class="card1">
                <strong>Ans : d</strong>
                <span class="pull-right"><?php echo $dper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'dm'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'d'?>" >-</button><button class="button1" onClick="<?php echo 'dp'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>
                <div class="progress ">
                <div class="bar progress-success active" style="width: <?php echo $dper."%"; ?>;"></div>
                </div></div>

                <div class="card1">
                <strong>Ans : e</strong>
                <span class="pull-right"><?php echo $eper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'em'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'e'?>">-</button>
                <button class="button1" onClick="<?php echo 'ep'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>  
                <div class="progress ">
                <div class="bar progress-warning active" style="width: <?php echo $eper."%"; ?>;"></div>
                </div></div>
                </div>
                <br><br>
         

                <?php

                  }

                }

                ?>
</div>
</div>
<script>

$(document).ready(function() {
        // auto refresh page after 1 second
        setInterval('refreshPage()', 3000);
    });
 
    function refreshPage() { 
        //location.reload();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("placehere").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "reloader.php?sub=<?php echo $sub; ?>", true);
        xmlhttp.send(); 
    }
  <?php
  $sql = "SELECT * FROM adms";
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
  ?>
      function <?php echo 'am'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "subVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=1&b=0&c=0&d=0&e=0&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }
      function <?php echo 'ap'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "addVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=1&b=0&c=0&d=0&e=0&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }
      //===============================================
      function <?php echo 'bm'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "subVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=0&b=1&c=0&d=0&e=0&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }
      function <?php echo 'bp'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "addVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=0&b=1&c=0&d=0&e=0&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }
      //=========================================================
      function <?php echo 'cm'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "subVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=0&b=0&c=1&d=0&e=0&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }
      function <?php echo 'cp'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "addVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=0&b=0&c=1&d=0&e=0&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }

      //=================================================
      function <?php echo 'dm'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "subVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=0&b=0&c=0&d=1&e=0&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }
      function <?php echo 'dp'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "addVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=0&b=0&c=0&d=1&e=0&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }

      //================================================================
      function <?php echo 'em'.$row["ID"].'()' ?>{
       // alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "subVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=0&b=0&c=0&d=0&e=1&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }
      function <?php echo 'ep'.$row["ID"].'()' ?>{
        //alert("button clickd of"+"<?php echo $row["ID"].'a' ?>");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "addVote.php?qid="+<?php echo $row["ID"]; ?>+"&a=0&b=0&c=0&d=0&e=1&sub=<?php echo $sub; ?>", true);
        xmlhttp.send();
      }

<?php }} ?>

function addVote(qid) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "addVote.php?qid="+qid, true);
    xmlhttp.send();
  }
}
</script>
</body>
</html>