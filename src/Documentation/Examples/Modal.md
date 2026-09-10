
The key principle is: **everything should be configurable**. The Modal should provide sensible defaults, but the application can override almost everything.

# RedSky Modal — Complete Feature List

## 1. Basic structure

Every Modal has the same structure:

```text
Modal
│
├── Backdrop
│
└── Dialog
    │
    ├── Header
    │   ├── Title
    │   └── Close button
    │
    ├── Body
    │   └── Any content
    │
    └── Footer
        └── Any content
```

The body/footer can contain:

* Text
* HTML
* Forms
* Inputs
* Selects
* Tables
* DataGrid
* Buttons
* RedSky components
* Custom elements

No application-specific Modal subclasses are necessary.

---

# 2. PHP API

The PHP component should be able to configure things such as:

```php
new Modal()
    ->id('customer-modal')
    ->title('Edit Customer')
    ->text('Customer information')
    ->open();
```

And:

```php
$modal
    ->html($html)
    ->addChild($component)
    ->open();
```

The exact method names can be finalized when we implement it.

---

# 3. JavaScript-created Modal

JavaScript should be able to create a Modal without PHP:

```javascript
const modal = RedSkyModal.create({
    id: 'customer-modal',
    title: 'Edit Customer',
    body: '...',
    footer: '...'
});
```

It must generate the **same HTML structure** as a PHP-rendered Modal.

That is important.

```text
PHP Modal ─────────┐
                   ├──> Same DOM structure
JS Modal ──────────┘
                         ↓
                     Modal.js
```

---

# 4. Open / close

Basic operations:

```javascript
modal.open();
modal.close();
modal.toggle();
```

Also:

```javascript
modal.isOpen();
modal.destroy();
```

`close()` should hide it.

`destroy()` should remove it and clean up its event listeners/resources.

---

# 5. Close button

Every Modal has a close button by default.

It should be configurable:

```text
showCloseButton: true
```

Possible configuration:

```text
closeButton
closeButtonLabel
closeButtonAriaLabel
```

And the developer can disable it if necessary.

---

# 6. Close behavior

All of these should be configurable independently:

```text
closeOnButton
closeOnBackdrop
closeOnEscape
```

For example:

```javascript
closeOnBackdrop: false
```

means clicking outside the Dialog doesn't close it.

---

# 7. Callbacks / events

This is one of the areas where I agree with you: **we should expose as many useful events as reasonably possible.**

Potential lifecycle events:

```text
beforeOpen
open
afterOpen

beforeClose
close
afterClose

beforeDestroy
destroy
```

Interaction events:

```text
backdropClick
closeButtonClick
escape
```

Drag events:

```text
dragStart
drag
dragEnd
```

Position events:

```text
beforePosition
position
afterPosition
```

Anchor events:

```text
anchorPosition
anchorLost
```

Focus events:

```text
focus
blur
```

Content events:

```text
contentChange
```

---

# 8. Execute JavaScript after closing

Yes — exactly what you just requested.

For example:

```javascript
const modal = RedSkyModal.create({
    title: 'Customer deleted',
    body: 'The customer was successfully deleted.',
    onClose: () => {
        refreshCustomers();
    }
});
```

Or through an event:

```javascript
modal.on('close', () => {
    refreshCustomers();
});
```

That means you can do:

```text
Close Modal
     ↓
close event
     ↓
refresh DataGrid
```

This will be particularly useful for AJAX operations.

---

# 9. Event registration

I'd support something like:

```javascript
modal.on('close', handler);
modal.on('open', handler);
modal.on('dragEnd', handler);
```

And potentially:

```javascript
modal.off('close', handler);
```

This allows applications to dynamically attach and remove behavior.

---

# 10. Positioning

This is one of the most important features.

Default:

```text
center
```

The Modal appears centered horizontally and vertically in the viewport.

But positioning should be configurable.

Possible strategies:

```text
center
top
bottom
left
right
anchor
custom
```

---

# 11. Smart anchor positioning

For:

```javascript
modal.openNear(editButton);
```

or:

```javascript
modal.open({
    anchor: editButton
});
```

the Modal should **inspect the viewport**.

It should calculate:

```text
Anchor rectangle
Modal dimensions
Viewport dimensions
Available space
Scroll position
```

Then decide where the Modal can fit.

For example:

```text
              ┌───────────────┐
              │    Modal      │
              └───────────────┘
                     ↑
                 Anchor
```

or:

```text
Anchor
   ↓
┌───────────────┐
│    Modal      │
└───────────────┘
```

or:

```text
        ┌───────────────┐
        │    Modal      │
        └───────────────┘
                 ↑
               Anchor
```

