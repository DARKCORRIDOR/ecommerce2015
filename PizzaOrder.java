import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;

public class PizzaOrder {

public static void send() {

try {
// make json string, try also hamburger
String json = "{\"name\":\"Frank\",\"food\":\"pizza\",\"quantity\":3}";

// send as http get request
URL url = new URL("http://localhost/ecommerce/pizza.php?order=s"+json);
URLConnection conn = url.openConnection();

// Get the response
BufferedReader rd = new BufferedReader(new InputStreamReader(conn.getInputStream()));
String line;
while ((line = rd.readLine()) != null) {
System.out.println(line);
}
rd.close();
} catch (Exception e) {
e.printStackTrace();
}
}

public static void main(String[] args) {
send();
}
}

