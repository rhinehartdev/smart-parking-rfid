#include <WiFi.h>
#include <MFRC522.h>
#include <HTTPClient.h>

#define RST_PIN 5               // Reset pin for RFID
#define SS_PIN_CHECKIN 21       // SS pin for check-in RFID scanner
#define SS_PIN_CHECKOUT 22      // SS pin for check-out RFID scanner
#define GREEN_LED_PIN 13        // Green LED for success
#define RED_LED_PIN 12          // Red LED for failure
#define BUZZER_PIN 14           // Buzzer for feedback

MFRC522 rfid_checkin(SS_PIN_CHECKIN, RST_PIN);    // RFID scanner for check-in
MFRC522 rfid_checkout(SS_PIN_CHECKOUT, RST_PIN);  // RFID scanner for check-out

// WiFi credentials
const char* ssid = "Infinix GT 20 Pro";
const char* password = "";

// Server URLs for check-in and check-out
const char* checkinURL = "http://192.168.152.196/rh/check_in.php";
const char* checkoutURL = "http://192.168.152.196/rh/check_out.php";

String currentRFID = "";

void setup() {
  Serial.begin(115200);
  SPI.begin();  // Initialize SPI for RFID
  rfid_checkin.PCD_Init();
  rfid_checkout.PCD_Init();

  pinMode(GREEN_LED_PIN, OUTPUT);  // Set green LED as output
  pinMode(RED_LED_PIN, OUTPUT);    // Set red LED as output
  pinMode(BUZZER_PIN, OUTPUT);     // Set buzzer as output

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void loop() {
  // Check-in scanner
  if (rfid_checkin.PICC_IsNewCardPresent() && rfid_checkin.PICC_ReadCardSerial()) {
    currentRFID = readRFID(rfid_checkin);
    Serial.println("Scanned RFID for Check-In: " + currentRFID);
    bool success = updateCheckInStatus(currentRFID, true);  // Check-in
    provideFeedback(success);  // Provide feedback based on success or failure
    rfid_checkin.PICC_HaltA();
    rfid_checkin.PCD_StopCrypto1();
  }

  // Check-out scanner
  if (rfid_checkout.PICC_IsNewCardPresent() && rfid_checkout.PICC_ReadCardSerial()) {
    currentRFID = readRFID(rfid_checkout);
    Serial.println("Scanned RFID for Check-Out: " + currentRFID);
    bool success = updateCheckInStatus(currentRFID, false);  // Check-out
    provideFeedback(success);  // Provide feedback based on success or failure
    rfid_checkout.PICC_HaltA();
    rfid_checkout.PCD_StopCrypto1();
  }
}

// Function to read RFID as a hex string
String readRFID(MFRC522 &rfid) {
  String rfidTag = "";
  for (byte i = 0; i < rfid.uid.size; i++) {
    rfidTag += String(rfid.uid.uidByte[i], HEX);  // No uppercase conversion
  }
  return rfidTag;
}

// Function to update check-in or check-out status
bool updateCheckInStatus(String rfid, bool checkInStatus) {
  HTTPClient http;
  String url = checkInStatus ? checkinURL : checkoutURL;
  http.begin(url);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  String postData = "rfid=" + rfid + "&check_in=" + String(checkInStatus ? 1 : 0);
  int httpResponseCode = http.POST(postData);

  if (httpResponseCode == 200) {
    String response = http.getString();
    Serial.println("Server Response: " + response);
    http.end();
    return response.indexOf("success") >= 0;  // Return true if "success" is in the response
  } else {
    Serial.println("Error in sending data to server");
    http.end();
    return false;  // Indicate failure
  }
}

// Function to provide feedback using LEDs and buzzer
void provideFeedback(bool success) {
  if (success) {
    digitalWrite(GREEN_LED_PIN, HIGH);  // Turn on green LED
    digitalWrite(BUZZER_PIN, HIGH);     // Turn on buzzer
    delay(500);                         // Keep the indicators on for 500 ms
    digitalWrite(GREEN_LED_PIN, LOW);   // Turn off green LED
    digitalWrite(BUZZER_PIN, LOW);      // Turn off buzzer
  } else {
    digitalWrite(RED_LED_PIN, HIGH);    // Turn on red LED
    digitalWrite(BUZZER_PIN, HIGH);     // Turn on buzzer
    delay(500);                         // Keep the indicators on for 500 ms
    digitalWrite(RED_LED_PIN, LOW);     // Turn off red LED
    digitalWrite(BUZZER_PIN, LOW);      // Turn off buzzer
  }
}
