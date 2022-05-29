<?php require APPROOT . '/views/inc/header.php';?>
    <h1><?php echo $data['title']; ?></h1>
    <ul>
        <?php echo "<pre>"; var_dump($data);?>
        <?php foreach($data['posts'] as $post) : ?>
        <li><?php  echo $post->title; ?></li>
        <?php endforeach; ?>
    </ul>
<?php require APPROOT . '/views/inc/footer.php';?>

