import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;

public class connect {

public static void send() {

try {
// make json string, try also hamburger
//String json = "{\"Mobile\":\"0267773618\",\"SessionId\":01,\"ServiceCode\":\"712\", \"Type\":\"Initialization\",\"Message\":\"Welcome\",\"Operator\":\"AirtelGH\",\"Sequence\":1}";
String json = "{\"Type\":\"Initialization\"}";
  //System.out.println(json);
// send as http get request
URL url = new URL("http://localhost/ecommerce/USSDCode03.php?request="+json);
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