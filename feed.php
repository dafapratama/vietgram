<?php
    session_start();

    if(!isset($_SESSION['username']) == true){
        header("location: index.php");
    }

    include_once('db.php');
    
    $sql = "SELECT * FROM photo";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
               
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <form action="feed.php" method="get">
                <input type="text" name="caption" placeholder="Search">
            </form>
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="feed">
        <?php
        if(!isset($_GET['caption'])){
            while($row = mysqli_fetch_assoc($result)){?>
            <div class="photo">
                <header class="photo__header">
                    <img src="images/avatar.jpg" class="photo__avatar" />
                    <div class="photo__user-info">
                        <span class="photo__author"><?php echo $row['username'] ?></span>
                        <span class="photo__location">Bestechung</span>
                    </div>
                </header>
                <img src="<?php echo $row['url'] ?>" />
                <div class="photo__info">
                    <div class="photo__actions">
                        <span class="photo__action">
                            <i class="fa fa-heart-o fa-lg"></i>
                        </span>
                        <span class="photo__action">
                            <i class="fa fa-comment-o fa-lg"></i>
                        </span>
                    </div>
                    <span class="photo__likes"><?php echo $row['likes'] ?> likes</span>
                    <div class="photo__caption"><?php echo $row['caption'] ?></div><br>
                    <ul class="photo__comments">
                        <li class="photo__comment">
                            <span class="photo__comment-author"><?php echo $row['username'] ?></span> love this!
                        </li>
                        <li class="photo__comment">
                            <span class="photo__comment-author"><?php echo $row['username'] ?></span> love this!
                        </li>
                        <li class="photo__comment">
                            <span class="photo__comment-author"><?php echo $row['username'] ?></span> love this!
                        </li>
                        <li class="photo__comment">
                            <span class="photo__comment-author"><?php echo $row['username'] ?></span> love this!
                        </li>
                    </ul>
                    <span class="photo__time-ago">2 hours ago</span>
                    <div class="photo__add-comment-container">
                        <textarea name="comment" placeholder="Add a comment..."></textarea>
                        <i class="fa fa-ellipsis-h"></i>
                    </div>
                </div>
            </div>
        <?php }}
        else{
            $caption = $_GET['caption'];
            $sql = "SELECT * FROM photo WHERE caption like'%$caption%'";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)){ 
        ?>
        <div class="photo">
            <header class="photo__header">
                <img src="images/avatar.jpg" class="photo__avatar" />
                <div class="photo__user-info">
                    <span class="photo__author"><?php echo $row['username'] ?></span>
                    <span class="photo__location">Bestechung</span>
                </div>
            </header>
            <img src="<?php echo $row['url'] ?>" />
            <div class="photo__info">
                <div class="photo__actions">
                    <span class="photo__action">
                            <i class="fa fa-heart-o fa-lg"></i>
                        </span>
                    <span class="photo__action">
                            <i class="fa fa-comment-o fa-lg"></i>
                        </span>
                </div>
                <span class="photo__likes"><?php echo $row['likes'] ?> likes</span>
                <div class="photo__caption"><?php echo $row['caption'] ?></div><br>
                <ul class="photo__comments">
                    <li class="photo__comment">
                        <span class="photo__comment-author"><?php echo $row['username'] ?></span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author"><?php echo $row['username'] ?></span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author"><?php echo $row['username'] ?></span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author"><?php echo $row['username'] ?></span> love this!
                    </li>
                </ul>
                <span class="photo__time-ago">2 hours ago</span>
                <div class="photo__add-comment-container">
                    <textarea name="comment" placeholder="Add a comment..."></textarea>
                    <i class="fa fa-ellipsis-h"></i>
                </div>
            </div>
        </div>
    <?php }}
    ?>
    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>