<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Area Converter</title>
  <style>
    .area-converter-root {
  --primary-color: #4361ee;
  --primary-hover: #3a56d4;
  --secondary-color: #3f37c9;
  --background-color: #f8fafc;
  --card-color: #ffffff;
  --text-color: #1e293b;
  --text-light: #64748b;
  --border-color: #e2e8f0;
  --success-color: #10b981;
  --error-color: #ef4444;
  --border-radius: 8px;
  --input-radius: 6px;
  --box-shadow: 0 8px 12px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
  --card-shadow: 0 16px 20px -5px rgba(0, 0, 0, 0.05), 0 8px 8px -5px rgba(0, 0, 0, 0.01);
  --transition: all 0.3s ease;
}

.area-converter-root * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
}

.area-converter-wrapper {
  background-color: var(--background-color);
  color: var(--text-color);
  line-height: 1.5;
  padding: 0;
  max-width: 850px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.area-converter-title {
  text-align: center;
  margin-bottom: 1.5rem;
  color: var(--text-color);
  font-weight: 700;
  font-size: 2rem;
  position: relative;
  padding-bottom: 0.75rem;
}

.area-converter-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 70px;
  height: 3px;
  background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
  border-radius: 2px;
}

.area-converter-card {
  background-color: var(--card-color);
  border-radius: var(--border-radius);
  box-shadow: var(--card-shadow);
  padding: 1.5rem;
  border: 1px solid var(--border-color);
}

.area-converter-form-group {
  margin-bottom: 1.25rem;
  position: relative;
  flex: 1;
}

.area-converter-label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 600;
  color: var(--text-color);
  font-size: 0.9rem;
}

.area-converter-input {
  width: 100%;
  padding: 0.75rem 0.85rem;
  border: 1px solid var(--border-color);
  border-radius: var(--input-radius);
  font-size: 0.95rem;
  transition: var(--transition);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  color: var(--text-color);
}

.area-converter-input:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
}

.area-converter-input-group {
  display: flex;
  gap: 1.25rem;
  margin-bottom: 1.25rem;
}

.area-converter-btn {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  color: white;
  border: none;
  border-radius: var(--input-radius);
  padding: 0.85rem 1.25rem;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
  width: 100%;
  box-shadow: 0 4px 6px rgba(63, 55, 201, 0.15);
  letter-spacing: 0.5px;
  position: relative;
  overflow: hidden;
}

.area-converter-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: all 0.6s ease;
}

.area-converter-btn:hover {
  background: linear-gradient(135deg, var(--primary-hover), var(--secondary-color));
  transform: translateY(-2px);
  box-shadow: 0 6px 12px rgba(63, 55, 201, 0.2);
}

.area-converter-btn:hover::before {
  left: 100%;
}

.area-converter-btn:active {
  transform: translateY(0);
}

.area-converter-result {
  margin-top: 1.25rem;
  padding: 1rem;
  background-color: rgba(67, 97, 238, 0.05);
  border-radius: var(--input-radius);
  border-left: 4px solid var(--primary-color);
  display: none;
  animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

.area-converter-result.show {
  display: block;
}

.area-converter-result p {
  font-size: 1.15rem;
  font-weight: 600;
  color: var(--text-color);
}

.area-converter-formula {
  font-size: 0.85rem;
  color: var(--text-light);
  margin-top: 0.6rem;
  padding-top: 0.6rem;
  border-top: 1px dashed var(--border-color);
}

.area-converter-history {
  background-color: var(--card-color);
  border-radius: var(--border-radius);
  box-shadow: var(--card-shadow);
  padding: 1.25rem;
  border: 1px solid var(--border-color);
}

.area-converter-history-title {
  margin-bottom: 0.85rem;
  color: var(--text-color);
  font-weight: 600;
  border-bottom: 2px solid var(--border-color);
  padding-bottom: 0.6rem;
  position: relative;
}

.area-converter-history-title::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 50px;
  height: 2px;
  background-color: var(--primary-color);
}

.area-converter-history-list {
  max-height: 280px;
  overflow-y: auto;
  padding-right: 0.4rem;
  margin-bottom: 0.85rem;
  scrollbar-width: thin;
  scrollbar-color: var(--primary-color) var(--border-color);
}

.area-converter-history-list::-webkit-scrollbar {
  width: 5px;
}

.area-converter-history-list::-webkit-scrollbar-track {
  background: var(--border-color);
  border-radius: 8px;
}

.area-converter-history-list::-webkit-scrollbar-thumb {
  background-color: var(--primary-color);
  border-radius: 8px;
}

