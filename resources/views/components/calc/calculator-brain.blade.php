<script>
    // buttons
    document.addEventListener('DOMContentLoaded', function() {
        const display = document.getElementById('calc-display');
        const resultDisplay = document.getElementById('result-display');
        const numberButtons = document.querySelectorAll('.btn-num');
        const clearButton = document.querySelector('.btn-clr');
        const symbolButtons = document.querySelectorAll('.btn-symbl');

        let result = '0';
        let preSym = '';

        // screen shows the number
        numberButtons.forEach(button => {
            button.addEventListener('click', function() {
                const value = this.dataset.value;
                display.value += value;
            });
        });

        // clear screen
        clearButton.addEventListener('click', function() {
            display.value = '';
            preValue = '0';
            preSym = '';
            result = '0'
            resultDisplay.value = '0'
        });

        function calculate(a, op, b) {
            a = parseFloat(a);
            b = parseFloat(b);

            switch (op) {
                case '+':
                    return a + b;
                case '-':
                    return a - b;
                case '*':
                    return a * b;
                case '/':
                    return b !== 0 ? a / b : '0'; // prevent ÷0
                default:
                    return b;
            }
        }

        symbolButtons.forEach(but => {
            but.addEventListener('click', function() {
                const tempSymbl = this.dataset.value;

                if (preSym) {
                    if (display.value == '') {
                        // compute previous result first
                        display.value = 0
                    };
                    result = calculate(result, preSym, display.value)
                } else {
                    // first time: just store the number
                    result = parseFloat(display.value);
                }

                resultDisplay.value = result; // show intermediate result
                preSym = tempSymbl; // save operator for next step
                display.value = ''; // clear input for next number
            });
        });
    });
</script>
