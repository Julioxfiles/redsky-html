<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\Select\Select;


// ============================================================
// Example 1: Basic Select
// ============================================================

$basic = (new Select())
    ->name('country')
    ->option('Mexico', 'mx')
    ->option('United States', 'us')
    ->option('Canada', 'ca');

echo '<h4>Basic Select</h4>';
echo $basic;


// ============================================================
// Example 2: Select with a Placeholder Option
// ============================================================

$placeholder = (new Select())
    ->name('city')
    ->addAttribute('required', true)
    ->option('Select a city', '')
    ->option('Culiacán', 'culiacan')
    ->option('Mazatlán', 'mazatlan')
    ->option('Los Mochis', 'los-mochis');

echo '<h4>Select with Placeholder</h4>';
echo $placeholder;


// ============================================================
// Example 3: Select with a Preselected Option
// ============================================================

$selected = (new Select())
    ->name('language')
    ->option('English', 'en')
    ->option('Spanish', 'es')
    ->option('French', 'fr')
    ->selected('es');

echo '<h4>Preselected Option</h4>';
echo $selected;


// ============================================================
// Example 4: Select Using an Array
// ============================================================

$array = (new Select())
    ->name('department')
    ->options([
        'Customer Service' => 'customer-service',
        'Technical Support' => 'technical-support',
        'Sales' => 'sales',
        'Human Resources' => 'human-resources',
    ]);

echo '<h4>Select Using an Array</h4>';
echo $array;


// ============================================================
// Example 5: Required Select
// ============================================================

$required = (new Select())
    ->name('payment_method')
    ->required()
    ->option('Choose a payment method', '')
    ->option('Credit Card', 'credit-card')
    ->option('Bank Transfer', 'bank-transfer')
    ->option('PayPal', 'paypal');

echo '<h4>Required Select</h4>';
echo $required;


// ============================================================
// Example 6: Disabled Select
// ============================================================

$disabled = (new Select())
    ->name('account_type')
    ->option('Personal Account', 'personal')
    ->option('Business Account', 'business')
    ->selected('personal')
    ->disabled();

echo '<h4>Disabled Select</h4>';
echo $disabled;


// ============================================================
// Example 7: Multiple Selection
// ============================================================

$multiple = (new Select())
    ->name('skills[]')
    ->multiple()
    ->size(5)
    ->option('PHP', 'php')
    ->option('JavaScript', 'javascript')
    ->option('CSS', 'css')
    ->option('MySQL', 'mysql')
    ->option('Python', 'python');

echo '<form method="POST" action="/example">';
echo '<label for="skills">Select your skills</label>';

// The Select component needs an id for the associated label.
$multiple->addAttribute('id', 'skills');

echo $multiple;
echo '<button type="submit">Submit</button>';
echo '</form>';


// ============================================================
// Example 8: Small Select
// ============================================================

$small = (new Select())
    ->name('priority')
    ->addClass('select-sm')
    ->option('Low', 'low')
    ->option('Normal', 'normal')
    ->option('High', 'high');

echo '<h4>Small Select</h4>';
echo $small;


// ============================================================
// Example 9: Large Select
// ============================================================

$large = (new Select())
    ->name('region')
    ->addClass('select-lg')
    ->option('North America', 'north-america')
    ->option('South America', 'south-america')
    ->option('Europe', 'europe');

echo '<h4>Large Select</h4>';
echo $large;


// ============================================================
// Example 10: Select with Custom Attributes
// ============================================================

$custom = new Select([
    'name' => 'product_category',
    'options' => [
        'Computers' => 'computers',
        'Accessories' => 'accessories',
        'Software' => 'software',
    ],
    'selected' => 'accessories',
    'attributes' => [
        'aria-label' => 'Product category',
        'data-purpose' => 'product-filter',
    ],
]);

echo '<h4>Select with Custom Attributes</h4>';
echo $custom;