.area-converter-history-item {
  padding: 0.85rem;
  border-bottom: 1px solid var(--border-color);
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: var(--transition);
  border-radius: 5px;
}

.area-converter-history-item:hover {
  background-color: rgba(67, 97, 238, 0.05);
  transform: translateX(4px);
}

.area-converter-history-item:last-child {
  border-bottom: none;
}

.area-converter-history-empty {
  text-align: center;
  color: var(--text-light);
  padding: 1.25rem 0;
  font-style: italic;
}

.area-converter-history-item-content {
  flex: 1;
}

.history-conversion {
  font-weight: 500;
  margin-bottom: 0.2rem;
}

.history-from, .history-to {
  display: inline-block;
}

.history-arrow {
  color: var(--text-light);
  margin: 0 0.5rem;
}

.history-date {
  font-size: 0.75rem;
  color: var(--text-light);
}

.area-converter-history-reuse {
  background: none;
  border: 1px solid var(--primary-color);
  color: var(--primary-color);
  width: auto;
  height: 32px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: var(--transition);
  flex-shrink: 0;
  padding: 0 0.75rem;
  font-size: 0.85rem;
  font-weight: 500;
}

.area-converter-history-reuse:hover {
  background-color: var(--primary-color);
  color: white;
}

.area-converter-clear-history {
  margin-top: 0.85rem;
  color: #e74c3c;
  background: none;
  border: 1px solid #e74c3c;
  padding: 0.6rem 1.15rem;
  cursor: pointer;
  border-radius: var(--input-radius);
  font-size: 0.85rem;
  transition: var(--transition);
  display: block;
  width: 100%;
  font-weight: 500;
}

.area-converter-clear-history:hover {
  background-color: #e74c3c;
  color: white;
}

/* Custom dropdown styling */
.custom-dropdown {
  position: relative;
  width: 100%;
}

