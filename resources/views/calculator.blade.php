<x-layout>

    <x-slot:heading>
        Calculator
    </x-slot:heading>

    <script>
        // vajutab nuppu
        document.addEventListener('DOMContentLoaded', function() {
            const display = document.getElementById('calc-display');
            const numberButtons = document.querySelectorAll('.btn-num');
            const clearButton = document.querySelectorAll('.btn-clear');

            numberButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const value = this.dataset.value;
                    display.value += value;
                });
            });
        })
        // ekraan näitab numbrit
        // vajutades tehte märki jätab meelde eelmise nr ja tühjendab ekraani
        // sisestab uue nr
        // vajutades tehte märki või võrdus märki siis annab eelmiste summade vastuse või siis tühjendab välja ja jätab meelde eelmiste tehete vastuse
    </script>

    <form method="POST" action="/calculate">
        @csrf
        <div>

            <div
                class="bg-base-200 items-center w-[25%] rounded-box border-8 border-success-100 m-auto justify-center flex flex-col">

                {{-- Calc screen --}}
                <div class="text-center flex w-[100%]">
                    <input type="number" id="calc-display" value=""
                        class="w-[90%] h-20 bg-secondary text-neutral text-center mt-[3%] m-auto " readonly>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col justify-center p-2 m-2">

                    <x-calc.button-div>
                        <x-calc.calc-button value="7">7</x-calc.calc-button>
                        <x-calc.calc-button value="8">8</x-calc.calc-button>
                        <x-calc.calc-button value="9">9</x-calc.calc-button>
                        <x-calc.calc-button value="*">*</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button value="4">4</x-calc.calc-button>
                        <x-calc.calc-button value="5">5</x-calc.calc-button>
                        <x-calc.calc-button value="6">6</x-calc.calc-button>
                        <x-calc.calc-button value="-">-</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button value="1">1</x-calc.calc-button>
                        <x-calc.calc-button value="2">2</x-calc.calc-button>
                        <x-calc.calc-button value="3">3</x-calc.calc-button>
                        <x-calc.calc-button value="+">+</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button value=".">.</x-calc.calc-button>
                        <x-calc.calc-button value="0">0</x-calc.calc-button>
                        <x-calc.calc-button value="clr">clr</x-calc.calc-button>
                        <x-calc.calc-button value="=">=</x-calc.calc-button>
                    </x-calc.button-div>

                </div>

            </div>
        </div>

</x-layout>
