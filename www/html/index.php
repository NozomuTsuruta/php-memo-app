<?php require('dbconnect.php');?>
<?php require('header.php');?>
<?php
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page=$_REQUEST['page'];
} else {
    $page = 1;
}
$start=5*($page-1);
$memos=$db->prepare('SELECT * FROM memos ORDER BY id LIMIT ?,5');
$memos->bindParam(1, $start, PDO::PARAM_INT);
$memos->execute();
?>
<article>
    <p><a href="insert.php">＋追加する</a></p>
    <hr>
    <?php foreach ($memos as $memo):?>
    <p>
        <a
            href="memo.php?id=<?php print($memo['id']) ?>">
            <?php print($memo['memo']) ?>
            <?php print((mb_strlen($memo['memo'])>50? '...':'')) ?>
        </a>
    </p>
    <time><?php print(mb_substr($memo['created_at'], 0, 50)) ?></time>
    <hr>
    <?php endforeach; ?>
    <?php if ($page>=2): ?>
    <a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1) ?>ページ目へ</a>
    <?php endif; ?>
    <?php
            $counts = $db->query('SELECT COUNT(*) as cnt FROM memos');
            $count=$counts->fetch();
            $max_page = floor($count['cnt']/5)+1;
            if ($page<$max_page):
            ?>
    <a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1) ?>ページ目へ</a>
    <?php endif; ?>
</article>
</main>
<?php require('footer.php');
