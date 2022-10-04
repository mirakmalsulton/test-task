<?php
/** @var $name */
/** @var $message */

use yii\helpers\Html;
$this->title = $name;
?>

<div class="site-error">
    <div class="alert alert-danger">
        <h5><?= nl2br(Html::encode($message)) ?></h5>
    </div>
</div>