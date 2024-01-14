<h1>StoreHours</h1>
<p>StoreHours es una clase de Java que proporciona funcionalidad para gestionar horarios de una ubicación y verificar si la tienda está abierta en un momento dado, considerando horarios regulares y excepciones.</p>

<h2>Uso</h2>
<p>La clase StoreHours se puede utilizar para verificar si una tienda está abierta en un momento específico del día. Utiliza los métodos proporcionados para:</p>

<ul>
  <li><strong>isOpen():</strong> Verificar si la tienda está abierta en el momento actual.</li>
  <li><strong>hours():</strong> Obtener los horarios regulares para el día actual.</li>
  <li><strong>exceptions():</strong> Obtener excepciones programadas para el día actual.</li>
</ul>

<h2>Ejemplo de Uso</h2>
<pre><code>
// Ejemplo de creación de instancias de StoreHours
Map&lt;String, String[]&gt; regularHours = new HashMap&lt;&gt;();
// Agrega los horarios regulares para cada día de la semana

Map&lt;String, String[]&gt; exceptions = new HashMap&lt;&gt;();
// Agrega las excepciones para fechas específicas

// Crea una instancia de StoreHours
StoreHours storeHours = new StoreHours(regularHours, exceptions);

// Verifica si la tienda está abierta en este momento
boolean isOpen = storeHours.isOpen();
System.out.println("¿La tienda está abierta ahora? " + (isOpen ? "Sí" : "No"));
</code></pre>

<h2>Métodos Principales</h2>
<ul>
  <li><strong>isOpen():</strong> Devuelve un booleano indicando si la tienda está abierta en el momento actual.</li>
  <li><strong>hours():</strong> Devuelve los horarios regulares para el día actual.</li>
  <li><strong>exceptions():</strong> Devuelve excepciones programadas para el día actual.</li>
</ul>

<h2>Requisitos</h2>
<p>Java 8 o superior.</p>

<h2>Contribuciones</h2>
<p>Las contribuciones son bienvenidas. Si encuentras algún problema o tienes alguna mejora, ¡no dudes en abrir un issue o enviar un pull request!</p>

<h2>Licencia</h2>
<p>Este proyecto está bajo la Licencia Creative Commons Atribución-NoComercial-CompartirIgual 4.0 Internacional (CC BY-NC-SA 4.0).</p>

<p>Consulta el texto completo de la licencia en: <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/legalcode">CC BY-NC-SA 4.0</a></p>