The algorithm should **never blindly choose below the anchor**.

---

# 12. Viewport protection

The Modal should try to remain completely visible.

If:

```text
available space < modal size
```

it should try another position.

If no ideal position exists:

```text
adjust position
```

and ultimately:

```text
center
```

if necessary.

---

# 13. Floating overlay

The Modal should be **above the page**, not inserted into the DataGrid's layout.

Conceptually:

```css
[data-modal-dialog] {
    position: fixed;
}
```

So:

```text
DataGrid
────────────────────
Row 1
Row 2
Row 3
      ┌───────────────┐
      │ Modal         │
      │               │
      └───────────────┘
Row 4
Row 5
```

The Modal floats over the rows.

---

# 14. Dragging

No jQuery.

Use native Pointer Events:

```text
pointerdown
pointermove
pointerup
```

Therefore:

* Mouse
* Touch
* Pen

can all work.

The header becomes the drag handle.

```text
┌─────────────────────────┐
│ Edit Customer       [X] │ ← drag
├─────────────────────────┤
│                         │
│        Content          │
│                         │
└─────────────────────────┘
```

---

# 15. Drag boundaries

The user shouldn't be able to accidentally drag the Modal completely outside the viewport.

We can configure whether boundaries are enforced.

For example:

```text
dragBoundary: 'viewport'
```

or potentially:

```text
dragBoundary: 'none'
```

---

# 16. Manual positioning

We should support:

```javascript
modal.center();
modal.moveTo(x, y);
modal.resetPosition();
```

So automatic positioning and manual positioning coexist.

---

# 17. Animations

Opening/closing animations should be configurable.

For example:

```text
none
fade
slideDown
slideUp
slideLeft
slideRight
zoom
```

The actual CSS implementation can remain separate from the JavaScript logic.

---

# 18. Size

Configurable sizes:

```text
small
medium
large
fullscreen
custom
```

And custom dimensions:

```javascript
width: '600px'
maxWidth: '90vw'
```

The viewport must still win over requested dimensions.

---

# 19. Responsive behavior

The Modal must adapt to:

* Desktop
* Laptop
* Tablet
* Mobile
* Portrait
* Landscape

A developer can request:

```text
width: 700px
```

but on a phone it should automatically become something like:

```text
max-width: calc(100vw - margins)
```

rather than overflowing the screen.

---

# 20. Modal scrolling

The page behind the Modal can optionally be locked:

```text
lockBodyScroll: true
```

The Modal itself should be able to scroll:

```text
┌─────────────────────┐
│ Header              │
├─────────────────────┤
│                     │
│ Large content       │
│                     │
│        ↕ scroll     │
│                     │
├─────────────────────┤
│ Footer              │
└─────────────────────┘
```

---

# 21. Focus management

When opened:

```text
clicked button
     ↓
Modal opens
     ↓
focus enters Modal
```

When closed:

```text
Modal closes
     ↓
focus returns to original button
```

Configurable:

```text
trapFocus: true
restoreFocus: true
```

---

# 22. Keyboard support

Default behavior:

```text
Escape → close
Tab    → stay inside Modal
```

Both configurable.

---

# 23. Accessibility

Support:

```html
role="dialog"
aria-modal="true"
aria-labelledby="..."
```

when appropriate.

The title should automatically be connected to `aria-labelledby`.

---

# 24. Multiple Modals

We should support a Modal stack.

For example:

```text
Modal A
   ↓
Modal B
   ↓
Modal C
```

The system manages:

```text
z-index
backdrops
focus
Escape
closing order
```

The top Modal receives keyboard interaction.

---

# 25. AJAX integration

This is a major part of the design.

Example:

```text
User clicks Delete
        ↓
AJAX
        ↓
PHP Controller
        ↓
JSON
        ↓
Modal.js
        ↓
Modal
        ↓
User confirms
        ↓
AJAX
        ↓
Update DataGrid
```

The Modal itself remains application-agnostic.

---

# 26. AJAX response security

Never blindly do:

```javascript
modal.innerHTML = response.message;
```

with untrusted data.

We need safe APIs for:

```text
text
HTML
attributes
URLs
```

and validation/sanitization where HTML is intentionally accepted.

Never:

```text
eval()
new Function()
server-provided JavaScript
inline event handlers
```

---

# 27. AJAX race protection

We should account for:

```text
Request A
Request B
```

where B is newer but A returns later.

The older response shouldn't overwrite the newer Modal state.

This should be part of the AJAX integration strategy rather than left to individual developers.

---

# 28. Alert

Convenience API:

```javascript
RedSkyModal.alert({
    title: 'Success',
    message: 'Customer saved.'
});
```

