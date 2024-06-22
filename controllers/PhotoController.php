<?php
include_once('../vendor/controller/Controller.php');
include_once('../vendor/controller/Session.php');
include_once('../models/Photo.php');
include_once('../models/Like.php');
$session = new Session();

class PhotoController extends Controller
{
    public function delete($id)
    {
        $like=new Like();
        $like->select_all('liked');
        $where = [
            'photo_id' => $id
        ];
        $like->where($where);
        $likes=$like->query_all();
        foreach ($likes as $liked){
            $like->delete_like();
            $where2 = [
                'id' => $liked['id']
            ];
            $like->where($where2);
            $like->query_update();
        }

        $photo = new Photo();
        $photo->delete_photo();
        $params = [
            'id' => $id
        ];
        $photo->where($params);
        $photo->query_update();

        header('location:/front/my_photos');
        exit();
    }
    public function add(){
        $session = new Session();
//        $session->delete('message');

//        var_dump($_POST);
//        var_dump($_FILES);
        $title=$_POST['title'];
        $description=$_POST['description'];

        if($title=='' or $description=='' or $_FILES['image']['name']==''){
            $session->insert('message','Fill all the data');
            header('location:/front/add_image');
        }
        else{
            $target_dir = "assets/user/photos/";
            $fl_name=time().$_FILES["image"]["name"];
            $target_file = $target_dir . basename($fl_name);
            move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
            $img= basename($fl_name);

            $params=[
              'user_id'=>$_SESSION['user_id'],
              'title'=>$title,
              'description'=>$description,
              'image'=>$fl_name
            ];
            $photo=new Photo();
            $photo->create_photo($params);
            $session->insert('message','Photo published successfully.');
            header('location:/front/add_image');
        }
    }

    public function update(){
        $session = new Session();
        $session->delete('message');

//        var_dump($_POST);
//        var_dump($_FILES);
        $title=$_POST['title'];
        $description=$_POST['description'];

        if($title=='' or $description==''){
            $session->insert('message','Fill all the data');
            header('location:/front/add_image');
        }
        else{
            $params=[
                'title'=>$title,
                'description'=>$description,
            ];
            $photo=new Photo();
            $photo->update_photo($params);
            $where=[
                'id'=>$_POST['id']
            ];
            $photo->where($where);
            $photo->query_update();
            $session->insert('message','Photo updated successfully.');
            header('location:/front/update_image/'.$_POST['id']);
        }
    }
}