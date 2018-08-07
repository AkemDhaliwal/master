<?php
session_start();

        $position  = $_SESSION['position'];

        if($position = 1)
        {
            	echo '<b>Position : </b>Operator';
        }
        else if($position = 2)
        {
            	echo '<b>Position :</b>Supervisor';
        }
        else if($position = 3)
        {
            	echo '<b>Position : </b>Manager';
        }
?>