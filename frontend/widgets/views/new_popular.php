<div class="tabcontrol">


    <ul class="tabnavig">

        <script type="text/javascript">

            $(function() {
                $('.link').on('click', function(e) {
                    e.preventDefault();
                    $('.bar').each(function() {
                        $(this).css('display', 'none');
                    });
                    var block = $(this).attr('href');
                    $(block).css('display', 'block');
                });
            });

        </script>



        <li>
            <a href="#block1" class="link" id="latest">
                <span class="big">Новое</span>
            </a>
        </li>


        <li>
            <a href="#block2" id="popular" class="dynamic-content link">
                <span class="big">Популярное</span>
            </a>
        </li>


        <li>
            <a href="#block3" id="random" class="dynamic-content link">
                <span class="big">Случайное</span>
            </a>
        </li>


    </ul>



    <!-- tab block -->
    <div id="block1" class="bar">

        <div class="clr"></div>


        <?
        foreach($model_new as $row):
        ?>

        <div class="post-block-out ">

            <div class="post-block">

                <div class="post-left">

                    <a href="<?=\frontend\components\Common::getUrlAdvert($row) ?>" title="<?=$row['title'] ?>" class="preview" data-rel="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>"><img width="250" height="250" src="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>" class="attachment-ad-medium size-ad-medium" alt="<?=$row['title'] ?>" srcset="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>" sizes="(max-width: 250px) 100vw, 250px" /></a>
                </div>

                <div class="post-right full">


                    <div class="tags price-wrap">
                        <span class="tag-head"><p class="post-price"><?=$row['price'] ?></p></span>
                    </div>


                    <h3><a href="<?=\frontend\components\Common::getUrlAdvert($row) ?>"><?=$row['title'] ?></a></h3>

                    <div class="clr"></div>

                    <p class="post-meta">
                        <span class="dashicons-before folder"><a href="/main/category/?type=<?=$row['category']?>" rel="tag"><?=$row['category']?></a></span> <span class="dashicons-before owner"><a href="" title="Posts by <?=$row['user']['username'] ?>" rel="author"><?=$row['user']['username'] ?></a></span> <span class="dashicons-before clock"><span><?=date('d.m.Y', $row['created_at'])?></span></span>
                    </p>

                    <div class="clr"></div>


                    <p class="post-desc"><?=mb_substr($row['description'],0,120,'UTF-8')?> <a class="moretag" href="<?=\frontend\components\Common::getUrlAdvert($row) ?>">[&hellip;]</a></p>

                    <p class="stats"><?=$row['views']?> views</p>

                    <div class="clr"></div>

                </div>

                <div class="clr"></div>

            </div><!-- /post-block -->

        </div><!-- /post-block-out -->

        <?endforeach;?>





    </div><!-- /tab block -->


    <!-- tab block -->
    <div id="block2" class="bar">

        <div class="clr"></div>


        <?
        foreach($model_popular as $row):
            ?>

            <div class="post-block-out ">

                <div class="post-block">

                    <div class="post-left">

                        <a href="<?=\frontend\components\Common::getUrlAdvert($row) ?>" title="<?=$row['title'] ?>" class="preview" data-rel="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>"><img width="250" height="250" src="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>" class="attachment-ad-medium size-ad-medium" alt="<?=$row['title'] ?>" srcset="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>" sizes="(max-width: 250px) 100vw, 250px" /></a>
                    </div>

                    <div class="post-right full">


                        <div class="tags price-wrap">
                            <span class="tag-head"><p class="post-price"><?=$row['price'] ?></p></span>
                        </div>


                        <h3><a href="<?=\frontend\components\Common::getUrlAdvert($row) ?>"><?=$row['title'] ?></a></h3>

                        <div class="clr"></div>

                        <p class="post-meta">
                            <span class="dashicons-before folder"><a href="/main/category/?type=<?=$row['category']?>" rel="tag"><?=$row['category']?></a></span> <span class="dashicons-before owner"><a href="" title="Posts by <?=$row['user']['username'] ?>" rel="author"><?=$row['user']['username'] ?></a></span> <span class="dashicons-before clock"><span><?=date('d.m.Y', $row['created_at'])?></span></span>
                        </p>

                        <div class="clr"></div>


                        <p class="post-desc"><?=mb_substr($row['description'],0,120,'UTF-8')?> <a class="moretag" href="<?=\frontend\components\Common::getUrlAdvert($row) ?>">[&hellip;]</a></p>

                        <p class="stats"><?=$row['views']?> views</p>

                        <div class="clr"></div>

                    </div>

                    <div class="clr"></div>

                </div><!-- /post-block -->

            </div><!-- /post-block-out -->

        <?endforeach;?>



    </div><!-- /tab block -->


    <!-- tab block -->
    <div id="block3" class="bar">

        <div class="clr"></div>


        <?
        foreach($model_random as $row):
            ?>


            <div class="post-block-out ">

                <div class="post-block">

                    <div class="post-left">

                        <a href="<?=\frontend\components\Common::getUrlAdvert($row) ?>" title="<?=$row['title'] ?>" class="preview" data-rel="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>"><img width="250" height="250" src="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>" class="attachment-ad-medium size-ad-medium" alt="<?=$row['title'] ?>" srcset="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>" sizes="(max-width: 250px) 100vw, 250px" /></a>
                    </div>

                    <div class="post-right full">


                        <div class="tags price-wrap">
                            <span class="tag-head"><p class="post-price"><?=$row['price'] ?></p></span>
                        </div>


                        <h3><a href="<?=\frontend\components\Common::getUrlAdvert($row) ?>"><?=$row['title'] ?></a></h3>

                        <div class="clr"></div>

                        <p class="post-meta">
                            <span class="dashicons-before folder"><a href="/main/category/?type=<?=$row['category']?>" rel="tag"><?=$row['category']?></a></span> <span class="dashicons-before owner"><a href="" title="Posts by <?=$row['user']['username'] ?>" rel="author"><?=$row['user']['username'] ?></a></span> <span class="dashicons-before clock"><span><?=date('d.m.Y', $row['created_at'])?></span></span>
                        </p>

                        <div class="clr"></div>


                        <p class="post-desc"><?=mb_substr($row['description'],0,120,'UTF-8')?> <a class="moretag" href="<?=\frontend\components\Common::getUrlAdvert($row) ?>">[&hellip;]</a></p>

                        <p class="stats"><?=$row['views']?> views</p>

                        <div class="clr"></div>

                    </div>

                    <div class="clr"></div>

                </div><!-- /post-block -->

            </div><!-- /post-block-out -->

        <?endforeach;?>



    </div><!-- /tab block -->


</div><!-- /tabcontrol -->