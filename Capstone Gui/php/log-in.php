<?php
    session_start();
    set_time_limit(100);
    require_once __DIR__ . '/employee_info.php';   
        
    $user = new employee();
                
    sleep(5);
    $id = 0;
    $flag_1 = false;
    $count = 0;
    while(($flag_1 == false) and ($count < 40))
    {
        set_time_limit(10);
        sleep(1);
        $id = $user->getValidUser();
        if($id > 0)
        {
            $flag_1 = true;
        }
        else if($user->CheckCmd() == true)
        {
            $count = 40;
        }
        echo $count;
        $count++;
    }

    if($flag_1 == true)
    {
            $_SESSION['username']=$id;
			$_SESSION['password']=$id;
			echo "<p> You are logged in. </p>";
			echo "<p> Please click <a href='member.php'> here</a></p>";
    }
    else
    {     
        echo "<h2>No Finger detected or invalid user</h2>";
        echo "<p> Click here <a href='../login.html'>here</a> to try again </p>";
    }
?>