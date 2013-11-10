<?php
	require_once("header.php");
      	require_once("connectdb.php");
?>
	<div style="position:relative;">
		<div style= position:absolute;top:0px;width=800;height=40; " >
			<p style="position:absolute;top:10px;left:25px;"> Ylika </p>
                        
                    <div style=position:relative;top:55px;width=800;height=40; ">
                          <?php


                              $result = mysql_query("SELECT * FROM YLIKA" ); 
                              echo '<ul>' ;
                                    while($row = mysql_fetch_array($result))
                                     {
                                        echo '<li>' . $row['NAME']. ' - <a href="delete_ulika.php?id='.$row['ID'].'">x</a>  <a href="edit_ulika.php?id='.$row['ID'].'">e</a> </li>' ;
                                        
                               
                                      }   
                              echo '</ul>' ;

                          ?>
                    </div>


               </div>

                  

                 <div style="position:absolute;top:0px;width=800;height=40;"> 
			<p style="position:absolute;top:10px;left:368px;"> Idiotites</p>
                        
                          <div style="position:absolute;left:344px;top:55px;">
                            <?php
                              
                              $result2 = mysql_query("SELECT * FROM IDIOTITES" ); 
                              echo '<ul>';
			      	    while($row = mysql_fetch_array($result2))
 				     { 
    					echo '<li>'. $row['NAME'] . ' - <a href="delete_idiotites.php?id='.$row['ID'].'">x</a> <a href="edit_idiotites.php?id='.$row['ID'].'">e</a> </li>';
    					
 				     }
                              echo '</ul>'

			     ?> 
                                                             
                   
                        </div>
                </div>
		</div>
<?php
	require_once("footer.php");
?>
