#!/bin/bash

# Maak een nieuwe map voor de bundel
mkdir -p ~/certs
cd ~/certs

# Download de meest recente CA-certificaten
curl -o ca-certificates.cert https://curl.se/ca/cacert.pem

# Maak een bundel van de certificaten
cat ca-certificates.cert >> ca-bundle.cert

# Optioneel: Bekijk de inhoud van de bundel
# cat ca-bundle.crt

echo "CA-bundel is gegenereerd en opgeslagen in: ~/certs/ca-bundle.crt"