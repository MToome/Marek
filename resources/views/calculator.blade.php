<x-layout>

    <x-slot:heading>
        Calculator
    </x-slot:heading>

    <script>
        // vajutab nuppu
        document.addEventListener('DOMContentLoaded', function() {
            const display = document.getElementById('calc-display');
            const resultDisplay = document.getElementById('result-display');
            const numberButtons = document.querySelectorAll('.btn-num');
            const clearButton = document.querySelector('.btn-clr');
            const symbolButtons = document.querySelectorAll('.btn-symbl');

            let result = 0;
            let preSym = '';

            // ekraan näitab numbrit
            numberButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const value = this.dataset.value;
                    display.value += value;
                });
            });

            // tühjendab ekraani
            clearButton.addEventListener('click', function() {
                display.value = '0';
                preValue = '0';
                preSym = '';
                result = '0'
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

    <form method="POST" action="/calculate">
        @csrf
        <div>

            <div
                class="bg-base-200 items-center w-[25%] rounded-box border-8 border-success-100 m-auto justify-center flex flex-col">

                {{-- Result screen --}}
                <div class="text-center flex w-[100%]">
                    <input type="float" id="result-display" value="0"
                        class="w-[90%] h-20 bg-secondary text-neutral text-center mt-[3%] m-auto " readonly>
                </div>

                {{-- Calc screen --}}
                <div class="text-center flex w-[100%]">
                    <input type="float" id="calc-display" value="" placeholder="0"
                        class="w-[90%] h-20 bg-secondary text-neutral text-center mt-[3%] m-auto " readonly>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col justify-center p-2 m-2">

                    <x-calc.button-div>
                        <x-calc.calc-button class="btn-num" value="7">7</x-calc.calc-button>
                        <x-calc.calc-button class="btn-num" value="8">8</x-calc.calc-button>
                        <x-calc.calc-button class="btn-num" value="9">9</x-calc.calc-button>
                        <x-calc.calc-button class="btn-symbl" value="*">*</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button class="btn-num" value="4">4</x-calc.calc-button>
                        <x-calc.calc-button class="btn-num" value="5">5</x-calc.calc-button>
                        <x-calc.calc-button class="btn-num" value="6">6</x-calc.calc-button>
                        <x-calc.calc-button class="btn-symbl" value="/">/</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button class="btn-num" value="1">1</x-calc.calc-button>
                        <x-calc.calc-button class="btn-num" value="2">2</x-calc.calc-button>
                        <x-calc.calc-button class="btn-num" value="3">3</x-calc.calc-button>
                        <x-calc.calc-button class="btn-symbl" value="+">+</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button class="btn-num" value=".">.</x-calc.calc-button>
                        <x-calc.calc-button class="btn-num" value="0">0</x-calc.calc-button>
                        <x-calc.calc-button class="btn-clr">clr</x-calc.calc-button>
                        <x-calc.calc-button class="btn-symbl" value="-">-</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button class="btn-symbl w-[100%]" value="=">=</x-calc.calc-button>
                    </x-calc.button-div>

                </div>

            </div>
        </div>

</x-layout>
