<x-layout>

    <x-slot:heading>
        Calculator
    </x-slot:heading>

    <form method="POST" action="/calculate">
        @csrf
        <div>
            <div
                class="bg-secondary items-center calculator-back w-[30%] rounded-box border-8 border-success-100 m-auto">
                <div class="text-center">
                    <input type="number" id="first_number" placeholder="number"
                        class="w-[90%] h-20 bg-success mx-auto mt-2" readonly>
                </div>
                <div class="flex flex-col justify-center p-2 m-2">

                    <x-calc.button-div>
                        <x-calc.calc-button id="calc-number7">7</x-calc.calc-button>
                        <x-calc.calc-button id="calc-number8">8</x-calc.calc-button>
                        <x-calc.calc-button id="calc-number9">9</x-calc.calc-button>
                        <x-calc.calc-button id="calc-multiply">*</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button id="calc-number4">4</x-calc.calc-button>
                        <x-calc.calc-button id="calc-number5">5</x-calc.calc-button>
                        <x-calc.calc-button id="calc-number6">6</x-calc.calc-button>
                        <x-calc.calc-button id="calc-subtract">-</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button id="calc-number1">1</x-calc.calc-button>
                        <x-calc.calc-button id="calc-number2">2</x-calc.calc-button>
                        <x-calc.calc-button id="calc-number3">3</x-calc.calc-button>
                        <x-calc.calc-button id="calc-add">+</x-calc.calc-button>
                    </x-calc.button-div>

                    <x-calc.button-div>
                        <x-calc.calc-button id="calc-dot">.</x-calc.calc-button>
                        <x-calc.calc-button id="calc-number0">0</x-calc.calc-button>
                        <x-calc.calc-button id="calc-divide">/</x-calc.calc-button>
                        <x-calc.calc-button id="calc-equals">=</x-calc.calc-button>
                    </x-calc.button-div>

                </div>

            </div>
        </div>

</x-layout>
