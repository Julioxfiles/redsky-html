<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Components\Buttons\Button;
use RedSky\Html\Components\Feedback\Modal;
use RedSky\Html\Metadata\Example;

#[Example(
    title: 'Confirmation Modal',
    code: <<<'PHP'
    $openButton = (new Button('Delete Customer'))
        ->attribute(
            'data-modal-target',
            'confirm-modal'
        );

    $acceptButton = (new Button('Accept'))
        ->attribute(
            'data-modal-confirm',
            ''
        );

    $cancelButton = (new Button('Cancel'))
        ->attribute(
            'data-modal-close',
            ''
        );

    $modal = (new Modal())
        ->id('confirm-modal')
        ->title('Confirm Delete')
        ->draggable()
        ->text(
            'Are you sure you want to delete this customer?'
        )
        ->addChild($acceptButton)
        ->addChild($cancelButton);

    echo $openButton->render();
    echo $modal->render();
    PHP,
    description: 'Creates a confirmation modal with Accept and Cancel actions.',
    language: 'php',
    output: '<button type="button" data-modal-target="confirm-modal">Delete Customer</button><div id="confirm-modal" data-redsky-component="modal" role="dialog" aria-modal="true" aria-labelledby="confirm-modal-title" hidden data-modal-position="center" data-modal-animation="fade" data-modal-size="medium" data-modal-close-on-backdrop="true" data-modal-close-on-escape="true" data-modal-lock-body-scroll="true" data-modal-trap-focus="true" data-modal-restore-focus="true" data-modal-draggable="true" data-modal-drag-boundary="viewport" data-modal-reposition-on-resize="true" data-modal-reposition-on-scroll="true"><div data-modal-backdrop></div><div data-modal-dialog><div data-modal-header><h2 id="confirm-modal-title" data-modal-title>Confirm Delete</h2><button type="button" data-modal-close aria-label="Close modal">&times;</button></div><div data-modal-body>Are you sure you want to delete this customer?</div><div data-modal-footer><button type="button" data-modal-confirm>Accept</button><button type="button" data-modal-close>Cancel</button></div></div></div>'
)]

#[Example(
    title: 'User Registration Form Modal',
    code: <<<'PHP'
    $openButton = (new Button('New User'))
        ->attribute(
            'data-modal-target',
            'user-form-modal'
        );


    $form = '
        <form id="user-form">

            <label for="name">
                Name
            </label>

            <input
                id="name"
                type="text"
                name="name"
            >


            <label for="email">
                Email
            </label>

            <input
                id="email"
                type="email"
                name="email"
            >


            <label for="password">
                Password
            </label>

            <input
                id="password"
                type="password"
                name="password"
            >


            <label for="role">
                Role
            </label>

            <select
                id="role"
                name="role"
            >
                <option>
                    Administrator
                </option>

                <option>
                    User
                </option>

                <option>
                    Guest
                </option>
            </select>


            <p>
                Status
            </p>


            <label>
                <input
                    type="radio"
                    name="status"
                    value="active"
                >

                Active
            </label>


            <label>
                <input
                    type="radio"
                    name="status"
                    value="inactive"
                >

                Inactive
            </label>


            <br>


            <label>
                <input
                    type="checkbox"
                    name="notifications"
                >

                Receive notifications
            </label>

        </form>
    ';


    $saveButton = (new Button('Save'))
        ->attribute(
            'type',
            'submit'
        )
        ->attribute(
            'form',
            'user-form'
        );


    $cancelButton = (new Button('Cancel'))
        ->attribute(
            'data-modal-close',
            ''
        );


    $modal = (new Modal())
        ->id('user-form-modal')
        ->title('Create User')
        ->size('large')
        ->draggable()
        ->html($form)
        ->addChild($saveButton)
        ->addChild($cancelButton);


    echo $openButton->render();

    echo $modal->render();
    PHP,
    description: 'Creates a draggable modal containing a complete user registration form with inputs, select, radio buttons and checkbox controls.',
    language: 'php',
    output: '<button type="button" data-modal-target="user-form-modal">New User</button><div id="user-form-modal" data-redsky-component="modal" role="dialog" aria-modal="true" aria-labelledby="user-form-modal-title" hidden data-modal-position="center" data-modal-animation="fade" data-modal-size="large" data-modal-close-on-backdrop="true" data-modal-close-on-escape="true" data-modal-lock-body-scroll="true" data-modal-trap-focus="true" data-modal-restore-focus="true" data-modal-draggable="true" data-modal-drag-boundary="viewport" data-modal-reposition-on-resize="true" data-modal-reposition-on-scroll="true"><div data-modal-backdrop></div><div data-modal-dialog><div data-modal-header><h2 id="user-form-modal-title" data-modal-title>Create User</h2><button type="button" data-modal-close aria-label="Close modal">&times;</button></div><div data-modal-body><form id="user-form"><label for="name">Name</label><input id="name" type="text" name="name"><label for="email">Email</label><input id="email" type="email" name="email"><label for="password">Password</label><input id="password" type="password" name="password"><label for="role">Role</label><select id="role" name="role"><option>Administrator</option><option>User</option><option>Guest</option></select><p>Status</p><label><input type="radio" name="status" value="active">Active</label><label><input type="radio" name="status" value="inactive">Inactive</label><br><label><input type="checkbox" name="notifications">Receive notifications</label></form></div><div data-modal-footer><button type="submit" form="user-form">Save</button><button type="button" data-modal-close>Cancel</button></div></div></div>'
)]

#[Example(
    title: 'Open Modal with JavaScript',
    code: <<<'JAVASCRIPT'
    const button =
        document.querySelector(
            '[data-modal-target="customer-modal"]'
        );

    const modal =
        document.querySelector(
            '#customer-modal'
        );

    button.addEventListener(
        'click',
        () => {
            modal.open();
        }
    );
    JAVASCRIPT,
    description: 'Opens a RedSky Modal instance using JavaScript.',
    language: 'javascript',
    output: ''
)]
final class ModalExamples
{
}