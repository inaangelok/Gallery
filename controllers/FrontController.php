<?php
include_once('../vendor/controller/Controller.php');
include_once('../vendor/controller/Session.php');
include_once('../models/User.php');
include_once('../models/Photo.php');
include_once('../models/Like.php');
$session=new Session();
//$session->delete('message');
class FrontController extends Controller
{
    public $view = [
        'link' => '',
        'params' => []
    ];

    public function home()
    {
        if (isset($_SESSION['user_id'])) {
            $usr = new User();
            $usr->select_user();
            $param = [
                'id' => $_SESSION['user_id']
            ];
            $usr->where($param);
            $this->view['params']['user'] = $usr->query();

            $like = new Like();
            $like->select_all('liked');
            $where = [
                'user_id' => $_SESSION['user_id']
            ];
            $like->where($where);
            $this->view['params']['likes'] = $like->query_all();
        }
        $photo = new Photo();
        $photo->select_all('photos');
        $this->view['params']['photos'] = $photo->query_all();


        $this->view['link'] = 'layouts/header';
        $this->view($this->view);
        $this->view['link'] = 'front/home';
        $this->view($this->view);
//        var_dump($this->view['params']['photos']);die();
        $this->view['link'] = 'layouts/footer';
        $this->view($this->view);


    }

    public function auth()
    {
        $session = new Session();

        $this->view['link'] = 'auth/auth';
        $this->view($this->view);
    }

    public function add_image()
    {
        if (isset($_SESSION['user_id'])) {
            $usr = new User();
            $usr->select_user();
            $param = [
                'id' => $_SESSION['user_id']
            ];
            $usr->where($param);
            $this->view['params']['user'] = $usr->query();

            $like = new Like();
            $like->select_all('liked');
            $where = [
                'user_id' => $_SESSION['user_id']
            ];
            $like->where($where);
            $this->view['params']['likes'] = $like->query_all();
            $this->view['link'] = 'layouts/header';
            $this->view($this->view);
            $this->view['link'] = 'user/add_image';
            $this->view($this->view);
//        var_dump($this->view['params']['photos']);die();
            $this->view['link'] = 'layouts/footer';
            $this->view($this->view);
        }

       else{

           $this->view['link'] = 'auth/auth';
           $this->view($this->view);

       }
    }

    public function my_photos()
    {
        if (isset($_SESSION['user_id'])) {
            $usr = new User();
            $usr->select_user();
            $param = [
                'id' => $_SESSION['user_id']
            ];
            $usr->where($param);
            $this->view['params']['user'] = $usr->query();

            $like = new Like();
            $like->select_all('liked');
            $where = [
                'user_id' => $_SESSION['user_id']
            ];
            $like->where($where);
            $this->view['params']['likes'] = $like->query_all();

            $photo = new Photo();
            $photo->select_all('photos');
            $where1=[
                'user_id'=>$_SESSION['user_id']
            ];
            $photo->where($where1);
            $this->view['params']['photos'] = $photo->query_all();

            $this->view['link'] = 'layouts/header';
            $this->view($this->view);
            $this->view['link'] = 'front/my_photos';
            $this->view($this->view);
//            var_dump($this->view['params']['photos']);
//        var_dump($this->view['params']['photos']);die();
            $this->view['link'] = 'layouts/footer';
            $this->view($this->view);
        }


    else{

        $this->view['link'] = 'auth/auth';
        $this->view($this->view);

    }
    }

    public function wishlist(){
        if (isset($_SESSION['user_id'])) {
            $usr = new User();
            $usr->select_user();
            $param = [
                'id' => $_SESSION['user_id']
            ];
            $usr->where($param);
            $this->view['params']['user'] = $usr->query();

            $like = new Like();
            $like->select_all('liked');
            $where = [
                'user_id' => $_SESSION['user_id']
            ];
            $like->where($where);
            $likes=$this->view['params']['likes'] = $like->query_all();

            $photo =new Photo();
            $photos=[];

            if(count($likes)!=0){
                foreach ($likes as $single){
                    $photo->select_photo();
                    $where2=[
                      'id'=>$single['photo_id']
                    ];
                    $photo->where($where2);
                    if($photo->query()){
                        $photos[]=$photo->query();

                    }
                }
                $this->view['params']['photos']=$photos;
            }

            $this->view['link'] = 'layouts/header';
            $this->view($this->view);
            $this->view['link'] = 'front/wishlist';
            $this->view($this->view);
//        var_dump($this->view['params']['photos']);die();
            $this->view['link'] = 'layouts/footer';
            $this->view($this->view);
        }
        else{

            $this->view['link'] = 'auth/auth';
            $this->view($this->view);

        }

    }

    public function single_image($id){
        $photo=new Photo();
        $photo->select_photo();
        $where=[
          'id'=>$id
        ];
        $photo->where($where);
        $_SESSION['photo']=$photo->query();

        header('location:/front/single');

    }

    public function single(){
        $this->view['link'] = 'layouts/header';
        $this->view($this->view);
        $this->view['link'] = 'front/single_image';
        $this->view($this->view);
        $this->view['link'] = 'layouts/footer';
        $this->view($this->view);
    }

    public function update_image($id)
    {
        if (isset($_SESSION['user_id'])) {
            $usr = new User();
            $usr->select_user();
            $param = [
                'id' => $_SESSION['user_id']
            ];
            $usr->where($param);
            $this->view['params']['user'] = $usr->query();

            $like = new Like();
            $like->select_all('liked');
            $where = [
                'user_id' => $_SESSION['user_id']
            ];
            $like->where($where);
            $this->view['params']['likes'] = $like->query_all();
            $photo=new Photo();
            $photo->select_photo();
            $where=[
                'id'=>$id
            ];
            $photo->where($where);
            $_SESSION['photo']=$photo->query();

            header('location:/front/update_page');

        }

        else{
            $this->view['link'] = 'auth/auth';
            $this->view($this->view);
        }
    }
    public function update_page(){
        $this->view['link'] = 'layouts/header';
        $this->view($this->view);
        $this->view['link'] = 'user/update_image';
        $this->view($this->view);
        $this->view['link'] = 'layouts/footer';
        $this->view($this->view);
    }
}