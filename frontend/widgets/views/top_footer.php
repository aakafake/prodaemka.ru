
<h2 class="dotted">Популярное</h2>
<ul class="pop">
    <?
    foreach($result as $res ):
    ?>
    <li><a href="<?=\frontend\components\Common::getUrlAdvert($res) ?>"><?=$res['title']?></a> (просмотров <?=$res['views']?>)</li>
        <?
    endforeach;
    ?>
    </ul>
