<main>
    <form action="/photo/add" method="post" enctype="multipart/form-data" class="add_form">

        <div class="top-part">
            <h3 class="add_page_title">
                Add Photo
            </h3>
            <div class="form-btn-group">
                <button class="primary" type="submit">Save</button>
                <button class="secondary" type="reset">Clear</button>

            </div>
        </div>
        <?php if(isset($_SESSION['message'])){?>
            <span class="message_add"><?=$_SESSION['message']?></span>
        <?php }?>
        <div class="uploadOuter">
            <label for="uploadFile" class="primary">Upload Image</label>
            <strong>OR</strong>
            <span class="dragBox">
  Darg and Drop image here
<input name="image" type="file" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile"/>
</span>
        </div>
        <div class="inputs_add">
            <input type="text" name="title" placeholder="Title">
            <input type="text" name="description" placeholder="Describe in two words">
        </div>
        <div id="preview"></div>
    </form>

</main>