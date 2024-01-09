import java.util.HashMap;
import java.util.Map;

public class Main {
    public static void main(String[] args) {
        // Crea un mapa para los horarios regulares
        Map<String, String[]> regularHours = new HashMap<>();
        regularHours.put("mon", new String[]{"09:00-17:00"});
        regularHours.put("tue", new String[]{"09:00-22:00"});
        // Añade los horarios para los otros días según necesites

        // Crea un mapa para las excepciones
        Map<String, String[]> exceptions = new HashMap<>();
        exceptions.put("1/1", new String[]{"10:00-14:00"});
        exceptions.put("12/25", new String[]{"Closed"});

        // Añade las excepciones para otras fechas según necesites
        // Crea una instancia de StoreHours
        StoreHours storeHours = new StoreHours(regularHours, exceptions);

        // Verifica si la tienda está abierta ahora mismo
        boolean isOpen = storeHours.isOpen();
        System.out.println("¿La tienda está abierta ahora? " + (isOpen ? "Sí" : "No"));
    }
}