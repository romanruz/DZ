<p>12. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что предложения
    идут в обратном порядке.<br>
    Пример:<br><br>
    Входная строка:  'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь.
    А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';<br><br>
    Строка, возвращенная функцией :  'А там хоть трава не расти. А ларчик просто открывался. А король-то — голый. А вы
    друзья как ни садитесь, все в музыканты не годитесь. А воз и ныне там.А Васька слушает да ест.'

<hr>
    <?php
$string = 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь.
    А король-то — голый. А ларчик просто открывался.А там хоть трава не расти';
task12($string);

//function

function task12 ($string)
{
    $arr = explode('.', $string);
    $res = '';
    for ($i = count($arr)-1; $i >= 0; $i--) {
        $res .= "$arr[$i]" . ".";
    }
    echo $res;
}
?>