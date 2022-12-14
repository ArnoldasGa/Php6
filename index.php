<?php

declare(strict_types=1);

function getCities(): array
{
    return [
        [
            'name' => 'Tokyo',
            'population' => 37435191,
        ],
        [
            'name' => 'Delhi',
            'population' => 29399141,
        ],
        [
            'name' => 'Shanghai',
            'population' => 26317104,
        ],
        [
            'name' => 'Sao Paulo',
            'population' => 21846507,
        ],
        [
            'name' => 'Mexico City',
            'population' => 21671908,
        ],
        [
            'name' => 'New York',
            'population' => 25000000,
        ],
    ];
}

echo '1 uzduotis' .PHP_EOL;

function exercise1(): int
{
    /*
    Suskaičiuokite bendrą miestų populiaciją pasinaudodami paprastu 'foreach' ir grąžinkite ją iš funkcijos.
    Miestus pasiimkite iškvietę funkciją 'getCities'
    */
    $temp = 0;
    foreach(getCities() as $cities) {
        $temp += $cities['population'];
    }

    return $temp;
}

var_dump(exercise1());

echo PHP_EOL .'2 uzduotis' .PHP_EOL;

function exercise2(): int
{
    /*
    Suskaičiuokite bendrą miestų populiaciją pasinaudodami funkcijomis array_column ir array_sum
    ir grąžinkite ją iš funkcijos
    */

    // array_column(array $array, int|string|null $column_key, int|string|null $index_key = null): array

    return array_sum(array_column(getCities(), 'population'));
}

var_dump(exercise2());

echo PHP_EOL .'3 uzduotis' .PHP_EOL;

function exercise3(): int
{
    /*
    Suskaičiuokite bendrą miestų populiaciją pasinaudodami funkcija array_reduce ir grąžinkite ją iš funkcijos
    */

    $result = array_reduce(getCities(), function (?int $sum, array $city) {
        $sum += $city['population'];
        return $sum;
    });
    return $result;
}

var_dump(exercise3());

echo PHP_EOL .'4 uzduotis' .PHP_EOL;

function exercise4(): int
{
    /*
    Suskaičiuokite populiaciją miestų, kurie yra didesni nei 25,000,000 gyventojų.
    Rinkites sau patogiausią skaičiavimo būdą.
    */
    $calc = array_reduce(getCities(), function (?int $sum, array $city) {
        if ($city['population'] > 25000000)
        $sum += $city['population'];
        return $sum;
    });

    return $calc;

    return 0;
}

var_dump(exercise4());

echo PHP_EOL .'5 uzduotis' .PHP_EOL;

function exercise5(): array
{
    /*
    Grąžinkite masyvą, kuriame būtų tik tie miestai, kurie yra didesni nei 25,000,000 gyventojų
    Rezultatas turi būti tokios pat struktūros, kaip ir pradinis miestų masyvas:
    [
        [
            'name' => 'Tokyo',
            'population' => 37435191,
        ],
        ...
    ]
    */

    $result = array_filter(getCities(), function (array $city) : array {
        if ($city['population'] > 25000000)
            return $city;
        return [];
    });
    return $result;
}


var_dump(exercise5());

echo PHP_EOL .'6 uzduotis' .PHP_EOL;

function exercise6(): int
{

    /*
    Suskaičiuokite ir grąžinkite bendrą užsakymo sumą.
    Prekėms, kurių pavadinimai nurodyti masyve $lowPriceItems, taikykite kainą 'priceLow'.
    Kitoms prekėms taikykite kainą 'priceRegular'.
    Bandykite panaudoti array_* funkcijas.
    */

    $lowPriceItems = ['t-shirt', 'shoes'];

    $orderItems = [
        [
            'name' => 't-shirt',
            'priceRegular' => 15,
            'priceLow' => 13,
            'quantity' => 3,
        ],
        [
            'name' => 'coat',
            'priceRegular' => 74,
            'priceLow' => 60,
            'quantity' => 6,
        ],
        [
            'name' => 'shirt',
            'priceRegular' => 25,
            'priceLow' => 20,
            'quantity' => 2,
        ],
        [
            'name' => 'shoes', 
            'priceRegular' => 115,
            'priceLow' => 100,
            'quantity' => 1,
        ],
    ];


    $array = array_reduce($orderItems, function(?int $sum, array $items)use($lowPriceItems){
        if (in_array($items['name'], $lowPriceItems)){
            return $sum += $items['priceLow'] * $items['quantity'];
        }
            return $sum += $items['priceRegular'] * $items['quantity'];
    });


    return $array;
}

var_dump(exercise6());

echo PHP_EOL .'7 uzduotis' .PHP_EOL;

function exercise7(): array
{
    $transactions = [
        [
            'total' => 200,
            'status' => 'error',
        ],
        [
            'total' => 150,
            'status' => 'completed',
        ],
    ];

    /*
    Išfiltruokite masyvą, kurių 'status' reikšmė yra 'error' ir grąžinkite pamodifikuotą masyvą.
    naudokite array_filter.
    */



    return array_filter($transactions, function (array $check){
        if ($check['status'] === 'error'){
            return $check;
        }
    });
}

var_dump(exercise7());

echo PHP_EOL .'8 uzduotis' .PHP_EOL;

// Žr. kitą užduotį
function getProducts(): array
{
    return [
        'chair' => [
            'type' => 'furniture',
            'name' => 'Best chair',
            'price' => 15,
        ],
        'lamp' => [
            'type' => 'lighting',
            'name' => 'Ultimate lamp',
            'price' => 99,
        ],
        'sofa' => [
            'type' => 'furniture',
            'name' => 'Soft sofa',
            'price' => 350
        ],
    ];
}

function exercise8(): array
{
    $products = getProducts();
    $fridge = [
        'type' => 'appliance',
        'name' => 'Coolest fridge',
        'price' => 200,
    ];
    /*
    Į masyvą $products pridėkite naują narį ir grąžinkite naujajį masyvą. Nario 'key' - 'fridge'.
    Nario reikšmė - $fridge
    */

    $products['fridge'] = $fridge;

    return $products;
}

var_dump(exercise8());

echo PHP_EOL .'9 uzduotis' .PHP_EOL;


function exercise9(): float
{
    $products = getProducts();
    /*
    Raskite ir grąžinkite visų produktų kainų vidurkį.
    */
    $i = 1;
    return array_reduce($products, function (?float $average, array $product)use($products){
        if (end($products) !== $product) {
            return $average += $product['price'];
        }
        return ($average + $product['price'])/count($product);
    });
}

var_dump(exercise9());

echo PHP_EOL .'10 uzduotis' .PHP_EOL;

function exercise10(): array
{
    $transactions = [
        [
            'count' => 2,
            'price' => 13,
        ],
        [
            'count' => 15,
            'price' => 14,
        ],
    ];
    /*
    Kiekvienai iš transakcijų, esančių kintamajame $transactions, suskaičiuokite galutinę sumą ir pridėkite į
    transakciją su raktu 'total'. Grąžinkite $transactions iš funkcijos.
    Tikėkitės, kad transakcijų skaičius gali išaugti. Jų gali būti ne 2, o 100. Dėl to naudokite ciklą.
    Laukiamas rezultatas:
    [
        [
            'count' => 2,
            'price' => 13,
            'total' => 26,
        ],
        ...
    ];
    */
        $transactions = array_map(function($item){
            $item['totla'] = $item['count'] * $item['price'];
            return $item;
        },$transactions);
        
    return $transactions;
}

var_dump(exercise10());