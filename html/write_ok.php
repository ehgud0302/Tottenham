
    
    <?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    include "db.php";
    $date = date('Y-m-d');
    $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    if(isset($_POST['lockpost'])){
        $lo_post = '1';
    }else{
        $lo_post = '0';
    }
    
    
    $mqq = mq("alter table board auto_increment =1");
    
    $sql= mq("insert into board(name,pw,title,content,date,lock_post) values('".$_POST['name']."','".$userpw."','".$_POST['title']."','".$_POST['content']."','".$date."','".$lo_post."')");
    echo "<script>alert('글쓰기 완료되었습니다.');</script>";
    ?>
    <meta http-equiv="refresh" content="0 url=list.php" />