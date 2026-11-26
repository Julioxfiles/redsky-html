<?php
declare(strict_types=1);

use RedSky\Html\Components\Navigation\ToolBar\ToolBar;
use RedSky\Html\Components\Graphics\Icon\Icon;

/**
 * ToolBar sizes examples.
 *
 * Demonstrates all five available toolbar sizes.
 *
 * @package RedSky\Html\Components\Navigation\ToolBar
 */

// ============================================================
// Tiny Toolbar
// ============================================================

$tinyToolbar = (new ToolBar())
    ->orientation('horizontal')
    ->addClass('toolbar-tiny');

$tinyToolbar->addAction(
    'newDocument()',
    (new Icon('file-plus'))->style('color', '#3498db'),
    'New document'
);

$tinyToolbar->addAction(
    'saveDocument()',
    (new Icon('save'))->style('color', '#2ecc71'),
    'Save document'
);

$tinyToolbar->addAction(
    'editDocument()',
    (new Icon('pencil'))->style('color', '#f39c12'),
    'Edit document'
);

$tinyToolbar->addAction(
    'deleteDocument()',
    (new Icon('trash'))->style('color', '#e74c3c'),
    'Delete document'
);


// ============================================================
// Small Toolbar
// ============================================================

$smallToolbar = (new ToolBar())
    ->orientation('horizontal')
    ->addClass('toolbar-small');

$smallToolbar->addAction(
    'newDocument()',
    (new Icon('file-plus'))->style('color', '#3498db'),
    'New document'
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


// ============================================================
// Medium Toolbar
// ============================================================

$mediumToolbar = (new ToolBar())
    ->orientation('horizontal')
    ->addClass('toolbar-medium');

$mediumToolbar->addAction(
    'newDocument()',
    (new Icon('file-plus'))->style('color', '#3498db'),
    'New document'
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


// ============================================================
// Large Toolbar
// ============================================================

$largeToolbar = (new ToolBar())
    ->orientation('horizontal')
    ->addClass('toolbar-large');

$largeToolbar->addAction(
    'newDocument()',
    (new Icon('file-plus'))->style('color', '#3498db'),
    'New document'
);

$largeToolbar->addAction(
    'saveDocument()',
    (new Icon('save'))->style('color', '#2ecc71'),
    'Save document'
);

$largeToolbar->addAction(
    'editDocument()',
    (new Icon('pencil'))->style('color', '#f39c12'),
    'Edit document'
);

$largeToolbar->addAction(
    'deleteDocument()',
    (new Icon('trash'))->style('color', '#e74c3c'),
    'Delete document'
);


// ============================================================
// Extra Large Toolbar
// ============================================================

$xlToolbar = (new ToolBar())
    ->orientation('horizontal')
    ->addClass('toolbar-xl');

$xlToolbar->addAction(
    'newDocument()',
    (new Icon('file-plus'))->style('color', '#3498db'),
    'New document'
);

$xlToolbar->addAction(
    'saveDocument()',
    (new Icon('save'))->style('color', '#2ecc71'),
    'Save document'
);

$xlToolbar->addAction(
    'editDocument()',
    (new Icon('pencil'))->style('color', '#f39c12'),
    'Edit document'
);

$xlToolbar->addAction(
    'deleteDocument()',
    (new Icon('trash'))->style('color', '#e74c3c'),
    'Delete document'
);


// ============================================================
// Render all examples
// ============================================================

echo '<h3>Tiny Toolbar (22px)</h3>';
echo $tinyToolbar->render();

echo '<div style="height: 25px;"></div>';

echo '<h3>Small Toolbar (28px)</h3>';
echo $smallToolbar->render();

echo '<div style="height: 25px;"></div>';

echo '<h3>Medium Toolbar (36px)</h3>';
echo $mediumToolbar->render();

echo '<div style="height: 25px;"></div>';

echo '<h3>Large Toolbar (46px)</h3>';
echo $largeToolbar->render();

echo '<div style="height: 25px;"></div>';

echo '<h3>Extra Large Toolbar (58px)</h3>';
echo $xlToolbar->render();
