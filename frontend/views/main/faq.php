<?php
use rmrevin\yii\module\Comments;
?>

<div class="content_res">
    <div class="row contact">
        <div id="breadcrumb"><div id="crumbs">
                <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="/" title="home" rel="home">Главная</a></span>
                    <span class="sep">/</span> <span class="trail-end"> FAQ</span>
                </div></div></div>

        <h1 class="single dotted">FAQ </h1>

            <div class="post">
                <h2>Вопрос 1</h2>
                <p>
                    Donec ultrices sollicitudin magna, quis venenatis mauris malesuada sed. Sed tempus metus et mauris blandit tincidunt. Etiam at elit eget urna lacinia mollis. Sed ac diam quis nisl feugiat auctor id in orci. Mauris vitae felis mi. Duis nisl libero, vehicula vel iaculis id, hendrerit vitae lorem. Vestibulum dui eros, interdum a rhoncus a, dapibus eu erat. Proin risus nisi, feugiat eu tempus id, tincidunt vitae ante. Praesent porttitor consectetur tortor non feugiat. Curabitur porttitor scelerisque consectetur. Praesent varius adipiscing augue a faucibus. Sed elementum orci id neque ornare condimentum sed eget nulla. Aliquam tempus sagittis dolor, ut adipiscing nibh feugiat quis. Nulla facilisi. Phasellus iaculis tempor sem luctus pellentesque. Curabitur congue arcu eu leo pretium vitae sollicitudin urna vestibulum.
                </p>

                <h2>Ответ 1</h2>
                <p>
                    Donec ultrices sollicitudin magna, quis venenatis mauris malesuada sed. Sed tempus metus et mauris blandit tincidunt. Etiam at elit eget urna lacinia mollis. Sed ac diam quis nisl feugiat auctor id in orci. Mauris vitae felis mi. Duis nisl libero, vehicula vel iaculis id, hendrerit vitae lorem. Vestibulum dui eros, interdum a rhoncus a, dapibus eu erat. Proin risus nisi, feugiat eu tempus id, tincidunt vitae ante. Praesent porttitor consectetur tortor non feugiat. Curabitur porttitor scelerisque consectetur. Praesent varius adipiscing augue a faucibus. Sed elementum orci id neque ornare condimentum sed eget nulla. Aliquam tempus sagittis dolor, ut adipiscing nibh feugiat quis. Nulla facilisi. Phasellus iaculis tempor sem luctus pellentesque. Curabitur congue arcu eu leo pretium vitae sollicitudin urna vestibulum.
                </p>

                <h2>Вопрос 2</h2>
                <p>
                    Donec ultrices sollicitudin magna, quis venenatis mauris malesuada sed. Sed tempus metus et mauris blandit tincidunt. Etiam at elit eget urna lacinia mollis. Sed ac diam quis nisl feugiat auctor id in orci. Mauris vitae felis mi. Duis nisl libero, vehicula vel iaculis id, hendrerit vitae lorem. Vestibulum dui eros, interdum a rhoncus a, dapibus eu erat. Proin risus nisi, feugiat eu tempus id, tincidunt vitae ante. Praesent porttitor consectetur tortor non feugiat. Curabitur porttitor scelerisque consectetur. Praesent varius adipiscing augue a faucibus. Sed elementum orci id neque ornare condimentum sed eget nulla. Aliquam tempus sagittis dolor, ut adipiscing nibh feugiat quis. Nulla facilisi. Phasellus iaculis tempor sem luctus pellentesque. Curabitur congue arcu eu leo pretium vitae sollicitudin urna vestibulum.
                </p>

                <h2>Ответ 2</h2>
                <p>
                    Donec ultrices sollicitudin magna, quis venenatis mauris malesuada sed. Sed tempus metus et mauris blandit tincidunt. Etiam at elit eget urna lacinia mollis. Sed ac diam quis nisl feugiat auctor id in orci. Mauris vitae felis mi. Duis nisl libero, vehicula vel iaculis id, hendrerit vitae lorem. Vestibulum dui eros, interdum a rhoncus a, dapibus eu erat. Proin risus nisi, feugiat eu tempus id, tincidunt vitae ante. Praesent porttitor consectetur tortor non feugiat. Curabitur porttitor scelerisque consectetur. Praesent varius adipiscing augue a faucibus. Sed elementum orci id neque ornare condimentum sed eget nulla. Aliquam tempus sagittis dolor, ut adipiscing nibh feugiat quis. Nulla facilisi. Phasellus iaculis tempor sem luctus pellentesque. Curabitur congue arcu eu leo pretium vitae sollicitudin urna vestibulum.
                </p>


            </div>

    </div>

            <div id="comments">


                <div id="comments_wrap">

                    <?php
                    echo Comments\widgets\CommentListWidget::widget([
                        'entity' => (string) 'faq-1', // type and id
                    ]);
                    ?>

                </div> <!-- /comments_wrap -->

            </div><!-- /comments -->




</div>