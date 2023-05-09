#include <Adafruit_Protomatter.h>

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
#define F2(progmem_ptr) (const __FlashStringHelper *)progmem_ptr

String message = "Geen ontvangst";

void setup() {
  matrix.begin();
  matrix.setTextWrap(false);  // Allow text to run off right edge
  matrix.setTextSize(2);
  Serial.begin(115200);  // Initialize serial communication
}

void loop() {
  if (Serial.available() > 0) {
    message = Serial.readString();
    message.trim();
  }
  if (message.length() > 0) {
      int16_t textX = matrix.width();
      int16_t textMin = -message.length() * 12;
      while (textX > textMin) {
        matrix.fillScreen(0);
        matrix.setTextColor(0xF800);
        matrix.setCursor(textX, 1);
        matrix.print(message);
        textX--;
        matrix.show();
        delay(20);
      }
    }
}
