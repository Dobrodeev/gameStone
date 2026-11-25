'use strict';

// Вычисление в браузере по данным той же формы, без отправки на сервер.

const operations = {
    '+': (x, y) => x + y,
    '-': (x, y) => x - y,
    '*': (x, y) => x * y,
    '/': (x, y) => x / y,
    '%': (x, y) => x % y,
};

function calculate(x, operation, y) {
    if (Number.isNaN(x) || Number.isNaN(y)) {
        return 'Введите два числа';
    }
    if ((operation === '/' || operation === '%') && y === 0) {
        return 'Деление на ноль';
    }
    const apply = operations[operation];
    return apply ? String(apply(x, y)) : 'Действие не определено';
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('calculator');

    document.getElementById('calculate-js').addEventListener('click', () => {
        const x = parseFloat(form.elements.first.value);
        const y = parseFloat(form.elements.second.value);
        const operation = form.elements.operation.value;

        document.getElementById('demo').textContent = `${x} ${operation} ${y} = ${calculate(x, operation, y)}`;
    });
});
