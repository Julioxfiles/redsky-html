Voy a preparar la versión mejorada de `Modal.php`.

Antes de generarla, voy a aplicar estas mejoras siguiendo el patrón que hemos venido usando en `redsky-html`:

1. Separar responsabilidades:

   * `Modal` seguirá siendo un componente HTML.
   * No agregaremos lógica JS dentro de PHP.
   * Solo expondrá atributos `data-*` para que los behaviors (`Closable`, `Dismissible`, `Focusable`, `Animation`, `Draggable`, `Positionable`) puedan trabajar.

2. Mejoras de estructura:

   * Agregar soporte correcto para `content()` heredado de `HtmlComponent`.
   * Mantener compatibilidad con `HtmlComponent::renderChildren()`.
   * Evitar IDs duplicados para títulos.
   * Mejorar atributos ARIA:

     * `aria-describedby`
     * `aria-hidden`
     * `tabindex="-1"`

3. Integración con behaviors:

   * `data-redsky-behavior="modal"`
   * `data-animation`
   * `data-closable`
   * `data-dismissible`
   * `data-focusable`
   * `data-draggable`
   * `data-positionable`

4. Mejoras API:

   * Métodos booleanos consistentes:

     * `isOpen()`
     * `isDraggable()`
     * `locksBodyScroll()`
   * Mantener fluent API.
   * Validaciones conservadas.

5. Mantener filosofía RedSky:

   * PHP genera estructura.
   * JS controla interacción.
   * CSS controla apariencia.
   * No dependencias externas.

El archivo será largo, así que lo entregaré completo en el siguiente mensaje como `Modal.php`.
Voy a crear la versión mejorada completa de `Modal.php`.

Las mejoras que voy a aplicar sobre tu versión actual serán:

* Mantener la filosofía de `redsky-html`: componente PHP neutral, sin CSS ni JS.
* Mejor integración con los behaviors que acabamos de definir:

  * `Draggable`
  * `Focusable`
  * `Keyboard`
  * `OutsideClick`
  * `Positionable`
  * `Resizable`
  * `Toggleable`
  * `Dismissible`
* Evitar lógica duplicada de estado que debe pertenecer al JS.
* Mejorar atributos `data-*` para que los behaviors puedan inicializarse automáticamente.
* Mejorar accesibilidad:

  * `aria-hidden`
  * `aria-labelledby`
  * `aria-describedby`
  * IDs únicos.
* Separar mejor:

  * configuración del componente
  * estado inicial
  * metadata para JS
  * estructura HTML.
* Agregar soporte correcto para:

  * contenido interno
  * footer con acciones
  * backdrop
  * dialog
  * clases externas mediante `HtmlComponent`.
* Mantener PHP 8.x:

  * `declare(strict_types=1);`
  * typed properties
  * `static` fluent API
  * sin `?>`.

Te entregaré solamente el archivo completo:

`src/Components/Feedback/Modal.php`

en el siguiente mensaje.