But internally:

```text
alert()
   ↓
generic Modal
```

Not a separate component.

---

# 29. Confirm

Something like:

```javascript
const confirmed = await RedSkyModal.confirm({
    title: 'Delete Customer',
    message: 'Are you sure?'
});
```

Then:

```javascript
if (confirmed) {
    deleteCustomer();
}
```

Again, it's just the generic Modal.

---

# 30. Prompt

Similarly:

```javascript
const value = await RedSkyModal.prompt({
    title: 'Customer name'
});
```

Internally it's simply:

```text
Generic Modal
    +
Input
    +
Buttons
```

No special Prompt component.

---

# 31. Custom actions

Footer actions should be completely configurable.

For example:

```text
[Cancel] [Save]
```

or:

```text
[No] [Yes, Delete]
```

or:

```text
[Close]
```

or completely custom RedSky components.

---

# 32. Action events

Buttons/actions should be able to execute JavaScript:

```text
Save clicked
     ↓
validation
     ↓
AJAX
     ↓
success
     ↓
close
     ↓
refresh DataGrid
```

The Modal should not dictate what happens.

---

# 33. Content replacement

JavaScript should be able to change:

```javascript
modal.title(...);
modal.body(...);
modal.footer(...);
```

without destroying the Modal.

---

# 34. Loading state

This would be very useful for AJAX:

```text
User clicks Save
       ↓
Modal
┌──────────────────────┐
│ Edit Customer        │
├──────────────────────┤
│ Saving...             │
│                      │
│        spinner        │
└──────────────────────┘
```

Something like:

```javascript
modal.loading(true);
```

and:

```javascript
modal.loading(false);
```

---

# 35. Error state

AJAX can return:

```json
{
    "status": "error",
    "code": "CUSTOMER_EXISTS",
    "message": "..."
}
```

The Modal can display the message without knowing what the error means.

---

# 36. Lifecycle cleanup

When:

```javascript
modal.destroy();
```

we should clean up:

* DOM references
* Event listeners
* Pointer handlers
* Keyboard handlers
* Resize/scroll observers
* timers
* promises/listeners associated with the instance

This is particularly important for dynamically created Modals.

---

# 37. Anchor lifecycle

If the anchor disappears:

```text
DataGrid row
    ↓
Modal anchored to row
    ↓
DataGrid refresh
    ↓
Row disappears
```

The Modal should not suddenly disappear.

It should preferably **detach from the anchor and remain visible**, unless configured otherwise.

---

# 38. Resize / orientation changes

If the viewport changes:

```text
desktop → mobile
portrait → landscape
browser resize
```

the Modal can recalculate its position.

This should be configurable.

---

# 39. Backdrop

Configurable:

```text
showBackdrop: true
backdropClose: true
backdropOpacity
backdropClass
```

And potentially:

```text
transparent backdrop
```

when a developer wants a floating contextual Modal without visually blocking the entire page.

---

# 40. Custom classes and attributes

Developers should be able to specify:

```text
id
class
data-*
aria-*
```

but the implementation must use safe attribute handling rather than blindly inserting arbitrary strings into HTML.

---

# 41. Security boundary

Most importantly:

```text
Modal.js ≠ security system
```

Server authorization must always happen on the server.

For example:

```text
User clicks Delete
       ↓
Modal asks "Are you sure?"
       ↓
AJAX DELETE
       ↓
SERVER verifies authorization
       ↓
SERVER deletes
```

The fact that the user can see or manipulate a Modal must never grant permission to perform the operation.

---

# The resulting architecture

Putting everything together:

```text
                    REDSKY MODAL
                         │
          ┌──────────────┴──────────────┐
          │                             │
      PHP Modal                    JavaScript
          │                             │
          └──────────────┬──────────────┘
                         ↓
                   Standard DOM
                         ↓
                     Modal.js
                         │
       ┌─────────────────┼─────────────────┐
       │                 │                 │
   Lifecycle         Positioning       Interaction
       │                 │                 │
   open/close         center            keyboard
   destroy            anchor            focus
   events             viewport           backdrop
                      responsive         buttons
                      custom             drag
                         │
                         │
              ┌──────────┴──────────┐
              │                     │
           Content                AJAX
              │                     │
        text / HTML            requests
        components             responses
        forms                  loading
        tables                 errors
              │                     │
              └──────────┬──────────┘
                         ↓
                     Security
```

**This is a very solid specification for `redsky-html` Modal.**

I would not start coding the final `Modal.js` until we turn this into a small **API contract**—the exact PHP methods, JavaScript methods, configuration object, event names, and HTML `data-*` attributes. That will prevent us from having to redesign the API halfway through implementation.
