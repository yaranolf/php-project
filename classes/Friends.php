<?php

class Friends
{
    public static function renderFriendship($user_one, $user_two, $type)
    {
        if (!empty($user_one) && !empty($user_two)) {
            global $pdo;
            //rendering buttons
            switch ($type) {
                case 'isThereRequestPending':
                    $statement = $pdo->prepare("SELECT * FROM friends WHERE user_one='".$user_one."' AND user_two='".$user_two."' AND friendship_official='0' OR user_one='".$user_two."' AND user_two='".$user_one."' AND friendship_official='0'");
                    $statement->execute();

                    return $statement->rowCount();
                    break;
                case 'isThereFriendShip':
                    $statement = $pdo->prepare("SELECT * FROM friends WHERE user_one='".$user_one."' AND user_two='".$user_two."' AND friendship_official='1' OR user_one='".$user_two."' AND user_two='".$user_one."' AND friendship_official='1'");
                    $statement->execute();

                    return $statement->rowCount();
                    break;
            }
        }
    }

    public static function add($uid, $user_two)
    {
        if (!empty($uid) && !empty($user_two)) {
            global $pdo;
            $response = array();

            $uid = (int) $uid;
            $user_two = (int) $user_two;

            if ($uid != $user_two) {
                $f = new Friends();
                $check = $f->renderFriendShip($uid, $user_two, 'isThereFriendShip');

                if ($check == 0) {
                    $insert = $pdo->prepare("INSERT INTO friends VALUES('','".$uid."', '".$user_two."', '0', now())");
                    $insert->execute();

                    $response['code'] = 1;
                    $response['msg'] = 'Request sent!';
                    echo json_encode($response);

                    return false;
                } else {
                    $response['code'] = 0;
                    $response['msg'] = 'Already friends!';
                    echo json_encode($response);

                    return false;
                }
            } else {
                $response['code'] = 0;
                $response['msg'] = "You can't friend yourself!";
                echo json_encode($response);

                return false;
            }
        }
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>