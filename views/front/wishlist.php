<main>
    <?php
    if (isset($view['params']['photos'])) {
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
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $like = new Like();
                        $like->select_like();
                        $paramlike = [
                            'photo_id' => $photo['id'],
                            'user_id' => $_SESSION['user_id']
                        ];
                        $like->where($paramlike);
                        if (!$like->query()) {
                            ?>
                            <button class="like" style="display: block" type="button"
                                    id="likebtnid_<?= $photo['id'] ?>" onclick="like(<?= $photo['id'] ?>)"><img
                                        src="../assets/front/img/unliked.png" alt="unliked">
                            </button>
                            <button class="like" style="display: none" type="button"
                                    id="unlikebtnid_<?= $photo['id'] ?>" onclick="unlike(<?= $photo['id'] ?>)"><img
                                        src="../assets/front/img/liked.png" alt="liked">
                            </button>
                        <?php } else {
                            ?>
                            <button class="like" style="display: none" type="button"
                                    id="likebtnid_<?= $photo['id'] ?>" onclick="like(<?= $photo['id'] ?>)"><img
                                        src="../assets/front/img/unliked.png" alt="unliked">
                            </button>
                            <button class="like" style="display: block" type="button"
                                    id="unlikebtnid_<?= $photo['id'] ?>" onclick="unlike(<?= $photo['id'] ?>)"><img
                                        src="../assets/front/img/liked.png" alt="liked">
                            </button>
                        <?php }
                    } else { ?>
                        <a href="/front/auth">
                            <button class="like" style="display: block" type="button"
                                    id="likebtnid_<?= $photo['id'] ?>" onclick="like(<?= $photo['id'] ?>)"><img
                                        src="../assets/front/img/unliked.png" alt="unliked">
                            </button>
                        </a>
                    <?php } ?>
                    <a href="/front/single_image/<?=$photo['id']?>"> <img class="animation_image"  src="../assets/user/photos/<?= $photo['image'] ?>" alt="photo"></a>
                </div>
                <div class="info-block">
                    <h2><strong class="photo_title"><?= $photo['title'] ?></strong></h2>
                    <p class="photo_author">By: <strong><?= $author['name'] ?></strong></p>
                </div>
            </div>
        <?php }?>
        </div>
        <?php if (count($photos) > 4) {
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
