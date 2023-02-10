<?

use yii\helpers\Url;
?>

<div>
    <h1><?= $article->title ?></h1>
    <p><?= $article->text ?></p>
    <span><?= $article->data ?> <?= $article->likes ?> <?= $article->hits ?> </span>
</div>

<p>Вернуться назад к <a href="<?= Url::to('index') ?>">списку новостей</a></p>