<?php
    session_start();
    set_time_limit(100);
    require_once __DIR__ . '/employee_info.php';   
        
    $user = new employee();

    $user->SetCmd(3);
                
    sleep(5);
    $flag_1 = false;
    $count = 0;
    while(($flag_1 == false) and ($count < 60))
    {
        set_time_limit(10);
        sleep(1);
        $row = $user->getValidUser();
        if ($row != false)
        {
            $info = json_decode($row);
            if($info->id > 0)
            {
                $flag_1 = true;
            }
        } 

        else if($user->CheckCmd() == true)
        {
            $count = 60;
        }
        $count++;
    }

    if($flag_1 == true)
    {
            $_SESSION['id'] = $info->id;
			$_SESSION['position'] = $info->position;
        if($info->position == 1)
        {
            echo "<script type='text/javascript'>location.href = 'member.php';</script>";
        }
        else if($info->position == 2)
        {
            echo "<script type='text/javascript'>location.href = 'supervisor.php';</script>";
        }
        else if($info->position == 3)
        {
            echo "<script type='text/javascript'>location.href = 'manager.php';</script>";
        }
    }
    else
    {     
        $user->SetCmd(0);
        echo "<h2>No Finger detected or invalid user</h2>";
        echo "<p> Click here <a href='../login.html'>here</a> to try again </p>";
    }
?>