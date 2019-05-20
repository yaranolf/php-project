<?php

class Friends
{
    public static function renderFriendship($user_one, $user_two, $type)
    {
        if (!empty($user_one) && !empty($user_two)) {
            $pdo = Db::getInstance();

            //rendering buttons
            switch ($type) {
                case 'isThereRequestPending':
                    $statement = $pdo->prepare("SELECT * FROM friends WHERE (user_one='".$user_two."' AND user_two='".$user_one."' AND official='0')");
                    $statement->execute();

                    return $statement->rowCount();
                    break;
                case 'isThereFriendShip':
                    $statement = $pdo->prepare("SELECT * FROM friends WHERE (user_one='".$user_one."' AND user_two='".$user_two."' AND official='1') OR (user_one='".$user_two."' AND user_two='".$user_one."' AND official='1')");
                    $statement->execute();

                    return $statement->rowCount();
                    break;

                case 'isThereApprovalPending':
                    $statement = $pdo->prepare("SELECT * FROM friends WHERE (user_one='".$user_one."' AND user_two='".$user_two."' AND official='0')");
                    $statement->execute();

                    return $statement->rowCount();
                    break;
            }
        }
    }

    public static function add($uid, $user_two)
    {
        if (!empty($uid) && !empty($user_two)) {
            $pdo = Db::getInstance();

            $response = array();

            $uid = (int) $uid;
            $user_two = (int) $user_two;
            // echo $uid.$user_two;
            if ($uid != $user_two) {
                $f = new Friends();
                $check = $f->renderFriendShip($uid, $user_two, 'isThereFriendShip');
                // echo $check;
                if ($check == 0) {
                    $friendrequested = 0;
                    $friendshipdate = date('y-m-d');
                    // $insert = $pdo->prepare("INSERT INTO friends VALUES('','".$uid."', '".$user_two."', '0', now())");
                    $statement = $pdo->prepare('INSERT INTO friends (user_one, user_two, official, date_made) VALUES(:user1, :user2, :friendrequested, :datemade)');
                    $statement->bindParam(':user1', $uid);
                    $statement->bindParam(':user2', $user_two);
                    $statement->bindParam(':friendrequested', $friendrequested);
                    $statement->bindParam(':datemade', $friendshipdate);

                    $statement->execute();

                    $response['code'] = 1;
                    $response['msg'] = 'Request sent!';
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

    public static function approve($uid, $user_two)
    {
        if (!empty($uid) && !empty($user_two)) {
            $pdo = Db::getInstance();

            $response = array();

            $uid = (int) $uid;
            $user_two = (int) $user_two;
            // echo $uid.$user_two;
            if ($uid != $user_two) {
                $f = new Friends();
                // $check = $f->renderFriendShip($uid, $user_two, 'isThereFriendShip');
                // echo $check;
                //if ($check == 0) {
                // $insert = $pdo->prepare("INSERT INTO friends VALUES('','".$uid."', '".$user_two."', '0', now())");
                $statement = $pdo->prepare('UPDATE friends SET official = 1 WHERE (user_one = :user2 AND user_two = :user1)');
                $statement->bindParam(':user1', $uid);
                $statement->bindParam(':user2', $user_two);

                $statement->execute();

                $response['code'] = 1;
                $response['msg'] = 'Approved!';
            //header('Content-Type: application/json');
                   // echo json_encode(array('code' => '1', 'msg' => 'Request sent!'));

                // return false;
               /* } else {
                    $response['code'] = 0;
                    $response['msg'] = 'Already friends!';
                    echo json_encode($response);

                    return false;
                }*/
            } else {
                $response['code'] = 0;
                $response['msg'] = "You can't friend yourself!";
                echo json_encode($response);

                return false;
            }
        }
    }

    public static function destroy($uid, $user_two)
    {
        if (!empty($uid) && !empty($user_two)) {
            $pdo = Db::getInstance();
            $response = array();
            $uid = (int) $uid;
            $user_two = (int) $user_two;
            // echo $uid.$user_two;
            if ($uid != $user_two) {
                $f = new Friends();
                $statement = $pdo->prepare('DELETE FROM friends WHERE (user_one = :user1 AND user_two = :user2) OR (user_one = :user2 AND user_two = :user1)');
                $statement->bindParam(':user1', $uid);
                $statement->bindParam(':user2', $user_two);

                $statement->execute();
            } else {
                $response['code'] = 0;
                $response['msg'] = "You can't friend yourself!";
                echo json_encode($response);

                return false;
            }
        }
    }

    public static function getFriends($uid)
    {
        if (!empty($uid)) {
            $conn = Db::getInstance();
            $result = $conn->prepare("SELECT * FROM friends WHERE (user_one = :userid) OR (user_two = :userid) AND official = '1'");
            $result->bindParam(':userid', $uid);
            $result->execute();

            return $result->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}
