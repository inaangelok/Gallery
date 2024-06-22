<?php
include_once('../vendor/controller/Controller.php');
include_once('../vendor/controller/Session.php');
include_once('../models/Like.php');
$session = new Session();

class LikeController extends Controller
{
    public function like($id)
    {
//         var_dump($id);die();
        $like = new Like();
        $params = [
            'user_id' => $_SESSION['user_id'],
            'photo_id' => intval($id)
        ];
        $like->create_like($params);


        $where = [
            'user_id' => $_SESSION['user_id']
        ];
        $like->select_all('liked');
        $like->where($where);
        $likes = count($like->query_all());
        echo json_encode($likes);
    }

    public function unlike($id)
    {
        $like = new Like();
        $like->delete_like();
        $params = [
            'user_id' => $_SESSION['user_id'],
            'photo_id' => $id
        ];
        $like->where($params);
        $like->query_update();

        $where = [
            'user_id' => $_SESSION['user_id']
        ];
        $like->select_all('liked');
        $like->where($where);
        $likes = count($like->query_all());
        echo json_encode($likes);
    }
}