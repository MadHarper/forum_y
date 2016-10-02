<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
    </div>
</div>

<div class="row" id="central">
    <div class="col-md-9 theme forum-list">


        <?php foreach($categories as $category): ?>
        <div class="row">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><?= $category->name;?></div>
                <!-- List group -->
                <ul class="list-group">
                    <?php if($category->childs): ?>
                        <?php foreach ($category->childs as $child): ?>

                            <li class="list-group-item"><?= \yii\helpers\Html::a($child->name, ['view', 'slug' => $child->slug], ['class' => 'profile-link'])  ;?></li>

                        <?php endforeach;?>
                    <?php endif;?>
                </ul>
            </div>
        </div>
        <?php endforeach; ?>


    </div>
    <div class="col-md-3 theme side">
        <div class="row">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Panel heading</div>
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">Collapsible panel</a>
                    </h4>
                </div>
                <!-- List group -->
                <div id="collapse1" class="panel-collapse collapse">
                    <ul class="list-group " >
                        <?php foreach($games as $game): ?>
                            <li class="list-group-item">
                                <?= $game->AwayTeam.' '.$game->AwayScore.' - '.$game->HomeTeam.' '.$game->HomeScore ;?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse2">Collapsible panel</a>
                    </h4>
                </div>
                <!-- List group -->
                <div id="collapse2" class="panel-collapse collapse">
                    <ul class="list-group " >
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
