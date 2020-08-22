<?php require('dbconnect.php');?>
<?php require('header.php');?>
<?php
if (isset($_POST['memo'])) {
    $statement=$db->prepare('INSERT INTO memos SET memo=?,created_at=NOW()');
    $statement->bindParam(1, $_POST['memo']);
    $statement->execute();
}
?>
<p>メモが登録されました</p>
<p><a href="index.php">戻る</a></p>
<?php require('footer.php');
