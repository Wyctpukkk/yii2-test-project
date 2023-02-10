<?

use yii\helpers\Url;
use yii\helpers\Html;

echo Html::a("Отправить форму", ['articles/forms'], ['class' => 'btn btn-success']);
?>


<div>
    <div>
        <h1>Список новостей</h1>
    </div>
    <div class="row">
        <? foreach ($articles as $article) : ?>
            <div class="col-lg-4">
                <h2><a href="<?= Url::to(['articles/article', 'id' => $article->id]) ?>"><?= $article->getFullTitle($article->title) ?> </a></h2>
                <p><?= $article->getShortText($article->text)  ?></p>
                <p><?= $article->data ?></p>
                <span> <?= $article->getDescription($article->likes, "like")  ?> <?= $article->getDescription($article->hits, 'hit') ?> </span>
            </div>
        <? endforeach; ?>
    </div>
</div>