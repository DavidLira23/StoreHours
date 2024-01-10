<h1>StoreHours_PHP</h1>
<p>StoreHours_PHP es una clase de PHP que proporciona funcionalidad para gestionar horarios de una ubicación y verificar si la tienda está abierta en un momento dado, considerando horarios regulares y excepciones.</p>

<h2>Uso</h2>
<p>La clase StoreHours_PHP se puede utilizar para verificar si una tienda está abierta en un momento específico del día. Utiliza los métodos proporcionados para:</p>

<ul>
  <li>isOpen(): Verificar si la tienda está abierta en el momento actual.</li>
  <li>hours(): Obtener los horarios regulares para el día actual.</li>
  <li>exceptions(): Obtener excepciones programadas para el día actual.</li>
</ul>

<h2>Ejemplo de Uso</h2>
<pre><code>
// Ejemplo de creación de instancias de StoreHours_PHP
$regularHours = array();
// Agrega los horarios regulares para cada día de la semana

$exceptions = array();
// Agrega las excepciones para fechas específicas

// Crea una instancia de StoreHours_PHP
$storeHours = new StoreHours_PHP($regularHours, $exceptions);

// Verifica si la tienda está abierta en este momento
$isOpen = $storeHours->isOpen();
echo "¿La tienda está abierta ahora? " . ($isOpen ? "Sí" : "No");
</code></pre>

<h2>Métodos Principales</h2>
<ul>
  <li>isOpen(): Devuelve un booleano indicando si la tienda está abierta en el momento actual.</li>
  <li>hours(): Devuelve los horarios regulares para el día actual.</li>
  <li>exceptions(): Devuelve excepciones programadas para el día actual.</li>
</ul>

<h2>Requisitos</h2>
<p>PHP 8 o superior.</p>

<h2>Contribuciones</h2>
<p>Las contribuciones son bienvenidas. Si encuentras algún problema o tienes alguna mejora, ¡no dudes en abrir un issue o enviar un pull request!</p>

<h2>Licencia</h2>
<p>Este proyecto está bajo la Licencia Apache 2.0.</p>
