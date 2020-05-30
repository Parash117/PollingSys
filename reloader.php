<?php
include('dbconnection.php');
if(isset($_GET["sub"])){
    $sub = $_GET["sub"];
  }
  $sql = "SELECT * FROM $sub";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {?>
            <div class="card">
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
                <div class="progress progress-danger active">
                    <div class="bar" style="width: <?php echo $aper."%"; ?>;"></div>
                </div></div>
                
                <div class="card1">
                <strong>Ans : b</strong>
                <span class="pull-right"><?php echo $bper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'bm'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'b'?>">-</button>
                <button class="button1" onClick="<?php echo 'bp'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>
                <div class="progress progress-info active">
                    <div class="bar" style="width: <?php echo $bper."%"; ?>;"></div>
                </div></div>

                <div class="card1">
                <strong>Ans : c</strong>
                <span class="pull-right"><?php echo $cper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'cm'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'c'?>">-</button>
                <button class="button1" onClick="<?php echo 'cp'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>
                <div class="progress progress-striped active">
                <div class="bar" style="width: <?php echo $cper."%"; ?>;"></div>
                </div></div>

                <div class="card1">
                <strong>Ans : d</strong>
                <span class="pull-right"><?php echo $dper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'dm'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'d'?>" >-</button><button class="button1" onClick="<?php echo 'dp'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>
                <div class="progress progress-success active">
                <div class="bar" style="width: <?php echo $dper."%"; ?>;"></div>
                </div></div>

                <div class="card1">
                <strong>Ans : e</strong>
                <span class="pull-right"><?php echo $eper."%"; ?></span>
                <br>
                <button class="button2" onClick="<?php echo 'em'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'e'?>">-</button>
                <button class="button1" onClick="<?php echo 'ep'.$row["ID"].'()' ?>" id="<?php echo $row["ID"].'a'?>">+</button>  
                <div class="progress progress-warning active">
                <div class="bar" style="width: <?php echo $eper."%"; ?>;"></div>
                </div></div>
                </div>
                <br><br>

                <?php

                  }

                }

                ?>
  