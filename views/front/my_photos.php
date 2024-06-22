<main>
    <?php
    if (isset($view['params']['photos']) and count($view['params']['photos'])!=0) {
        $photos = $view['params']['photos'];
        ?>
        <div class="gallery">
            <?php
            foreach ($photos as $photo) {
                $user = new User();
                $user->select_user();
                $param = [
                    'id' => $photo['user_id']
                ];
                $user->where($param);
                $author = $user->query();

                ?>

                <div class="photo-block" id="photo_id<?= $photo['id'] ?>">
                    <div class="top-block">
                        <div class="toolbar">
                            <button class="tool" type="button"
                                    id="delete_<?= $photo['id'] ?>"><a href="/photo/delete/<?= $photo['id'] ?>"><img
                                            src="../assets/front/img/trash.png" alt="unliked"></a>
                            </button>
                            <button class="tool" type="button"
                                    id="download_<?= $photo['id'] ?>"><a
                                        href="../assets/user/photos/<?= $photo['image'] ?>" download=""><img
                                            src="../assets/front/img/download.png" alt="unliked"></a>
                            </button>
                            <button class="tool" type="button"
                                    id="edit_<?= $photo['id'] ?>"> <a href="/front/update_image/<?= $photo['id'] ?>"><img
                                        src="../assets/front/img/update.png" alt="unliked"></a>
                            </button>
                        </div>
                        <a href="/front/single_image/<?=$photo['id']?>"> <img class="animation_image"  src="../assets/user/photos/<?= $photo['image'] ?>" alt="photo"></a>
                    </div>
                    <div class="info-block">
                        <h2><strong class="photo_title"><?= $photo['title'] ?></strong></h2>
                        <p class="photo_author">By: <strong><?= $author['name'] ?></strong></p>
                    </div>
                </div>
            <?php }?>

        </div>
 <?php   if (count($photos) > 4) {
    ?>
    <div class="control-btns">
        <div class="prev" id="prevpaginate">
            <button class="controlbtn" type="button" onclick="paginate(-4)"><img
                        src="../assets/front/img/prev.png"
                        alt="Prev">Prev Page
            </button>
        </div>
        <div class="prev" id="nextpaginate">
            <button class="controlbtn" onclick="paginate(4)">Next Page<img
                        src="../assets/front/img/next.png"
                        alt="Prev"></button>
        </div>
    </div>
    <?php } ?>
    <?php } else { ?>
        <div class="empty_content">
            <span id="emptyphotos" target="_blank">No photos to show.</span>
        </div>
        <div class="empty_tools">
            <a href="/front/add_image" class="add_photo_link">Add yours !</a>
            <a href="/front/home" class="add_photo_link">Explore</a>
        </div>
    <?php } ?>
</main>
