<?php


namespace app\controllers;
use Yii;
use yii\web\Controller;

class ExampleController extends Controller
{
    public function actionTranslate(){
        $startWord = htmlspecialchars(Yii::$app->request->post('morzeInput'));
        $reverseMorze = '';
        $morzeWord = '';
        $incorrectWord = false;

        if (isset($startWord)) {
            $word = strtolower($startWord);
            $letters = str_split($word);    //создание массива из строки
            $newLetters = [];
            $morzes = [
                "a" => ".-",
                "b" => "-...",
                "c" => "-.-.",
                "d" => "-..",
                "e" => ".",
                "f" => "..-.",
                "g" => "--.",
                "h" => "....",
                "i" => "..",
                "j" => ".---",
                "k" => "-.-",
                "l" => ".-..",
                "m" => "--",
                "n" => "-.",
                "o" => "---",
                "p" => ".--.",
                "q" => "--.-",
                "r" => ".-.",
                "s" => "...",
                "t" => "-",
                "u" => "..-",
                "v" => "...-",
                "w" => ".--",
                "x" => "-..-",
                "y" => "-.--",
                "z" => "--..",
            ];
            foreach ($letters as $letter) {
                if (isset($morzes[$letter])) {
                    $newLetters[] = $morzes[$letter];
                } else {
                    $incorrectWord = true;
                    break;
                }
            };
            $morzeWord = implode("", $newLetters);
            $reverseMorze = strrev($morzeWord);
        } else {
            $startWord = "";
        }

        return $this->render("translate", [
            "startWord" => $startWord,
            "morzeWord" => $morzeWord,
            "reverseMorze" => $reverseMorze,
            "incorrectWord" => $incorrectWord,
        ]);
    }
}