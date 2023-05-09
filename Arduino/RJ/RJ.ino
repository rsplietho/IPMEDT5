#include <Arduino_JSON.h>

#include <WiFi.h>
#include <HTTPClient.h>

#include <Adafruit_Protomatter.h>
#include <core.h>

// scrolltext demo for Adafruit RGBmatrixPanel library.
// Demonstrates double-buffered animation on our 16x32 RGB LED matrix:
// http://www.adafruit.com/products/420
// DOUBLE-BUFFERED ANIMATION DOES NOT WORK WITH ARDUINO UNO or METRO 328.

// Written by Limor Fried/Ladyada & Phil Burgess/PaintYourDragon
// for Adafruit Industries.
// BSD license, all text above must be included in any redistribution.



// Most of the signal pins are configurable, but the CLK pin has some
// special constraints.  On 8-bit AVR boards it must be on PORTB...
// Pin 11 works on the Arduino Mega.  On 32-bit SAMD boards it must be
// on the same PORT as the RGB data pins (D2-D7)...
// Pin 8 works on the Adafruit Metro M0 or Arduino Zero,
// Pin A4 works on the Adafruit Metro M4 (if using the Adafruit RGB
// Matrix Shield, cut trace between CLK pads and run a wire to A4).


uint8_t rgbPins[] = { 15, 2, 4, 5, 18, 19 };
uint8_t addrPins[] = { 13, 12, 14 };
uint8_t clockPin = 25;
uint8_t latchPin = 27;
uint8_t oePin = 26;

String serverName = "http://172.20.10.4/get_text";
// Last parameter = 'true' enables double-buffering, for flicker-free,
// buttery smooth animation.  Note that NOTHING WILL SHOW ON THE DISPLAY
// until the first call to swapBuffers().  This is normal.

Adafruit_Protomatter matrix(
  32, 4, 1, rgbPins, 3, addrPins, clockPin, latchPin, oePin, true);



// Similar to F(), but for PROGMEM string pointers rather than literals
#define F2(progmem_ptr) (const __FlashStringHelper *)progmem_ptr

const char str[] PROGMEM = "Starting...";
int16_t textX = matrix.width(),
        textMin = (int16_t)sizeof(str) * -12,
        hue = 0;

void setup() {
  matrix.begin();
  matrix.setTextWrap(false);  // Allow text to run off right edge
  matrix.setTextSize(2);


  WiFi.mode(WIFI_STA);             //Optional
  WiFi.setHostname("LICHTKRANT");  //define hostname
  WiFi.begin("iPhone van Robert-Jan", "ProCie2022");
  Serial.println("\nConnecting");

  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(100);
  }
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("WiFi Connected!");
    matrix.println("WiFi");
    matrix.println("Connected");
    matrix.show();
  }
}

uint16_t rgb565(const unsigned long rgb) {
  uint16_t R = (rgb >> 16) & 0xFF;
  uint16_t G = (rgb >> 8) & 0xFF;
  uint16_t B = (rgb)&0xFF;

  uint16_t ret = (R & 0xF8) << 8;  // 5 bits
  ret |= (G & 0xFC) << 3;          // 6 bits
  ret |= (B & 0xF8) >> 3;          // 5 bits

  return (ret);
}


void get_remote_json() {
  if (WiFi.status() == WL_CONNECTED) {

    HTTPClient http;


    // configure traged server and url
    http.begin("172.20.10.4/get_text");



    // start connection and send HTTP header
    int httpCode = http.GET();

    String payload = "{}";

    // httpCode will be negative on error
    if (httpCode > 0) {


      // file found at server
      if (httpCode == HTTP_CODE_OK) {
        String payload = http.getString();

        // USE_SERIAL.println(led_state);
      }
    } else {
      // Serial.print("Error code: ");
      // Serial.println(httpResponseCode);
    }

    http.end();
    return payload;
  }
}



void loop() {
  byte i;

  // Clear background
  matrix.fillScreen(0);


  // Draw big scrolly text on top
  matrix.setTextColor(decodeJsonColour);
  matrix.setCursor(textX, 1);
  matrix.print(decodeJsonText);

  // Move text left (w/wrap), increase hue
  if ((--textX) < textMin) textX = matrix.width();
  hue += 7;
  if (hue >= 1536) hue -= 1536;

#if !defined(__AVR__)
  // On non-AVR boards, delay slightly so screen updates aren't too quick.
  delay(20);
#endif

  // Update display
  matrix.show();
}
