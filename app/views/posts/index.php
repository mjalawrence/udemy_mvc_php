<?php require APPROOT . '/views/inc/header.php';?>
   <div class="row mb-3">
       <div class="col-md-6">
           <h1>Posts</h1>
       </div>
       <div class="col-md-6">
           <a href="<?php echo URLROOT; ?>index.php?url=posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i>Add Post
           </a>
       </div>
   </div>
    <div>
        <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3 ">
            <h4 class="card-title "><?php echo $post->title; ?><h4>
            <div class="p-2 mb-3" style="font-size:0.5em">
                Posted by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
            </div>
            <p class="card-text mb-3 bg-light"><?php echo $post->post_body; ?></p>
            <a href="<?php echo URLROOT; ?>index.php?url=posts/show/<?echo $post->postId; ?>" class="btn btn-dark">Read More<a>
        </div>
        <?php endforeach ?>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>