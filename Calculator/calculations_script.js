function calculations() {
    // document.getElementById('demo').innerHTML = 'Теперь посчитали.';
    // alert('Просто alert');
    // prompt('Задайте два числа и действие', 0);
    // confirm('Теперт confirm');
    var number1 = Number(prompt('первое число', 0));
    var action = String(prompt('действие: + - * / %', 0));
    var number2 = Number(prompt('второе число', 0));
    // alert('Наши расчеты: number1')
    var result;
    result = (action == '+') ? number1 + number2 : (action == '-') ? number1 - number2 : (action == '*') ? number1 * number2 :
        (action == '/') ? number1 / number2 : (action == '%') ? number1 % number2 : 'something else.'
    /*if (action == '+')
    {
        result = number1 + number2
    }
    else if (action == '-')
    {
        result = number1 - number2;
    }
    else if (action == '*')
    {
        result = number1 * number2
    }
    else if (action == '/')
    {
        if (number2 == 0)
        {
            result = 'Devision by zero.'
        }
        else
            result = number1 / number2
    }
    else if (action == '%')
    {
        if (number2 == 0)
        {
            result = 'Devision by zero.'
        }
        else
            result = number1 % number2
    }
    else
        result = 'Действие не определено.'*/
    document.getElementById('demo').innerHTML = number1 + ' ' + action + ' ' + number2 + ' = ' + result + ' ';
}