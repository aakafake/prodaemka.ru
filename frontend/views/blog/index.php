





<div class="content">

    <div class="content_botbg">

        <div class="content_res">

            <div id="breadcrumb"><div id="crumbs">
                    <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="http://demos.appthemes.com/classipress" title="ClassiPress Demo" rel="home">Home</a></span>
                        <span class="sep">&raquo;</span> <span class="trail-end">Blog</span>
                    </div></div></div>

            <div class="content_left">


                <? foreach($result_general as $row): ?>

                <div class="shadowblock_out post-2538 post type-post status-publish format-standard has-post-thumbnail hentry category-announcements tag-f430 tag-fast-car tag-ferrari" id="post-2538">

                    <div class="shadowblock">


                        <h3 class="loop"><a href="<?=\frontend\components\Common::getUrlPost($row) ?>" title="<?=$row['title'] ?>"><?=$row['title'] ?></a></h3>

                        <p class="meta dotted"><span class="dashicons-before user"><a href="" title="Posts by admin" rel="author">admin</a></span> <span class="dashicons-before folderb"><a href="/blog" rel="category tag">Blog</a></span> <span class="dashicons-before clock"><span><?=date('d.m.Y',$row['created_at']) ?></span></span></p>


                        <div class="entry-content">

                            <a href="<?=\frontend\components\Common::getUrlPost($row) ?>">
                            <img width="150" height="102" src="<?=\frontend\components\Common::getImagePost($row)[0] ?>" class="attachment-blog-thumbnail size-blog-thumbnail wp-post-image" alt="ferrari-pictures-5" srcset="<?=\frontend\components\Common::getImagePost($row)[0] ?>" sizes="(max-width: 150px) 100vw, 150px" />
                            </a>
                            <p><?=mb_substr($row['description'],0,420,'UTF-8')?>
                                <a class="moretag" href="<?=\frontend\components\Common::getUrlPost($row) ?>">[&hellip;]</a>
                            </p>
                        </div>

                        <p class="stats">просмотров <?=$row['views']?></p>

                    </div><!-- #shadowblock -->

                </div><!-- #shadowblock_out -->

                    <?
                endforeach;
                ?>




                <div class="clr"></div>

            </div><!-- /content_left -->


            <!-- right sidebar -->
            <div class="content_right">

                <? echo \frontend\widgets\BlogWidget::widget(['view'=>'blog']) ?>

            </div><!-- /content_right -->

            <div class="clr"></div>

        </div><!-- /content_res -->

    </div><!-- /content_botbg -->

</div><!-- /content -->
                
