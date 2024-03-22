    async function searchPharmacies() {
      const locationInput = document.getElementById('locationInput');
      const query = locationInput.value.trim();
      if (!query) {
        alert('Woonplaats of postcode.');
        return;
      }

      const response = await fetch(`https://nominatim.openstreetmap.org/search?q=${query}&format=json&limit=1`);
      const data = await response.json();

      if (data && data.length > 0) {
        const { lat, lon } = data[0];
        const pharmacyResponse = await fetch(`https://overpass-api.de/api/interpreter?data=[out:json];node[amenity=pharmacy](around:5000,${lat},${lon});out;`);
        const pharmacies = await pharmacyResponse.json();
        const sortedPharmacies = pharmacies.elements.sort((a, b) => a.tags.name.localeCompare(b.tags.name));
        const pharmacyList = document.getElementById('pharmacyList');
        pharmacyList.innerHTML = ''; // Clear previous results
        if (sortedPharmacies.length > 0) {
          const ul = document.createElement('ul');
          sortedPharmacies.forEach(pharmacy => {
            if (pharmacy.tags && pharmacy.tags.name && pharmacy.tags['addr:street'] && pharmacy.tags['addr:housenumber']) {
              const li = document.createElement('li');
              li.textContent = `${pharmacy.tags.name} - ${pharmacy.tags['addr:street']} ${pharmacy.tags['addr:housenumber']}`;
              ul.appendChild(li);
            }
          });
          pharmacyList.appendChild(ul);
        } else {
          pharmacyList.textContent = 'Sorry er is niks gevonden.';
        }
      } else {
        alert('Plaats niet vindbaar. Probeer op nieuw.');
      }
    }