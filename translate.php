<?php
/** @var string $startWord */
/** @var string $morzeWord */
/** @var string $reverseMorze */
/** @var string $id */
/* @var $this yii\web\View */
/** @var bool $incorrectWord */

use yii\helpers\Html;

$this->title = 'Переводим в морзе';
?>
    <h4><?= Html::encode($this->title) ?></h4>
<?=Html::beginForm(['example/translate'], 'post') ?>
Введите слово, которое хотите перевести:
<?= Html::input('text', 'morzeInput', $startWord) ?>
<?= Html::submitButton('Перевести', ['class' => 'submit']) ?>
<?= Html::endForm() ?>
<br>

<?php  if ($startWord == "") {?>
    Введите ваше слово =).
<?php } else if ($incorrectWord) { ?>
    Написанное слово: <?= $startWord ?><br>
    Вы ввели некорректное слово. <br>
    Оно должно быть введено только английскими буквами без цифр и знаков препинания.
<?php } else {?>
    Написанное слово: <?= $startWord ?><br>
    Так слово выглядит в азбуке Морзе: <?= $morzeWord ?><br>

    <?php if ($morzeWord == $reverseMorze) { ?>
        В азбуке Морзе данное слово является палиндромом
    <?php } else { ?>
        В азбуке Морзе данное слово не является палиндромом
    <?php } ?>
<?php } ?>

