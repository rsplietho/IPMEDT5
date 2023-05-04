#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "FreshTomato24";
const char* password = "IATbox08";
const char* host = "192.168.1.11";
const String url = "/get_text";

WiFiClient client;
HTTPClient http;

void setup() {
  Serial.begin(115200);

  // Connect to Wi-Fi network
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }

  Serial.println("Connected to WiFi");

  // Initialize the HTTP client
  http.begin(client, host, 80, url);
  http.setTimeout(5000);  // set the timeout for HTTP requests to 5 seconds
}

void loop() {
  // Make the HTTP request and get the text from the server
  String text = httpRequest();
  Serial.println(text);  // print the text received from the server

  delay(5000);  // delay for 5 seconds before making the next request
}

String httpRequest() {
  // Make the HTTP request
  int httpCode = http.GET();
  String response = "";

  if (httpCode > 0) {
    if (httpCode == HTTP_CODE_OK) {
      response = http.getString();
    }
  } else {
    Serial.println("Connection failed");
  }

  http.end();  // close the connection to the server
  return response;
}
