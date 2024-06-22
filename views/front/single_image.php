<main>
    <?php
    if(isset($_SESSION['photo'])){
        $photo=$_SESSION['photo'];
        $user=new User();
        $user->select_user();
        $where=[
          'id'=>$photo['user_id']
        ];
        $user->where($where);
        $author=$user->query();
?>
        <div class="single_page">
            <div class="single_content">
                <div class="information">
               <h1 class="single_title">
<?=$photo['title'] ?>
               </h1>
                <div class="info">
                <h3 class="photo_author">By: <strong><?= $author['name'] ?></strong></h3>
                    <p class="single_author">
                        Created on: <?= date('D, d M Y', strtotime($photo['created_at'])) ?>
                    </p>
                    <p class="single_author">
                        Last edited on: <?= date('D, d M Y', strtotime($photo['updated_at'])) ?>
                    </p>
                    <p class="single_author">
                    Description: <?=$photo['description'] ?>
                </p>
                </div>
                </div>
                <div class="empty_tools_info">
                    <a href="/front/add_image" class="add_photo_link">Add yours !</a>
                    <a href="/front/home" class="add_photo_link">Explore</a>
                </div>
            </div>
            <div class="single_content">
                <img src="../assets/user/photos/<?= $photo['image'] ?>" alt="Image" class="single_image_block">
            </div>
        </div>
 <?php   }
    else{?>
        <div class="empty_content">
            <span id="emptyphotos" target="_blank">Image Not found</span>
        </div>
        <div class="empty_tools">
            <a href="/front/add_photo" class="add_photo_link">Add yours !</a>
            <a href="/front/home" class="add_photo_link">Explore</a>
        </div>
   <?php  }
    ?>
</main>