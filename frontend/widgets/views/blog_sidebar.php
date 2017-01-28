<ul class="from-blog">



    <?
    foreach($model_popular as $row):
        ?>

        <li>

            <div class="post-thumb">
                <a href="<?=\frontend\components\Common::getUrlPost($row) ?>">
                    <img width="50" height="50" src="<?=\frontend\components\Common::getImagePost($row)[0] ?>" class="attachment-sidebar-thumbnail size-sidebar-thumbnail wp-post-image" alt="<?=$row['title']?>" srcset="<?=\frontend\components\Common::getImagePost($row)[0] ?>" sizes="(max-width: 50px) 100vw, 50px" />
                </a>
            </div>

            <h3><a href="<?=\frontend\components\Common::getUrlPost($row) ?>"><span class="colour"><?=$row['title']?></span></a></h3>
            <p class="side-meta">Разместил <a href="" title="Разместил admin" rel="author">admin</a> <?=date('d,m,Y',$row['created_at'])?> </p>
            <p><?=mb_substr($row['description'],0,350,'UTF-8')?> <a class="moretag" href="<?=\frontend\components\Common::getUrlPost($row) ?>"> [&hellip;]</a></p>

        </li>

    <?endforeach;?>






</ul>