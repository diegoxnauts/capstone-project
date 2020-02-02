<?php 
 include_once __DIR__.'/../helpers/mysql.php';
 include_once __DIR__.'/../helpers/helper.php';
 $helper = new Helper();

 // Retrieving the course information
 $db = new Mysql_Driver();
 $db->connect(); 

 // Fetch the background
 $backgroundPath = '../assets/img/General/FAQ.png';
 $tglogoPath = '../assets/img/General/tglogo.png';
 $tgbtnPath = '../assets/img/General/tgbtn.png';
 
 //Fetch FAQs
 $sql = "SELECT * FROM FAQ";
    $faqResults = $db->query($sql);
    $faqResultsArray = [];
    while ($row = $db->fetch_array($faqResults)) {
        $faqResultsArray[] = $row;
    }
//    print_r($faqResultsArray);
//    echo "</br></br>" .$faqResultsArray[0]['question_id'];
    
 $db->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php include $helper->subviewPath('header.php') ?>
<head>
</head>
<main class="faq-wrapper">
    <?php include $helper->subviewPath('navbar.php') ?>
    <div class="main-banner container-fluid" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(<?php echo $backgroundPath ?>);">
                <div class="container">
                    <div class="card flex-row flex-wrap intro">
                        <div class="card-block px-2 justify-content-center" style="float:right; padding-top:50px;">
                            <h1>FAQ</h1>
                            <h3>Here are some frequently asked questions on enrollment</h3>                 
                        </div>
                    </div>
                    <br>
                </div>
            </div>
    </section>

    <section class="faq-content container">
        <div id="myBtnContainer-faq">
            <?php foreach ($faqResultsArray as $key => $row):?>
            <div class="colle">
                <button class="collapsible faq"><b><?php echo $faqResultsArray[$key]['question_text'] ?></b></button>
                <div class="content">
                    <h5><?php echo $faqResultsArray[$key]['question_answer'] ?></h5>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- <div class="row"> 
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4 telegram-button">
                <a class="tg-btn" href="https://t.me/npictoh_bot"><img src="<?php echo $tgbtnPath; ?>" width="70%"/></a>
            </div>
            <div class="col-lg-4">
            </div>
        </div> -->
    </section>
</main>
<script src="<?php echo $helper->jsPath("faq.js") ?>" ></script>
<?php include $helper->subviewPath('footer.php') ?>

</html>