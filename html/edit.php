<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>TOTTENHAM</title>
    <link rel="icon" href="../image/logo.png">
    <link rel="apple-touch-icon" href="../image/logo.png">


    <link rel="stylesheet" href="../css/jquery.fullPage.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../js/jquery.fullPage.js"></script>
    <script src="../js/team.js"></script>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/board_style.css">


    
    <!-- 글쓰기 효과 -->
    <link rel="stylesheet" href="https://codepen.io/denic/pen/YzyPzKG">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://codepen.io/denic/pen/YzyPzKG"></script>

    <!--footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


    <!--Font Awesome 스크립트-->
    <script src="https://kit.fontawesome.com/a90a32b376.js" crossorigin="anonymous"></script>

    <!--헤더 폰트-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    

</head>
<body>
    <!-- 헤더 -->
    <section class="header">
        <nav>
            <a href="./team.html">
                <img src="../image/tottenham-logo.svg" alt="logo">
                <div class="nav_links">
                    <ul>
                        <li><a href="./team.html">TEAM</a></li>
                        <li><a href="./player.html">PLAYER</a></li>
                        <li><a href="./stadium.html">STADIUM</a></li>
                        <li><a href="./uniform.html">UNIFORM</a></li>
                        <li><a href="./list.php">BOARD</a></li>
                    </ul>
                </div>
            </a>
        </nav>
    </section>


<!--- 게시글 수정 -->
    <?php
        include "db.php";
    
        $bno = $_GET['idx'];
        $sql = mq("select * from board where idx='$bno';");
        $board = $sql->fetch_array();
    ?>

    <div id="board_write">
            <h1><a href="/">Come On Your Spurs!!</a></h1>
            <h4>글을 수정합니다.</h4>
                <div id="write_area">
                    <form action="modify_ok.php?idx=<?php echo $bno; ?>" method="post">
                        <div id="in_title">
                            <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                        </div>
                        <div class="wi_line"></div>
                        <div id="in_name">
                            <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $board['name']; ?></textarea>
                        </div>
                        <div class="wi_line"></div>
                        <div id="in_content">
                            <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                        </div>
                        <div id="in_pw">
                            <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                        </div>
                        <div class="bt_se">
                            <button type="submit">글 작성</button>
                        </div>
                    </form>
                </div>
            </div>


</body>
</html>