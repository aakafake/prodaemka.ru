<!-- start tabs -->
<div class="tabprice">

    <ul class="tabnavig">
        <li><a href="#priceblock1">Популярное</a></li>
        <li><a href="#priceblock2">Новое</a></li>
        <li><a href="#priceblock3">Случайное</a></li>
    </ul>


    <!-- popular tab 1 -->
    <div id="priceblock1">

        <div class="clr"></div>



        <ul class="side-comments">

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

    </div>


    <!-- comments tab 2 -->
    <div id="priceblock2">

        <div class="clr"></div>



        <ul class="side-comments">


            <?
            foreach($model_new as $row):
                ?>

                <li>

                    <div class="post-thumb">
                        <a href="<?=\frontend\components\Common::getUrlPost($row) ?>">
                        <img width="50" height="50" src="<?=\frontend\components\Common::getImagePost($row)[0] ?>" class="attachment-sidebar-thumbnail size-sidebar-thumbnail wp-post-image" alt="<?=$row['title']?>" srcset="<?=\frontend\components\Common::getImagePost($row)[0] ?>" sizes="(max-width: 50px) 100vw, 50px" />
                        </a>
                    </div>

                    <h3><a href="<?=\frontend\components\Common::getUrlPost($row) ?>"><span class="colour"><?=$row['title']?></span></a></h3>
                    <p class="side-meta">Разместил <a href="" title="Posts by admin" rel="author">admin</a> on <?=date('d,m,Y',$row['created_at'])?> </p>
                    <p><?=mb_substr($row['description'],0,350,'UTF-8')?> <a class="moretag" href="<?=\frontend\components\Common::getUrlPost($row) ?>"> [&hellip;]</a></p>

                </li>

            <?endforeach;?>



        </ul>

    </div><!-- /priceblock2 -->


    <!-- tag cloud tab 3 -->
    <div id="priceblock3">

        <div class="clr"></div>

        <ul class="side-comments">


            <?
            foreach($model_random as $row):
                ?>

                <li>

                    <div class="post-thumb">
                        <a href="<?=\frontend\components\Common::getUrlPost($row) ?>">
                        <img width="50" height="50" src="<?=\frontend\components\Common::getImagePost($row)[0] ?>" class="attachment-sidebar-thumbnail size-sidebar-thumbnail wp-post-image" alt="<?=$row['title']?>" srcset="<?=\frontend\components\Common::getImagePost($row)[0] ?>" sizes="(max-width: 50px) 100vw, 50px" />
                        </a>
                    </div>

                    <h3><a href="<?=\frontend\components\Common::getUrlPost($row) ?>"><span class="colour"><?=$row['title']?></span></a></h3>
                    <p class="side-meta">Разместил <a href="" title="Posts by admin" rel="author">admin</a> on <?=date('d,m,Y',$row['created_at'])?> </p>
                    <p><?=mb_substr($row['description'],0,350,'UTF-8')?> <a class="moretag" href="<?=\frontend\components\Common::getUrlPost($row) ?>"> [&hellip;]</a></p>

                </li>

            <?endforeach;?>



        </ul>

    </div>

</div><!-- end tabs -->