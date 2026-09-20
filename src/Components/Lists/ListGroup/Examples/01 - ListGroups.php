<?php

declare(strict_types=1);

use RedSky\Html\Components\Lists\ListGroup\ListGroup;
use RedSky\Html\Components\Lists\ListItem\ListItem;
use RedSky\Html\Components\Navigation\Link\Link;

/*
 * Basic ListGroup
 *
 * The list-group and list-group-item classes are applied
 * automatically by the ListGroup component.
 */

$listGroup = new ListGroup();

$listGroup
    ->addItem(new ListItem('Users'))
    ->addItem(new ListItem('Products'))
    ->addItem(new ListItem('Orders'));


/*
 * ListGroup with links
 *
 * The Link is placed inside the ListItem.
 */

$linkGroup = new ListGroup();

$users = new ListItem();
$users->addChild(
    new Link('/users', 'Users')
);

$products = new ListItem();
$products->addChild(
    new Link('/products', 'Products')
);

$orders = new ListItem();
$orders->addChild(
    new Link('/orders', 'Orders')
);

$linkGroup
    ->addItem($users)
    ->addItem($products)
    ->addItem($orders);


/*
 * Using class()
 *
 * The standard list-group-item class is still added
 * automatically by ListGroup. Additional classes can be
 * supplied explicitly when needed.
 */

$styledGroup = new ListGroup();

$active = new ListItem('Active Item');
$active->class('list-group-item active');

$action = new ListItem('Action Item');
$action->class('list-group-item list-group-item-action');

$styledGroup
    ->addItem($active)
    ->addItem($action);


/*
 * Flush variant.
 *
 * The ListGroup component provides the base class automatically.
 * The variant class is supplied explicitly.
 */

$flushGroup = new ListGroup();
$flushGroup->class('list-group list-group-flush');

$flushGroup
    ->addItem(new ListItem('First item'))
    ->addItem(new ListItem('Second item'))
    ->addItem(new ListItem('Third item'));


/*
 * Horizontal variant.
 */

$horizontalGroup = new ListGroup();
$horizontalGroup->class('list-group list-group-horizontal');

$horizontalGroup
    ->addItem(new ListItem('Home'))
    ->addItem(new ListItem('Users'))
    ->addItem(new ListItem('Settings'));


/*
 * Render all examples.
 */

echo '<h2>Basic ListGroup</h2>';
echo $listGroup;

echo '<h2>ListGroup with Links</h2>';
echo $linkGroup;

echo '<h2>Using class()</h2>';
echo $styledGroup;

echo '<h2>Flush ListGroup</h2>';
echo $flushGroup;

echo '<h2>Horizontal ListGroup</h2>';
echo $horizontalGroup;

$menu = new ListGroup();

$users = new ListItem();
$users->addChild(
    new Link('/users', 'Users')
);

$products = new ListItem();
$products->addChild(
    new Link('/products', 'Products')
);

$orders = new ListItem();
$orders->addChild(
    new Link('/orders', 'Orders')
);

$menu
    ->class('list-group list-group-menu')
    ->addItem($users)
    ->addItem($products)
    ->addItem($orders);

echo '<h2>Menu Options ListGroup</h2>';
echo $menu;

/** Array Data Menu Options */

$options = [
    "/users" => "Users",
    "/products" => "Products",
    "/orders" => "Orders"
];

$menu = new ListGroup();

foreach($options as $uri => $option) {
    $listItem = new ListItem();
    $listItem->addChild(
        new Link($uri,$option)
    );
    $menu->class('list-group list-group-menu')
        ->addItem($listItem);
}

echo '<h2>Array Menu Options ListGroup</h2>';
echo $menu;