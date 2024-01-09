StoreHours
StoreHours es una clase de Java que proporciona funcionalidad para gestionar horarios de una tienda y verificar si la tienda está abierta en un momento dado, considerando horarios regulares y excepciones.

Uso
La clase StoreHours se puede utilizar para verificar si una tienda está abierta en un momento específico del día. Utiliza los métodos proporcionados para:

isOpen(): Verificar si la tienda está abierta en el momento actual.
hours(): Obtener los horarios regulares para el día actual.
exceptions(): Obtener excepciones programadas para el día actual.

Ejemplo de Uso
// Ejemplo de creación de instancias de StoreHours
Map<String, String[]> regularHours = new HashMap<>();
// Agrega los horarios regulares para cada día de la semana

Map<String, String[]> exceptions = new HashMap<>();
// Agrega las excepciones para fechas específicas

// Crea una instancia de StoreHours
StoreHours storeHours = new StoreHours(regularHours, exceptions);

// Verifica si la tienda está abierta en este momento
boolean isOpen = storeHours.isOpen();
System.out.println("¿La tienda está abierta ahora? " + (isOpen ? "Sí" : "No"));

Métodos Principales
isOpen(): Devuelve un booleano indicando si la tienda está abierta en el momento actual.
hours(): Devuelve los horarios regulares para el día actual.
exceptions(): Devuelve excepciones programadas para el día actual.
Requisitos
Java 8 o superior.
Contribuciones
Las contribuciones son bienvenidas. Si encuentras algún problema o tienes alguna mejora, ¡no dudes en abrir un issue o enviar un pull request!

Licencia
Este proyecto está bajo la Licencia Apache 2.0.
