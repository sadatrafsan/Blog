<ul>
    <?
    $category = $A->menu();

    while ($row = mysql_fetch_array($category)) {

        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
    ?>
        <li>
            <a href="window.php?category=<? echo urlencode($category_id); ?>">
                <? echo $category_name; ?>
                <ul>
                    <? $article = $A->submenu($category_id); ?>
                    <? while ($row = mysql_fetch_array($article)) { ?>
                    <? $article_id = $row['article_id']; ?>
                    <? $article_title = $row['article_title']; ?>
                    <? if($category_id == $selected_category){ ?>
                        <li>
                            <a href="window.php?article=<? echo urlencode($article_id); ?>">
                                <? echo $article_title; ?>
                            </a>
                        </li>
                    <? } } ?>
                </ul>
            </a>
        </li>
    <? } ?>
</ul>