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

<?php
    include "db.php";
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
?>

    <div id="board_area"> 
    <h1>Come On Your Spurs!!</h1>
    <h4>우리팀을 응원하는 글을 자유롭게 작성해주세요.</h4>
        <table class="list-table">
        <thead>
            <tr>
                <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="100">작성일</th>
                    <th width="100">조회수</th>
                </tr>
            </thead>
                <?php
                if(isset($_GET['page'])){
                $page = $_GET['page'];
                    }else{
                    $page = 1;
                    }
                    $sql = mq("select * from board");
                    $row_num = mysqli_num_rows($sql); 
                    $list = 5; 
                    $block_ct = 5; 

                    $block_num = ceil($page/$block_ct); 
                    $block_start = (($block_num - 1) * $block_ct) + 1; 
                    $block_end = $block_start + $block_ct - 1; 

                    $total_page = ceil($row_num / $list);
                    if($block_end > $total_page) $block_end = $total_page; 
                    $total_block = ceil($total_page/$block_ct); 
                    $start_num = ($page-1) * $list; 

                    $sql2 = mq("select * from board order by idx desc limit $start_num, $list");  
                    while($board = $sql2->fetch_array()){
                    $title=$board["title"]; 
                        
                        $sql3 = mq("select * from reply where con_num='".$board['idx']."'");
                        $rep_count = mysqli_num_rows($sql3);
                    ?>

            <tbody>
            <tr>
            <td width="70"><?php echo $board['idx']; ?></td>
            <td width="500"><?php 
            $lockimg = "<img src='lock.png' alt='lock' title='lock' with='14' height='14' />";
            if($board['lock_post']=="1")
            { ?><a href='ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
                }else{  ?>
            <a href='view.php?idx=<?php echo $board["idx"]; ?>'><?php echo $title; }?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a></td>
            <td width="120"><?php echo $board['name']?></td>
            <td width="100"><?php echo $board['date']?></td>
            <td width="100"><?php echo $board['hit']; ?></td>
            </tr>
        </tbody>
        <?php } ?>
        </table>
        <div id="page_num">
        <ul>
            <?php
            if($page <= 1)
            { 
                echo "<li class='fo_re'>처음</li>"; 
            }else{
                echo "<li><a href='?page=1'>처음</a></li>"; 
            }
            if($page <= 1)
            { 
                
            }else{
            $pre = $page-1; 
                echo "<li><a href='?page=$pre'>이전</a></li>"; 
            }
            for($i=$block_start; $i<=$block_end; $i++){ 
                if($page == $i){ 
                echo "<li class='fo_re'>[$i]</li>"; 
                }else{
                echo "<li><a href='?page=$i'>[$i]</a></li>"; 
                }
            }
            if($block_num >= $total_block){ 
            }else{
                $next = $page + 1; 
                echo "<li><a href='?page=$next'>다음</a></li>"; 
            }
            if($page >= $total_page){ 
                echo "<li class='fo_re'>마지막</li>"; 
            }else{
                echo "<li><a href='?page=$total_page'>마지막</a></li>"; 
            }
            ?>
        </ul>
    </div>
        <div id="write_btn">
            <a href="write.html"><button>글쓰기</button></a>
        </div>
    </div>
</body>
</html>


