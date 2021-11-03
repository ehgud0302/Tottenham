<?php
include "db.php"; /* db load */
?>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/common.js"></script>
<script>
	$(function(){
		$("#writepass").dialog({
		modal:true,
		title:'비밀글입니다.',
		width:400,
	});
	});
</script>
<?php

$bno = $_GET['idx'];
$sql = mq("select * from board where idx='".$bno."'"); 
$board = $sql->fetch_array();

?>
<div id='writepass'>
	<form action="" method="post">
 		<p>비밀번호<input type="password" name="pw_chk" /> <input type="submit" value="확인" /></p>
 	</form>
</div>
	 <?php
	 	$bpw = $board['pw'];

	 	if(isset($_POST['pw_chk'])) 
	 	{
	 		$pwk = $_POST['pw_chk']; 
			if(password_verify($pwk,$bpw)) 
			{
				$pwk == $bpw;
			?>
				<script type="text/javascript">location.replace("view.php?idx=<?php echo $board["idx"]; ?>");</script>
			<?php 
			}else{ ?>
				<script type="text/javascript">alert('비밀번호가 틀립니다');</script>
			<?php } } ?>