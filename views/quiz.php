<?php 
    include_once __DIR__.'/../helpers/helper.php';
    $helper = new Helper();
?>

<!DOCTYPE html>
<html lang="en">
    <?php include $helper->subviewPath('navbar.php')?>
    <?php include $helper->subviewPath('header.php') ?>
    <main class="container">
        <h1>Course Quiz! Discover the right course for you</h1>
    </main>
    <?php include $helper->subviewPath('footer.php') ?>

</html>