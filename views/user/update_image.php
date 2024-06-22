<main>
    <?php
    $photo=$_SESSION['photo'];
    ?>
    <form action="/photo/update" method="post" enctype="multipart/form-data" class="add_form">

        <div class="top-part">
            <h3 class="add_page_title">
                Update Photo
            </h3>
            <div class="form-btn-group">
                <button class="primary" type="submit">Save</button>
<!--                <button class="secondary" type="reset">Clear</button>-->

            </div>
        </div>
        <?php if(isset($_SESSION['message'])){?>
            <span class="message_add"><?=$_SESSION['message']?></span>
        <?php }?>

        <div class="inputs_add">
            <input type="text" name="id" hidden value="<?=$photo['id']?>">
            <input type="text" name="title" placeholder="Title" value="<?=$photo['title']?>">
            <input type="text" name="description" placeholder="Describe in two words" value="<?=$photo['description']?>">
        </div>
        <div id="preview"></div>
        <div class="image_update_block">
            <img src="../assets/user/photos/<?=$photo['image']?>" alt="image">
        </div>
    </form>

</main>