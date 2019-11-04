<?php 
    include_once __DIR__.'/helpers/mysql.php';
    include_once __DIR__.'/helpers/helper.php';
    
    $helper = new Helper();

    // Retrieving the course details
    $db = new Mysql_Driver();
    $db->connect();

    $sql = "SELECT * FROM Course";
    $result = $db->query($sql);
    
    $result2 = $db->query($sql);

    $result3 = $db->query($sql);

    $db->close();

    $img = "https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80";


?>
<!DOCTYPE html>


<html lang="en">
    <?php include $helper->subviewPath('header.php') ?>
    <a href="" id="floatingBtn"><h5 id="floatingBtnTxt" style="font-size:0.7vw;"></h5></a>
    <main>
        <div id="fullpage">
            <div class="section fp-scrollable" id="section0">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <?php while ($row = $db->fetch_array($result)): ?>
                            <div class="col-xs-6 col-md-4 ">
                                <div class="card text-center course-card">
                                    <img class="img-fluid" src="<?php echo $img ?>" alt="Course Image">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size:1.1vw"><?php echo $row['course_name'] ?></h5>
                                        <h6 class="card-subtitle" style="font-size:0.6vw">(<?php echo $row['course_id'] ?>)</h6>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                    </div>
                </div>
            </div>
 
            <?php 
            while ($row1 = $db->fetch_array($result2)): 
            ?>
                    <div class="section" id="<?php echo 'section-' . $row1['id']?>">
                    <div class="slide" id="<?php echo 'slide1-' . $row1['id']?>">
                    <div class="intro">
                        <h1 style="color:white;"><?php echo $row1['course_name'] ?></h1></div>
                        <p style="color:white;"><?php echo $row1['course_short_description'] ?></p>
                    </div>
                    <div class="container">
                        <div class="slide" id="<?php echo 'slide2-' . $row1['id']?>"><p><?php echo $row1['course_description'] ?></p></div>
                        <div class="slide" id="<?php echo 'slide3-' . $row1['id']?>"><h1><?php echo $row1['course_requirements'] ?></h1></div>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="section" id="section1">
                <div class="slide" id="slide1">
                    <div class="intro">
                        <h1 style="color:white;">Quiz</h1></div>
                    </div>
            </div>
        </div>
    </main>

    <?php include $helper->subviewPath('footer.php') ?>

</html>