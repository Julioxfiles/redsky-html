<?php
declare(strict_types=1);

use RedSky\Html\Components\Navigation\ToolBarItem\ToolBarItem;
use RedSky\Html\Components\Graphics\Icon\Icon;
use RedSky\Html\Components\Feedback\Tooltip\Tooltip;
use RedSky\Html\Components\Navigation\ToolBar\ToolBar;

/**
 * ToolBarItem and ToolBar component examples.
 *
 * @package RedSky\Html\Components\Navigation\ToolBarItem
 */

// ============================================================
// ToolBarItem examples
// ============================================================

// Basic button
$item = new ToolBarItem('Save');

echo $item->render();


// Button with icon
$item = (new ToolBarItem('Save'))
    ->addChild(
        (new Icon('save'))
            ->style('color', '#3498db')
    );

echo $item->render();


// Active button
$item = (new ToolBarItem('Bold'))
    ->active();

echo $item->render();


// Disabled button
$item = (new ToolBarItem('Delete'))
    ->disabled();

echo $item->render();


// Button with tooltip
$item = (new ToolBarItem('Information'))
    ->tooltip('More information');

echo $item->render();


// Navigation link
$item = (new ToolBarItem('Dashboard', 'a'))
    ->href('/dashboard');

echo $item->render();


// Active navigation link
$item = (new ToolBarItem('Profile', 'a'))
    ->href('/profile')
    ->active();

echo $item->render();


// ============================================================
// ToolBarItem with colored icons and tooltips
// ============================================================

// Save
$item = (new ToolBarItem())
    ->addChild(
        (new Tooltip('Save document'))
            ->background('#2980b9')
            ->color('#ffffff')
            ->addChild(
                (new Icon('save'))
                    ->style('color', '#3498db')
            )
    );

echo $item->render();


// Edit
$item = (new ToolBarItem())
    ->addChild(
        (new Tooltip('Edit document'))
            ->background('#27ae60')
            ->color('#ffffff')
            ->addChild(
                (new Icon('pencil'))
                    ->style('color', '#2ecc71')
            )
    );

echo $item->render();


// Delete
$item = (new ToolBarItem())
    ->addChild(
        (new Tooltip('Delete document'))
            ->background('#c0392b')
            ->color('#ffffff')
            ->addChild(
                (new Icon('trash'))
                    ->style('color', '#e74c3c')
            )
    );

echo $item->render();


// Settings
$item = (new ToolBarItem())
    ->addChild(
        (new Tooltip('Application settings'))
            ->background('#8e44ad')
            ->color('#ffffff')
            ->addChild(
                (new Icon('settings'))
                    ->style('color', '#9b59b6')
            )
    );

echo $item->render();


// Information
$item = (new ToolBarItem())
    ->addChild(
        (new Tooltip('More information'))
            ->background('#f39c12')
            ->color('#202020')
            ->addChild(
                (new Icon('info'))
                    ->style('color', '#f1c40f')
            )
    );

echo $item->render();


// Home
$item = (new ToolBarItem())
    ->addChild(
        (new Tooltip('Go to dashboard'))
            ->background('#34495e')
            ->color('#ffffff')
            ->addChild(
                (new Icon('house'))
                    ->style('color', '#1abc9c')
            )
    );

echo $item->render();


// ============================================================
// Small Toolbar
// ============================================================

$smallToolbar = (new ToolBar())
    ->orientation('horizontal')
    ->addClass('toolbar-small');

$smallToolbar->addLink(
    '/dashboard',
    (new Icon('house'))->style('color', '#3498db'),
    'Dashboard'
);

$smallToolbar->addAction(
    'saveDocument()',
    (new Icon('save'))->style('color', '#2ecc71'),
    'Save document'
);

$smallToolbar->addAction(
    'editDocument()',
    (new Icon('pencil'))->style('color', '#f39c12'),
    'Edit document'
);

$smallToolbar->addAction(
    'deleteDocument()',
    (new Icon('trash'))->style('color', '#e74c3c'),
    'Delete document'
);

$smallToolbar->addLink(
    '/settings',
    (new Icon('settings'))->style('color', '#9b59b6'),
    'Settings'
);

$smallToolbar->addAction(
    'showInformation()',
    (new Icon('info'))->style('color', '#1abc9c'),
    'Information'
);


// ============================================================
// Medium Toolbar
// ============================================================

$mediumToolbar = (new ToolBar())
    ->orientation('horizontal')
    ->addClass('toolbar-medium');

$mediumToolbar->addLink(
    '/dashboard',
    (new Icon('house'))->style('color', '#3498db'),
    'Dashboard'
);

$mediumToolbar->addAction(
    'saveDocument()',
    (new Icon('save'))->style('color', '#2ecc71'),
    'Save document'
);

$mediumToolbar->addAction(
    'editDocument()',
    (new Icon('pencil'))->style('color', '#f39c12'),
    'Edit document'
);

$mediumToolbar->addAction(
    'deleteDocument()',
    (new Icon('trash'))->style('color', '#e74c3c'),
    'Delete document'
);

$mediumToolbar->addLink(
    '/settings',
    (new Icon('settings'))->style('color', '#9b59b6'),
    'Settings'
);

$mediumToolbar->addAction(
    'showInformation()',
    (new Icon('info'))->style('color', '#1abc9c'),
    'Information'
);


// ============================================================
// Big Toolbar
// ============================================================

$bigToolbar = (new ToolBar())
    ->orientation('horizontal')
    ->addClass('toolbar-big');

$bigToolbar->addLink(
    '/dashboard',
    (new Icon('house'))->style('color', '#3498db'),
    'Dashboard'
);

$bigToolbar->addAction(
    'saveDocument()',
    (new Icon('save'))->style('color', '#2ecc71'),
    'Save document'
);

$bigToolbar->addAction(
    'editDocument()',
    (new Icon('pencil'))->style('color', '#f39c12'),
    'Edit document'
);

$bigToolbar->addAction(
    'deleteDocument()',
    (new Icon('trash'))->style('color', '#e74c3c'),
    'Delete document'
);

$bigToolbar->addLink(
    '/settings',
    (new Icon('settings'))->style('color', '#9b59b6'),
    'Settings'
);

$bigToolbar->addAction(
    'showInformation()',
    (new Icon('info'))->style('color', '#1abc9c'),
    'Information'
);


// ============================================================
// Render all three toolbars
// ============================================================

echo '<h3>Small Toolbar</h3>';
echo $smallToolbar->render();

echo '<br>';

echo '<h3>Medium Toolbar</h3>';
echo $mediumToolbar->render();

echo '<br>';

echo '<h3>Big Toolbar</h3>';
echo $bigToolbar->render();
