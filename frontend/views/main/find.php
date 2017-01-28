<?
use yii\helpers\Html;
?>


<div id="search-bar">

    <div class="searchblock_out">

        <div class="searchblock">
            <?=\yii\helpers\Html::beginForm(\yii\helpers\Url::to('/main/find/') ,'get',['class'=>'form_search', 'id'=>'searchform']) ?>


                <div class="searchfield">

                    <?=Html::textInput('propert', $request->get('propert'), ['class' => 'editbox_search', 'placeholder' => 'Search of Properties', 'required'=>'required']) ?>


                </div>

                <div class="searchbutcat">

                    <button class="dashicons-before btn-topsearch" type="submit" tabindex="3" title="Search Ads" id="go" value="search" name="sa"></button>


                    <?= Html::dropDownList('category', $request->get('category'), [''=>'Все категории' ,'Транспорт'=>'Транспорт', 'Недвижимость'=>'Недвижимость', 'Работа'=>'Работа', 'Услуги'=>'Услуги', 'Личные вещи'=>'Личные вещи', 'Для дома и дачи'=>'Для дома и дачи', 'Бытовая электроника'=>'Бытовая электроника', 'Хобби и отдых'=>'Хобби и отдых', 'Животные'=>'Животные' ,'Для бизнеса'=>'Для бизнеса'],['class'=>'searchbar','id'=>'scat']) ?>

                </div>


            <?=\yii\helpers\Html::endForm() ?>

        </div> <!-- /searchblock -->

    </div> <!-- /searchblock_out -->

</div> <!-- /search-bar -->

<div class="content">

    <div class="content_botbg">

        <div class="content_res">

            <div id="breadcrumb"><div id="crumbs">
                    <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="/" title="home" rel="home">Главная</a></span>
                        <span class="sep">/</span> <span class="trail-end">Поиск "<?=$request->get('propert')?>"</span>
                    </div></div></div>

            <!-- left block -->
            <div class="content_left">

                <div class="shadowblock_out">

                    <div class="shadowblock">
						
                        <?
						//считаем количество результатов поиска
                        $i=0;
                        foreach($model as $row):

                            $i++;
                        endforeach;?>

                        <h1 class="single dotted">'<?=$request->get('propert')?>' найдено <?=$i?></h1>

                    </div><!-- /shadowblock -->

                </div><!-- /shadowblock_out -->



                <?
                foreach($model as $row):
                ?>



                <div class="post-block-out featured">

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
                                <span class="dashicons-before folder"><a href="/main/category/?type=<?=$row['category']?>" rel="tag"><?=$row['category']?> </a></span> <span class="dashicons-before owner"><a href="" title="Posts by <?=$row['user']['username'] ?>" rel="author"><?=$row['user']['username']?></a></span> <span class="dashicons-before clock"><span><?=date('d.m.Y', $row['created_at'])?></span></span>
                            </p>

                            <div class="clr"></div>


                            <p class="post-desc"><?=mb_substr($row['description'],0,120,'UTF-8')?> <a class="moretag" href="<?=\frontend\components\Common::getUrlAdvert($row) ?>"> [&hellip;]</a></p>

                            <p class="stats"><?=$row['views']?> views</p>

                            <div class="clr"></div>

                        </div>

                        <div class="clr"></div>

                    </div><!-- /post-block -->

                </div><!-- /post-block-out -->

                    <?
                endforeach;
                ?>

            </div><!-- /content_left -->


            <div class="content_right">




                <div class="shadowblock_out widget-facebook" id="cp_facebook_like-2">

                    <? echo \frontend\widgets\FacebookWidget::widget() ?>

                </div><!-- /shadowblock_out -->

                <div class="shadowblock_out widget_cp_recent_posts" id="cp_recent_posts-2"><div class="shadowblock"><h2 class="dotted">Свежее из нашего блога</h2>

                        <? echo \frontend\widgets\BlogWidget::widget(['view'=>'blog_sidebar']) ?>

                    </div><!-- /shadowblock --></div><!-- /shadowblock_out -->

                <div class="shadowblock_out widget_text" id="text-4">

                    <? echo \frontend\widgets\Text_sidebarWidget::widget() ?>

                </div><!-- /shadowblock_out -->

            </div><!-- /content_right -->

            <div class="clr"></div>

        </div><!-- /content_res -->

    </div><!-- /content_botbg -->

</div><!-- /content -->













