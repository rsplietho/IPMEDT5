#include <Adafruit_Protomatter.h>
#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "FreshTomato24";
const char* password = "IATbox08";
const char* host = "192.168.1.11";
const String url = "/get_text";
const String colourURL = "/get_colour";

WiFiClient client;
HTTPClient http;
HTTPClient ColourHTTP;

uint8_t rgbPins[] = { 15, 2, 4, 5, 18, 19 };
uint8_t addrPins[] = { 13, 12, 14 };
uint8_t clockPin = 25;
uint8_t latchPin = 27;
uint8_t oePin = 26;

// Last parameter = 'true' enables double-buffering, for flicker-free,
// buttery smooth animation. Note that NOTHING WILL SHOW ON THE DISPLAY
// until the first call to swapBuffers(). This is normal.

Adafruit_Protomatter matrix(
  32, 4, 1, rgbPins, 3, addrPins, clockPin, latchPin, oePin, true);

// Similar to F(), but for PROGMEM string pointers rather than literals
#define F2(progmem_ptr) (const __FlashStringHelper*)progmem_ptr

String message = "Geen ontvangst";

void setup() {
  matrix.begin();
  matrix.setTextWrap(false);  // Allow text to run off right edge
  matrix.setTextSize(2);
  Serial.begin(115200);  // Initialize serial communication

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }

  Serial.println("Connected to WiFi");

  // Initialize the HTTP client
  http.begin(client, host, 80, url);
  ColourHTTP.begin(client, host, 80, colourURL);
  http.setTimeout(5000);  // set the timeout for HTTP requests to 5 seconds
  ColourHTTP.setTimeout(5000);
}

void loop() {
  String text = httpRequest();
  uint16_t colour = colourRequest();
  if (message != text) {
    message = text;
  }
  // String colour = httpRequest("/get_colour");
  if (message.length() > 0) {
    int16_t textX = matrix.width();
    int16_t textMin = -message.length() * 12;
    while (textX > textMin) {
      matrix.fillScreen(0);
      matrix.setTextColor(colour);
      matrix.setCursor(textX, 1);
      matrix.print(message);
      textX--;
      matrix.show();
      delay(20);
    }
  }
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

uint16_t colourRequest() {
  // Make the HTTP request
  int httpCode = ColourHTTP.GET();
  String response = "";

  if (httpCode > 0) {
    if (httpCode == HTTP_CODE_OK) {
      response = ColourHTTP.getString();
    }
  } else {
    Serial.println("Connection failed");
  }

  ColourHTTP.end();  // close the connection to the server

  String rgb565_string = "63279";                 // example RGB565 value as a String
  int rgb565_int = rgb565_string.toInt();         // convert String to int
  uint16_t rgb565_uint16 = (uint16_t)rgb565_int;  // cast int to uint16_t

  return strtol(response.c_str(), NULL, 0);
}
