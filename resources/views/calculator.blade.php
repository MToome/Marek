<x-layout>

    <x-slot:heading>
        Calculator
    </x-slot:heading>

    <x-calc.calculator-brain/>

    <form method="POST" action="/calculate">
        @csrf
        <div>

            <div class="bg-base-200 items-center w-[400px] rounded-box border-8 border-success-100 m-auto justify-center flex flex-col">

                {{-- Result screen --}}
                <div class="relative w-[90%] m-auto mt-3">
                    <input type="text" id="result-display" value="" placeholder="0"
                        class="text-3xl w-full h-20 bg-secondary text-primary-content text-center rounded-lg" readonly>
                    <span
                        class="absolute left-[143px] top-[1px] text-secondary-content/50 text-lg ">
                        RESULT
                    </span>
                </div>

                {{-- Calc screen --}}
                <div class="relative w-[90%] m-auto mt-3">
                    <input type="float" id="calc-display" value="" placeholder="0"
                        class="text-3xl w-full h-20 bg-secondary text-primary-content text-center rounded-lg" readonly>
                    <span
                        class="absolute left-[150px] top-[1px] text-lg text-secondary-content/50">
                        INPUT
                    </span>
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
