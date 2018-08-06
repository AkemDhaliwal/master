<?php
    session_start();

    require_once __DIR__ . '/employee_info.php';
		
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position  = $_POST['position'];    
        
    $user = new employee();
        
    $user->setname($name);
    
    $check = $user->CheckName($id);
	            
    if( $check != null)
    {
        echo "<h2>This Employee id(".$id.") is alredy registered to ".$check.".</h2>";
        echo "<p> Please check the id and try again, Click here <a href='../Sign-up.html'>here</a> to try again </p>";
    }
    else
    {
        $user->setInfo($id, $name, $position);
        $user->SetCmd(2);
        sleep(5);

        $flag_1 = false;
        $count = 0;
        while(($flag_1 == false) and ($count < 40))
        {
            set_time_limit(10);
            sleep(1);
            $flag_1 = $user->CheckFingerInfo($id);
            if($user->CheckCmd() == true)
            {
                $count = 40;
            }
            $count++;
        }

        if($flag_1 == true)
        {
            echo"<script>
                window.location.href = '../login.html';
                </script>";
        }
        else
        {     
            $user->deleteLastEntry($id);
            $user->SetCmd(0);
            echo "<h2>No Finger detected</h2>";
            echo "<p> Click here <a href='../Sign-up.html'>here</a> to try again </p>";
        }
    }
?>