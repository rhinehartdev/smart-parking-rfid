#include <WiFi.h>
#include <HTTPClient.h>
#include <MFRC522.h>

#define SS_PIN 21  // SDA pin connected to GPIO 21
#define RST_PIN 5   // RST pin connected to GPIO 5
#define LED_PIN 13  // Green LED pin connected to GPIO 13 (you can change this pin)
#define BUZZER_PIN 12  // Buzzer pin connected to GPIO 12 (you can change this pin)

const char* ssid = "Infinix GT 20 Pro";
const char* password = "";

const char* serverURL = "http://192.168.152.196/rh/save_rfid.php";  // URL to PHP file

MFRC522 mfrc522(SS_PIN, RST_PIN);  // Create MFRC522 instance

void setup() {
  Serial.begin(115200);
  Serial.println("Connecting to WiFi...");
  WiFi.begin(ssid, password);

  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
  Serial.println("Connected to WiFi!");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());

  SPI.begin();  // Init SPI bus
  mfrc522.PCD_Init();  // Init MFRC522
  Serial.println("RFID Reader Initialized. Place your card near the reader...");

  pinMode(LED_PIN, OUTPUT);    // Set LED pin as output
  pinMode(BUZZER_PIN, OUTPUT); // Set Buzzer pin as output
}

void loop() {
  if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
    String rfidTag = "";  // Store RFID tag
    for (byte i = 0; i < mfrc522.uid.size; i++) {
      rfidTag += String(mfrc522.uid.uidByte[i], HEX);  // Read RFID tag bytes
    }

    Serial.print("Scanned RFID: ");
    Serial.println(rfidTag);  // Print the scanned RFID tag

    // HTTP POST to the server
    HTTPClient http;
    http.begin(serverURL);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    String postData = "rfid=" + rfidTag;
    int httpResponseCode = http.POST(postData);

    // Check the response
    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Server Response: " + response);  // Print server response
      if (response.indexOf("success") >= 0) {
        Serial.println("RFID successfully registered in the database.");
        
        // Turn on the green LED and sound the buzzer for success
        digitalWrite(LED_PIN, HIGH);   // Turn on LED
        digitalWrite(BUZZER_PIN, HIGH); // Turn on buzzer
        delay(500);  // Keep LED and buzzer on for 500ms
        digitalWrite(LED_PIN, LOW);    // Turn off LED
        digitalWrite(BUZZER_PIN, LOW); // Turn off buzzer
      } else {
        Serial.println("Failed to register RFID in the database.");
      }
    } else {
      Serial.print("HTTP Error: ");
      Serial.println(httpResponseCode);
    }

    http.end();
    delay(2000);  // Small delay before scanning again
  }
}