.custom-dropdown-selected {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 0.75rem 0.85rem;
  border: 1px solid var(--border-color);
  border-radius: var(--input-radius);
  background-color: white;
  cursor: pointer;
  font-size: 0.95rem;
  transition: var(--transition);
  color: var(--text-color);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.custom-dropdown-selected:hover {
  border-color: #cbd5e1;
}

.custom-dropdown-selected:focus,
.custom-dropdown-selected.active {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
}

.custom-dropdown-selected::after {
  content: '⌄';
  font-size: 1.1rem;
  color: var(--text-light);
  font-weight: bold;
  transition: transform 0.2s ease;
}

.custom-dropdown-selected.active::after {
  transform: rotate(180deg);
}

.custom-dropdown-options {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background-color: white;
  border: 1px solid var(--border-color);
  border-radius: 0 0 var(--input-radius) var(--input-radius);
  z-index: 100;
  max-height: 280px;
  overflow-y: auto;
  display: none;
  box-shadow: var(--box-shadow);
  margin-top: 4px;
  scrollbar-width: thin;
  scrollbar-color: var(--primary-color) var(--border-color);
}

.custom-dropdown-options::-webkit-scrollbar {
  width: 5px;
}

.custom-dropdown-options::-webkit-scrollbar-track {
  background: var(--border-color);
  border-radius: 8px;
}

.custom-dropdown-options::-webkit-scrollbar-thumb {
  background-color: var(--primary-color);
  border-radius: 8px;
}

.custom-dropdown-option {
  padding: 0.65rem 0.85rem;
  cursor: pointer;
  transition: background-color 0.2s;
}

.custom-dropdown-option:hover {
  background-color: rgba(67, 97, 238, 0.05);
}

.custom-dropdown-option.selected {
  background-color: rgba(67, 97, 238, 0.1);
  color: var(--primary-color);
  font-weight: 600;
}

.custom-dropdown-categories {
  border-bottom: 1px solid var(--border-color);
  padding: 0.65rem 0.85rem;
  background-color: #f1f5f9;
  font-weight: 600;
  color: var(--text-color);
  font-size: 0.8rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.custom-dropdown-search {
  padding: 0.65rem;
  position: sticky;
  top: 0;
  background-color: white;
  border-bottom: 1px solid var(--border-color);
  z-index: 10;
}

.custom-dropdown-search input {
  width: 100%;
  padding: 0.55rem 0.75rem;
  border: 1px solid var(--border-color);
  border-radius: var(--input-radius);
  font-size: 0.85rem;
}

.custom-dropdown-search input:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
}

.error-message {
  color: var(--error-color);
  font-size: 0.8rem;
  margin-top: 0.4rem;
  display: none;
  font-weight: 500;
  animation: shake 0.4s linear;
}

@keyframes shake {
  0%, 100% {transform: translateX(0);}
  20%, 60% {transform: translateX(-5px);}
  40%, 80% {transform: translateX(5px);}
}

.area-converter-input.error {
  border-color: var(--error-color);
  box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

/* Responsive styles */
@media (max-width: 768px) {
  .area-converter-wrapper {
    padding: 1.25rem;
    gap: 1.25rem;
  }

  .area-converter-input-group {
    flex-direction: column;
    gap: 0.85rem;
  }
  
  .area-converter-card, 
  .area-converter-history {
    padding: 1.25rem;
  }

  .area-converter-history-item {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.65rem;
  }

  .area-converter-history-reuse {
    align-self: flex-end;
    margin-top: -2.25rem;
  }

  .area-converter-btn {
    padding: 0.75rem 1.15rem;
  }
}

@media (max-width: 480px) {
  .area-converter-wrapper {
    padding: 0.85rem;
    gap: 0.85rem;
  }
  
  .area-converter-card, 
  .area-converter-history {
    padding: 1.15rem;
  }

  .area-converter-label {
    font-size: 0.85rem;
  }

  .area-converter-input, 
  .custom-dropdown-selected {
    padding: 0.65rem;
    font-size: 0.9rem;
  }
  
  .area-converter-result p {
    font-size: 1.05rem;
  }
  
  .area-converter-formula {
    font-size: 0.8rem;
  }
}
  </style>
</head>
<body>
  <div class="area-converter-root">
    <div class="area-converter-wrapper">
      <h1 class="area-converter-title">Area Converter</h1>
      <div class="area-converter-card">
        <div class="area-converter-input-group">
          <div class="area-converter-form-group">
            <label class="area-converter-label" for="from-unit">From</label>
            <div class="custom-dropdown" id="from-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="from-unit-selected">Square Meter (m²)</div>
              <div class="custom-dropdown-options">
                <div class="custom-dropdown-search">
                  <input type="text" placeholder="Search units...">
                </div>
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
          
          <div class="area-converter-form-group">
            <label class="area-converter-label" for="to-unit">To</label>
            <div class="custom-dropdown" id="to-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="to-unit-selected">Square Feet (ft²)</div>
              <div class="custom-dropdown-options">
                <div class="custom-dropdown-search">
                  <input type="text" placeholder="Search units...">
                </div>
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
        </div>
        
        <div class="area-converter-input-group">
          <div class="area-converter-form-group">
            <label class="area-converter-label" for="input-value">Enter Value</label>
            <input type="number" class="area-converter-input" id="input-value" step="any" placeholder="Enter a number">
            <div id="input-error" class="error-message">Please enter a valid number</div>
          </div>
          
          <div class="area-converter-form-group">
            <label class="area-converter-label" for="decimal-places">Decimal Places</label>
            <div class="custom-dropdown" id="decimal-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="decimal-places-selected">2</div>
              <div class="custom-dropdown-options">
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
        </div>
        
        <button id="convert-btn" class="area-converter-btn">Convert</button>
        
        <div id="result" class="area-converter-result">
          <p id="result-text"></p>
          <div id="formula" class="area-converter-formula"></div>
        </div>
      </div>
      
      <div class="area-converter-history">
        <h3 class="area-converter-history-title">Conversion History</h3>
        <div id="history-list" class="area-converter-history-list"></div>
        <button id="clear-history" class="area-converter-clear-history">Clear History</button>
      </div>
    </div>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const fromUnitSelected = document.getElementById('from-unit-selected');
    const toUnitSelected = document.getElementById('to-unit-selected');
    const decimalPlacesSelected = document.getElementById('decimal-places-selected');
    const inputValue = document.getElementById('input-value');
    const convertBtn = document.getElementById('convert-btn');
    const resultDiv = document.getElementById('result');
    const resultText = document.getElementById('result-text');
    const formulaText = document.getElementById('formula');
    const historyList = document.getElementById('history-list');
    const clearHistoryBtn = document.getElementById('clear-history');
    
    // Load conversion history from localStorage
    let conversionHistory = JSON.parse(localStorage.getItem('areaConverterHistory')) || [];
    
    // Add error event listener
    inputValue.addEventListener('input', function() {
      const errorElement = document.getElementById('input-error');
      inputValue.classList.remove('error');
      errorElement.style.display = 'none';
    });

    // Organize area units by categories
    const unitCategories = {
      'Metric': [
        { code: 'square_meter', name: 'Square Meter (m²)' },
        { code: 'square_centimeter', name: 'Square Centimeter (cm²)' },
        { code: 'square_millimeter', name: 'Square Millimeter (mm²)' },
        { code: 'square_kilometer', name: 'Square Kilometer (km²)' },
        { code: 'hectare', name: 'Hectare (ha)' },
        { code: 'are', name: 'Are (a)' }
      ],
      'Imperial/US': [
        { code: 'square_foot', name: 'Square Foot (ft²)' },
        { code: 'square_inch', name: 'Square Inch (in²)' },
        { code: 'square_yard', name: 'Square Yard (yd²)' },
        { code: 'square_mile', name: 'Square Mile (mi²)' },
        { code: 'acre', name: 'Acre (ac)' },
        { code: 'township', name: 'Township' }
      ],
      'Other International': [
        { code: 'feddan', name: 'Feddan (Egyptian)' },
        { code: 'pyeong', name: 'Pyeong (Korean)' },
        { code: 'tsubo', name: 'Tsubo (Japanese)' },
        { code: 'mu', name: 'Mu (Chinese)' },
        { code: 'jerib', name: 'Jerib (Iranian)' },
        { code: 'joch', name: 'Joch (Austrian)' }
      ],
      'Traditional/Historical': [
        { code: 'arpent', name: 'Arpent (French)' },
        { code: 'rood', name: 'Rood (British)' },
        { code: 'guntha', name: 'Guntha (Indian)' },
        { code: 'cuerda', name: 'Cuerda (Puerto Rican)' },
        { code: 'plaza', name: 'Plaza (Spanish)' },
        { code: 'tatami', name: 'Tatami (Japanese)' }
      ],
      'Specialized': [
        { code: 'barn', name: 'Barn (Nuclear Physics)' },
        { code: 'shed', name: 'Shed (Computing)' },
        { code: 'outhouse', name: 'Outhouse (Computing)' },
        { code: 'football_field', name: 'Football Field (US)' },
        { code: 'soccer_field', name: 'Soccer Field (FIFA)' },
        { code: 'tennis_court', name: 'Tennis Court' }
      ],
      'Real Estate': [
        { code: 'square', name: 'Square (Construction)' },
        { code: 'homestead', name: 'Homestead' },
        { code: 'section', name: 'Section (US Public Land)' },
        { code: 'circuit', name: 'Circuit (US Public Land)' },
        { code: 'ground', name: 'Ground (Indian)' },
        { code: 'stremma', name: 'Stremma (Greek)' }
      ]
    };

    // Names for units (long form)
    const unitNames = {
      square_meter: "square meters",
      square_centimeter: "square centimeters",
      square_millimeter: "square millimeters",
      square_kilometer: "square kilometers",
      hectare: "hectares",
      are: "ares",
      square_foot: "square feet",
      square_inch: "square inches",
      square_yard: "square yards",
      square_mile: "square miles",
      acre: "acres",
      township: "townships",
      feddan: "feddans",
      pyeong: "pyeongs",
      tsubo: "tsubos",
      mu: "mu",
      jerib: "jeribs",
      joch: "jochs",
      arpent: "arpents",
      rood: "roods",
      guntha: "gunthas",
      cuerda: "cuerdas",
      plaza: "plazas",
      tatami: "tatami mats",
      barn: "barns",
      shed: "sheds",
      outhouse: "outhouses",
      football_field: "football fields",
      soccer_field: "soccer fields",
      tennis_court: "tennis courts",
      square: "squares",
      homestead: "homesteads",
      section: "sections",
      circuit: "circuits",
      ground: "grounds",
      stremma: "stremmas"
    };

    // Flattened array of all units
    const allUnits = Object.values(unitCategories).flat();
    
    // Get unit by code
    function getUnitByCode(code) {
      return allUnits.find(unit => unit.code === code);
    }

    // Initialize custom dropdowns
    initializeDropdowns();
    
    // Display existing history
    displayHistory();

    // Setup custom dropdowns
    function initializeDropdowns() {
      // Initialize unit dropdowns
      const fromDropdown = document.getElementById('from-dropdown');
      const toDropdown = document.getElementById('to-dropdown');
      const decimalDropdown = document.getElementById('decimal-dropdown');
      
      // Populate unit dropdowns
      populateUnitDropdown(fromDropdown, 'square_meter');
      populateUnitDropdown(toDropdown, 'square_foot');
      
      // Populate decimal places dropdown
      const decimalOptionsContainer = document.createElement('div');
      for (let i = 2; i <= 10; i++) {
        const option = document.createElement('div');
        option.className = 'custom-dropdown-option';
        option.dataset.value = i;
        option.textContent = i.toString();
        
        if (i === 2) {
          option.classList.add('selected');
        }
        
        option.addEventListener('click', function() {
          decimalPlacesSelected.textContent = this.textContent;
          decimalPlacesSelected.dataset.value = this.dataset.value;
          closeAllDropdowns();
        });
        
        decimalOptionsContainer.appendChild(option);
      }
      decimalDropdown.querySelector('.custom-dropdown-options').appendChild(decimalOptionsContainer);
      
      // Setup dropdown functionality
      document.querySelectorAll('.custom-dropdown-selected').forEach(element => {
        element.addEventListener('click', function(e) {
          e.stopPropagation();
          const currentDropdown = this.parentElement.querySelector('.custom-dropdown-options');
          
          // Close all other dropdowns
          document.querySelectorAll('.custom-dropdown-options').forEach(dropdown => {
            if (dropdown !== currentDropdown) {
              dropdown.style.display = 'none';
            }
          });
          
          // Toggle current dropdown
          if (currentDropdown.style.display === 'block') {
            currentDropdown.style.display = 'none';
            this.classList.remove('active');
          } else {
            currentDropdown.style.display = 'block';
            this.classList.add('active');
            
            // Focus search input if it exists
            const searchInput = currentDropdown.querySelector('input');
            if (searchInput) {
              searchInput.focus();
              searchInput.value = ''; // Clear previous search
            }
          }
        });
      });
      
      // Close dropdowns when clicking outside
      document.addEventListener('click', function() {
        closeAllDropdowns();
      });
      
      // Search functionality
      document.querySelectorAll('.custom-dropdown-search input').forEach(input => {
        input.addEventListener('click', e => e.stopPropagation());
        input.addEventListener('input', function() {
          const searchValue = this.value.toLowerCase();
          const dropdown = this.closest('.custom-dropdown');
          const options = dropdown.querySelectorAll('.custom-dropdown-option');
          const categories = dropdown.querySelectorAll('.custom-dropdown-categories');
          
          // Hide all categories first
          categories.forEach(category => {
            category.style.display = 'none';
          });
          
          let foundInCategory = {};
          
          // Show/hide options based on search
          options.forEach(option => {
            const optionText = option.textContent.toLowerCase();
            if (optionText.includes(searchValue)) {
              option.style.display = 'block';
              
              // Find and track the category this option belongs to
              let currentElement = option.previousElementSibling;
              while (currentElement) {
                if (currentElement.classList.contains('custom-dropdown-categories')) {
                  foundInCategory[currentElement.textContent] = true;
                  break;
                }
                currentElement = currentElement.previousElementSibling;
              }
            } else {
              option.style.display = 'none';
            }
          });
          
          // Show categories that have matching options
          categories.forEach(category => {
            if (foundInCategory[category.textContent]) {
              category.style.display = 'block';
            }
          });
        });
      });
    }
    
    function populateUnitDropdown(dropdown, selectedUnitCode) {
      const optionsContainer = dropdown.querySelector('.custom-dropdown-options');
      const selectedElement = dropdown.querySelector('.custom-dropdown-selected');
      
      // Clear existing options (except search box)
      const searchBox = optionsContainer.querySelector('.custom-dropdown-search');
      optionsContainer.innerHTML = '';
      if (searchBox) {
        optionsContainer.appendChild(searchBox);
      }
      
      // Set initial selected value
      const selectedUnit = getUnitByCode(selectedUnitCode);
      if (selectedUnit) {
        selectedElement.textContent = selectedUnit.name;
        selectedElement.dataset.value = selectedUnit.code;
      }
      
      // Add categories and units
      Object.keys(unitCategories).forEach(category => {
        const units = unitCategories[category];
        
        // Add category header
        const categoryElement = document.createElement('div');
        categoryElement.className = 'custom-dropdown-categories';
        categoryElement.textContent = category;
        optionsContainer.appendChild(categoryElement);
        
        // Add units in this category
        units.forEach(unit => {
          const option = document.createElement('div');
          option.className = 'custom-dropdown-option';
          option.dataset.value = unit.code;
          option.textContent = unit.name;
          
          if (unit.code === selectedUnitCode) {
            option.classList.add('selected');
          }
          
          option.addEventListener('click', function() {
            selectedElement.textContent = this.textContent;
            selectedElement.dataset.value = this.dataset.value;
            
            // Update selected class
            dropdown.querySelectorAll('.custom-dropdown-option').forEach(opt => {
              opt.classList.remove('selected');
            });
            this.classList.add('selected');
            
            closeAllDropdowns();
          });
          
          optionsContainer.appendChild(option);
        });
      });
    }
    
    // Close all dropdowns function
    function closeAllDropdowns() {
      document.querySelectorAll('.custom-dropdown-options').forEach(dropdown => {
        dropdown.style.display = 'none';
        
        // Reset search and filters when closing
        const searchInput = dropdown.querySelector('.custom-dropdown-search input');
        if (searchInput) {
          searchInput.value = '';
          resetUnitVisibility(dropdown);
        }
      });
      
      document.querySelectorAll('.custom-dropdown-selected').forEach(selected => {
        selected.classList.remove('active');
      });
    }
    
    // Reset unit visibility
    function resetUnitVisibility(dropdown) {
      // Show all categories
      dropdown.querySelectorAll('.custom-dropdown-categories').forEach(category => {
        category.style.display = 'block';
      });
      
      // Show all options
      dropdown.querySelectorAll('.custom-dropdown-option').forEach(option => {
        option.style.display = 'block';
      });
    }
    
    // Add event listeners
    convertBtn.addEventListener('click', performConversion);
    clearHistoryBtn.addEventListener('click', clearHistory);
    inputValue.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        performConversion();
      }
    });
    
    // Area conversion functions
    
    // Convert any area unit to square meters (our base unit)
    function toSquareMeters(value, unit) {
      switch(unit) {
        // Metric
        case 'square_meter':
          return value;
        case 'square_centimeter':
          return value * 0.0001;
        case 'square_millimeter':
          return value * 0.000001;
        case 'square_kilometer':
          return value * 1000000;
        case 'hectare':
          return value * 10000;
        case 'are':
          return value * 100;
          
        // Imperial/US
        case 'square_foot':
          return value * 0.09290304;
        case 'square_inch':
          return value * 0.00064516;
        case 'square_yard':
          return value * 0.83612736;
        case 'square_mile':
          return value * 2589988.11;
        case 'acre':
          return value * 4046.8564224;
        case 'township':
          return value * 93239571.972; // 36 square miles
          
        // Other International
        case 'feddan':
          return value * 4200.833; // Egyptian feddan
        case 'pyeong':
          return value * 3.3058; // Korean pyeong
        case 'tsubo':
          return value * 3.3058; // Japanese tsubo (same as pyeong)
        case 'mu':
          return value * 666.667; // Chinese mu
        case 'jerib':
          return value * 1000; // Iranian jerib (approximate)
        case 'joch':
          return value * 5755; // Austrian joch (approximate)
          
        // Traditional/Historical
        case 'arpent':
          return value * 3418.89; // French arpent (varies by region, this is approximate)
        case 'rood':
          return value * 1011.7141; // British rood (1/4 acre)
        case 'guntha':
          return value * 101.17; // Indian guntha (1/40 acre)
        case 'cuerda':
          return value * 3930.395; // Puerto Rican cuerda
        case 'plaza':
          return value * 6400; // Spanish plaza (approximate)
        case 'tatami':
          return value * 1.6335; // Japanese tatami mat (varies by region)
          
        // Specialized
        case 'barn':
          return value * 1e-28; // Nuclear physics unit
        case 'shed':
          return value * 1e-24; // Computing unit (10^-24 barns)
        case 'outhouse':
          return value * 1e-6; // Computing unit (10^-6 barns)
        case 'football_field':
          return value * 5351.215; // US football field (including end zones)
        case 'soccer_field':
          return value * 7140; // FIFA standard soccer field (105m x 68m)
        case 'tennis_court':
          return value * 260.87; // Standard singles tennis court
          
        // Real Estate
        case 'square':
          return value * 9.290304; // Construction square (100 sq ft)
        case 'homestead':
          return value * 647497.028; // US homestead (160 acres)
        case 'section':
          return value * 2589988.11; // US public land section (1 sq mile)
        case 'circuit':
          return value * 25899881.1; // US public land circuit (10 sq miles)
        case 'ground':
          return value * 203.5; // Indian ground (approximate)
        case 'stremma':
          return value * 1000; // Greek stremma
          
        default:
          return value; // Default to assuming it's already square meters
      }
    }
    
    // Convert from square meters to any unit
    function fromSquareMeters(value, unit) {
      switch(unit) {
        // Metric
        case 'square_meter':
          return value;
        case 'square_centimeter':
          return value * 10000;
        case 'square_millimeter':
          return value * 1000000;
        case 'square_kilometer':
          return value / 1000000;
        case 'hectare':
          return value / 10000;
        case 'are':
          return value / 100;
          
        // Imperial/US
        case 'square_foot':
          return value / 0.09290304;
        case 'square_inch':
          return value / 0.00064516;
        case 'square_yard':
          return value / 0.83612736;
        case 'square_mile':
          return value / 2589988.11;
        case 'acre':
          return value / 4046.8564224;
        case 'township':
          return value / 93239571.972; // 36 square miles
          
        // Other International
        case 'feddan':
          return value / 4200.833; // Egyptian feddan
        case 'pyeong':
          return value / 3.3058; // Korean pyeong
        case 'tsubo':
          return value / 3.3058; // Japanese tsubo (same as pyeong)
        case 'mu':
          return value / 666.667; // Chinese mu
        case 'jerib':
          return value / 1000; // Iranian jerib (approximate)
        case 'joch':
          return value / 5755; // Austrian joch (approximate)
          
        // Traditional/Historical
        case 'arpent':
          return value / 3418.89; // French arpent (varies by region)
        case 'rood':
          return value / 1011.7141; // British rood (1/4 acre)
        case 'guntha':
          return value / 101.17; // Indian guntha (1/40 acre)
        case 'cuerda':
          return value / 3930.395; // Puerto Rican cuerda
        case 'plaza':
          return value / 6400; // Spanish plaza (approximate)
        case 'tatami':
          return value / 1.6335; // Japanese tatami mat (varies by region)
          
        // Specialized
        case 'barn':
          return value / 1e-28; // Nuclear physics unit
        case 'shed':
          return value / 1e-24; // Computing unit (10^-24 barns)
        case 'outhouse':
          return value / 1e-6; // Computing unit (10^-6 barns)
        case 'football_field':
          return value / 5351.215; // US football field (including end zones)
        case 'soccer_field':
          return value / 7140; // FIFA standard soccer field (105m x 68m)
        case 'tennis_court':
          return value / 260.87; // Standard singles tennis court
          
        // Real Estate
        case 'square':
          return value / 9.290304; // Construction square (100 sq ft)
        case 'homestead':
          return value / 647497.028; // US homestead (160 acres)
        case 'section':
          return value / 2589988.11; // US public land section (1 sq mile)
        case 'circuit':
          return value / 25899881.1; // US public land circuit (10 sq miles)
        case 'ground':
          return value / 203.5; // Indian ground (approximate)
        case 'stremma':
          return value / 1000; // Greek stremma
          
        default:
          return value; // Default to returning square meters
      }
    }
    
    // Function to perform area conversion
    function performConversion() {
      const input = parseFloat(inputValue.value);
      const errorElement = document.getElementById('input-error');
      
      if (isNaN(input)) {
        inputValue.classList.add('error');
        errorElement.style.display = 'block';
        return;
      } else {
        inputValue.classList.remove('error');
        errorElement.style.display = 'none';
      }

      const from = fromUnitSelected.dataset.value;
      const to = toUnitSelected.dataset.value;
      const places = parseInt(decimalPlacesSelected.dataset.value || 2);
      
      // For area, we first convert to square meters then to target unit
      try {
        const squareMeters = toSquareMeters(input, from);
        const result = fromSquareMeters(squareMeters, to);
        
        // Check for NaN or Infinity
        if (isNaN(result) || !isFinite(result)) {
          resultText.textContent = "Conversion error - Please check the conversion";
          formulaText.textContent = "Area calculation error";
          resultDiv.classList.add('show');
          return;
        }
        
        // Format with requested decimal places
        const formattedResult = result.toFixed(places);
        
        // Generate formula text
        const formulaHtml = generateFormulaText(from, to, input, formattedResult);
        
        resultText.textContent = `${input} ${unitNames[from] || from} = ${formattedResult} ${unitNames[to] || to}`;
        formulaText.innerHTML = `Formula: ${formulaHtml}`;
        resultDiv.classList.add('show');
        
        // Add to history
        const historyItem = {
          date: new Date().toLocaleString(),
          from: input,
          fromUnit: unitNames[from] || from,
          fromCode: from,
          to: formattedResult,
          toUnit: unitNames[to] || to,
          toCode: to
        };
        
        // Add to beginning of array
        conversionHistory.unshift(historyItem);
        
        // Keep only the latest 20 items
        if (conversionHistory.length > 20) {
          conversionHistory = conversionHistory.slice(0, 20);
        }
        
        // Save to localStorage
        localStorage.setItem('areaConverterHistory', JSON.stringify(conversionHistory));
        
        // Update history display
        displayHistory();
      } catch (e) {
        resultText.textContent = "Conversion error: " + e.message;
        formulaText.textContent = "Error in area calculation";
        resultDiv.classList.add('show');
      }
    }
    
    // Generate formula text for area conversions
    function generateFormulaText(fromUnit, toUnit, inputValue, result) {
      if (fromUnit === toUnit) {
        return `No conversion needed - units are the same`;
      }
      
      let formula = '';
      
      // Common area conversion formulas
      if (fromUnit === 'square_meter' && toUnit === 'square_foot') {
        formula = `ft² = m² × 10.764 = ${inputValue} × 10.764 = ${result}`;
      } 
      else if (fromUnit === 'square_foot' && toUnit === 'square_meter') {
        formula = `m² = ft² × 0.0929 = ${inputValue} × 0.0929 = ${result}`;
      }
      else if (fromUnit === 'square_meter' && toUnit === 'square_yard') {
        formula = `yd² = m² × 1.196 = ${inputValue} × 1.196 = ${result}`;
      }
      else if (fromUnit === 'square_yard' && toUnit === 'square_meter') {
        formula = `m² = yd² × 0.8361 = ${inputValue} × 0.8361 = ${result}`;
      }
      else if (fromUnit === 'square_meter' && toUnit === 'acre') {
        formula = `acres = m² × 0.000247105 = ${inputValue} × 0.000247105 = ${result}`;
      }
      else if (fromUnit === 'acre' && toUnit === 'square_meter') {
        formula = `m² = acres × 4046.86 = ${inputValue} × 4046.86 = ${result}`;
      }
      else if (fromUnit === 'hectare' && toUnit === 'acre') {
        formula = `acres = ha × 2.47105 = ${inputValue} × 2.47105 = ${result}`;
      }
      else if (fromUnit === 'acre' && toUnit === 'hectare') {
        formula = `ha = acres × 0.404686 = ${inputValue} × 0.404686 = ${result}`;
      }
      else if (fromUnit === 'square_kilometer' && toUnit === 'square_mile') {
        formula = `mi² = km² × 0.386102 = ${inputValue} × 0.386102 = ${result}`;
      }
      else if (fromUnit === 'square_mile' && toUnit === 'square_kilometer') {
        formula = `km² = mi² × 2.58999 = ${inputValue} × 2.58999 = ${result}`;
      }
      else if (fromUnit === 'square_centimeter' && toUnit === 'square_inch') {
        formula = `in² = cm² × 0.155 = ${inputValue} × 0.155 = ${result}`;
      }
      else if (fromUnit === 'square_inch' && toUnit === 'square_centimeter') {
        formula = `cm² = in² × 6.4516 = ${inputValue} × 6.4516 = ${result}`;
      }
      else {
        // For more complex or less common conversions, we show the intermediate step
        const squareMeterValue = toSquareMeters(inputValue, fromUnit).toFixed(6);
        formula = `First convert ${unitNames[fromUnit]} to square meters: ${inputValue} ${unitNames[fromUnit]} = ${squareMeterValue} m²<br>`;
        formula += `Then convert square meters to ${unitNames[toUnit]}: ${squareMeterValue} m² = ${result} ${unitNames[toUnit]}`;
      }
      
      return formula;
    }
    
    // Function to display history
    function displayHistory() {
      historyList.innerHTML = '';
      
      if (conversionHistory.length === 0) {
        const emptyMessage = document.createElement('div');
        emptyMessage.className = 'area-converter-history-empty';
        emptyMessage.textContent = 'No conversion history yet';
        historyList.appendChild(emptyMessage);
        return;
      }
      
      conversionHistory.forEach((item, index) => {
        const historyItem = document.createElement('div');
        historyItem.className = 'area-converter-history-item';
        
        // Create history item content
        const itemContent = document.createElement('div');
        itemContent.className = 'area-converter-history-item-content';
        itemContent.innerHTML = `<div class="history-conversion">
            <span class="history-from">${item.from} ${item.fromUnit}</span>
            <span class="history-arrow">→</span>
            <span class="history-to">${item.to} ${item.toUnit}</span>
          </div>
          <div class="history-date">${item.date}</div>`;
        
        // Create reuse button
        const reuseButton = document.createElement('button');
        reuseButton.className = 'area-converter-history-reuse';
        reuseButton.textContent = 'Reuse';
        reuseButton.addEventListener('click', function() {
          fromUnitSelected.dataset.value = item.fromCode;
          fromUnitSelected.textContent = getUnitByCode(item.fromCode).name;
          
          toUnitSelected.dataset.value = item.toCode;
          toUnitSelected.textContent = getUnitByCode(item.toCode).name;
          
          inputValue.value = item.from;
          
          // Scroll to converter
          document.querySelector('.area-converter-card').scrollIntoView({
            behavior: 'smooth'
          });
        });
        
        historyItem.appendChild(itemContent);
        historyItem.appendChild(reuseButton);
        historyList.appendChild(historyItem);
      });
    }
    
    // Function to clear history
    function clearHistory() {
      conversionHistory = [];
      localStorage.removeItem('areaConverterHistory');
      displayHistory();
    }
  });
  </script>
</body>
</html>