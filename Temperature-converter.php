<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Temperature Converter</title>
  <style>
.temp-converter-root {
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

.temp-converter-root * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
}

.temp-converter-wrapper {
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

.temp-converter-title {
  text-align: center;
  margin-bottom: 1.5rem;
  color: var(--text-color);
  font-weight: 700;
  font-size: 2rem;
  position: relative;
  padding-bottom: 0.75rem;
}

.temp-converter-title::after {
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

.temp-converter-card {
  background-color: var(--card-color);
  border-radius: var(--border-radius);
  box-shadow: var(--card-shadow);
  padding: 1.5rem;
  border: 1px solid var(--border-color);
}

.temp-converter-form-group {
  margin-bottom: 1.25rem;
  position: relative;
  flex: 1;
}

.temp-converter-label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 600;
  color: var(--text-color);
  font-size: 0.9rem;
}

.temp-converter-input {
  width: 100%;
  padding: 0.75rem 0.85rem;
  border: 1px solid var(--border-color);
  border-radius: var(--input-radius);
  font-size: 0.95rem;
  transition: var(--transition);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  color: var(--text-color);
}

.temp-converter-input:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
}

.temp-converter-input-group {
  display: flex;
  gap: 1.25rem;
  margin-bottom: 1.25rem;
}

.temp-converter-btn {
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

.temp-converter-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: all 0.6s ease;
}

.temp-converter-btn:hover {
  background: linear-gradient(135deg, var(--primary-hover), var(--secondary-color));
  transform: translateY(-2px);
  box-shadow: 0 6px 12px rgba(63, 55, 201, 0.2);
}

.temp-converter-btn:hover::before {
  left: 100%;
}

.temp-converter-btn:active {
  transform: translateY(0);
}

.temp-converter-result {
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

.temp-converter-result.show {
  display: block;
}

.temp-converter-result p {
  font-size: 1.15rem;
  font-weight: 600;
  color: var(--text-color);
}

.temp-converter-formula {
  font-size: 0.85rem;
  color: var(--text-light);
  margin-top: 0.6rem;
  padding-top: 0.6rem;
  border-top: 1px dashed var(--border-color);
}

.temp-converter-history {
  background-color: var(--card-color);
  border-radius: var(--border-radius);
  box-shadow: var(--card-shadow);
  padding: 1.25rem;
  border: 1px solid var(--border-color);
}

.temp-converter-history-title {
  margin-bottom: 0.85rem;
  color: var(--text-color);
  font-weight: 600;
  border-bottom: 2px solid var(--border-color);
  padding-bottom: 0.6rem;
  position: relative;
}

.temp-converter-history-title::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 50px;
  height: 2px;
  background-color: var(--primary-color);
}

.temp-converter-history-list {
  max-height: 280px;
  overflow-y: auto;
  padding-right: 0.4rem;
  margin-bottom: 0.85rem;
  scrollbar-width: thin;
  scrollbar-color: var(--primary-color) var(--border-color);
}

.temp-converter-history-list::-webkit-scrollbar {
  width: 5px;
}

.temp-converter-history-list::-webkit-scrollbar-track {
  background: var(--border-color);
  border-radius: 8px;
}

.temp-converter-history-list::-webkit-scrollbar-thumb {
  background-color: var(--primary-color);
  border-radius: 8px;
}

.temp-converter-history-item {
  padding: 0.85rem;
  border-bottom: 1px solid var(--border-color);
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: var(--transition);
  border-radius: 5px;
}

.temp-converter-history-item:hover {
  background-color: rgba(67, 97, 238, 0.05);
  transform: translateX(4px);
}

.temp-converter-history-item:last-child {
  border-bottom: none;
}

.temp-converter-history-empty {
  text-align: center;
  color: var(--text-light);
  padding: 1.25rem 0;
  font-style: italic;
}

.temp-converter-history-content {
  flex: 1;
}

.temp-converter-history-conversion {
  font-weight: 500;
  margin-bottom: 0.2rem;
}

.temp-converter-history-conversion .unit {
  color: var(--text-light);
  font-size: 0.85rem;
}

.temp-converter-history-date {
  font-size: 0.75rem;
  color: var(--text-light);
}

.temp-converter-history-reuse {
  background: none;
  border: 1px solid var(--primary-color);
  color: var(--primary-color);
  width: 32px;
  height: 32px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: var(--transition);
  flex-shrink: 0;
}

.temp-converter-history-reuse:hover {
  background-color: var(--primary-color);
  color: white;
}

.temp-converter-clear-history {
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

.temp-converter-clear-history:hover {
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

.temp-converter-input.error {
  border-color: var(--error-color);
  box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

/* Responsive styles */
@media (max-width: 768px) {
  .temp-converter-wrapper {
    padding: 1.25rem;
    gap: 1.25rem;
  }

  .temp-converter-input-group {
    flex-direction: column;
    gap: 0.85rem;
  }
  
  .temp-converter-card, 
  .temp-converter-history {
    padding: 1.25rem;
  }

  .temp-converter-history-item {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.65rem;
  }

  .temp-converter-history-reuse {
    align-self: flex-end;
    margin-top: -2.25rem;
  }

  .temp-converter-btn {
    padding: 0.75rem 1.15rem;
  }
}

@media (max-width: 480px) {
  .temp-converter-wrapper {
    padding: 0.85rem;
    gap: 0.85rem;
  }
  
  .temp-converter-card, 
  .temp-converter-history {
    padding: 1.15rem;
  }

  .temp-converter-label {
    font-size: 0.85rem;
  }

  .temp-converter-input, 
  .custom-dropdown-selected {
    padding: 0.65rem;
    font-size: 0.9rem;
  }
  
  .temp-converter-result p {
    font-size: 1.05rem;
  }
  
  .temp-converter-formula {
    font-size: 0.8rem;
  }
}
  </style>
</head>
<body>
  <div class="temp-converter-root">
    <div class="temp-converter-wrapper">
  <h1 class="temp-converter-title">Advanced Temperature Converter</h1>
  
  <div class="temp-converter-card">
        <div class="temp-converter-input-group">
          <div class="temp-converter-form-group">
            <label class="temp-converter-label" for="from-unit">From</label>
            <div class="custom-dropdown" id="from-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="from-unit-selected">Celsius (°C)</div>
              <div class="custom-dropdown-options">
                <div class="custom-dropdown-search">
                  <input type="text" placeholder="Search units...">
                </div>
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
          
          <div class="temp-converter-form-group">
            <label class="temp-converter-label" for="to-unit">To</label>
            <div class="custom-dropdown" id="to-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="to-unit-selected">Fahrenheit (°F)</div>
              <div class="custom-dropdown-options">
                <div class="custom-dropdown-search">
                  <input type="text" placeholder="Search units...">
                </div>
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
        </div>
        
        <div class="temp-converter-input-group">
          <div class="temp-converter-form-group">
            <label class="temp-converter-label" for="input-value">Enter Value</label>
            <input type="number" class="temp-converter-input" id="input-value" step="any" placeholder="Enter a number">
            <div id="input-error" class="error-message">Please enter a valid number</div>
          </div>
          
          <div class="temp-converter-form-group">
            <label class="temp-converter-label" for="decimal-places">Decimal Places</label>
            <div class="custom-dropdown" id="decimal-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="decimal-places-selected">2</div>
              <div class="custom-dropdown-options">
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
        </div>
        
        <button id="convert-btn" class="temp-converter-btn">Convert</button>
        
        <div id="result" class="temp-converter-result">
          <p id="result-text"></p>
          <div id="formula" class="temp-converter-formula"></div>
        </div>
      </div>
      
      <div class="temp-converter-history">
        <h3 class="temp-converter-history-title">Conversion History</h3>
        <div id="history-list" class="temp-converter-history-list"></div>
        <button id="clear-history" class="temp-converter-clear-history">Clear History</button>
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
  let conversionHistory = JSON.parse(localStorage.getItem('tempConverterHistory')) || [];
  
  // Add error event listener
  inputValue.addEventListener('input', function() {
    const errorElement = document.getElementById('input-error');
    inputValue.classList.remove('error');
    errorElement.style.display = 'none';
  });

  // Organize temperature units by categories
  const unitCategories = {
    'Common': [
      { code: 'celsius', name: 'Celsius (°C)' },
      { code: 'fahrenheit', name: 'Fahrenheit (°F)' },
      { code: 'kelvin', name: 'Kelvin (K)' },
      { code: 'rankine', name: 'Rankine (°R)' }
    ],
    'Scientific': [
      { code: 'planck', name: 'Planck Temperature (TP)' },
      { code: 'electron', name: 'Electron Volt (eV)' },
      { code: 'reaumur', name: 'Réaumur (°Ré)' },
      { code: 'delisle', name: 'Delisle (°De)' },
      { code: 'newton', name: 'Newton (°N)' }
    ],
    'Industrial & Engineering': [
      { code: 'romer', name: 'Rømer (°Rø)' },
      { code: 'gas_mark', name: 'Gas Mark' },
      { code: 'thermocouple_j', name: 'Thermocouple J Type (mV)' },
      { code: 'thermocouple_k', name: 'Thermocouple K Type (mV)' },
      { code: 'thermocouple_t', name: 'Thermocouple T Type (mV)' }
    ],
    'Non-Linear': [
      { code: 'oven_low', name: 'Oven - Low' },
      { code: 'oven_medium', name: 'Oven - Medium' },
      { code: 'oven_hot', name: 'Oven - Hot' },
      { code: 'oven_very_hot', name: 'Oven - Very Hot' }
    ],
    'Historical': [
      { code: 'wedgwood', name: 'Wedgwood (°W)' },
      { code: 'leiden', name: 'Leiden Scale' },
      { code: 'hooke', name: 'Hooke Scale' },
      { code: 'dalton', name: 'Dalton Scale' },
      { code: 'fahrenheit_original', name: 'Original Fahrenheit' }
    ],
    'Special & Extreme': [
      { code: 'solar_core', name: 'Solar Core (approx.)' },
      { code: 'supernova', name: 'Supernova (approx.)' },
      { code: 'cmbr', name: 'Cosmic Microwave Background' },
      { code: 'absolute_hot', name: 'Absolute Hot (theoretical)' },
      { code: 'room_temp', name: 'Room Temperature' }
    ]
  };

  // Names for units (long form)
  const unitNames = {
    celsius: "degrees Celsius",
    fahrenheit: "degrees Fahrenheit",
    kelvin: "Kelvin",
    rankine: "degrees Rankine",
    reaumur: "degrees Réaumur",
    delisle: "degrees Delisle",
    newton: "degrees Newton",
    romer: "degrees Rømer",
    gas_mark: "Gas Mark",
    planck: "Planck temperature units",
    electron: "electron volts",
    thermocouple_j: "J-Type thermocouple mV",
    thermocouple_k: "K-Type thermocouple mV",
    thermocouple_t: "T-Type thermocouple mV",
    oven_low: "low oven setting",
    oven_medium: "medium oven setting",
    oven_hot: "hot oven setting",
    oven_very_hot: "very hot oven setting",
    wedgwood: "degrees Wedgwood",
    leiden: "degrees Leiden",
    hooke: "degrees Hooke",
    dalton: "degrees Dalton",
    fahrenheit_original: "original degrees Fahrenheit",
    solar_core: "solar core temperature units",
    supernova: "supernova temperature units",
    cmbr: "CMBR temperature units",
    absolute_hot: "theoretical absolute hot units",
    room_temp: "room temperature units"
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
    populateUnitDropdown(fromDropdown, 'celsius');
    populateUnitDropdown(toDropdown, 'fahrenheit');
    
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
  
  // Temperature conversion functions
  
  // Convert any temperature to Kelvin (our base unit)
  function toKelvin(value, unit) {
    switch(unit) {
      case 'celsius':
        return value + 273.15;
      case 'fahrenheit':
        return (value + 459.67) * (5/9);
      case 'kelvin':
        return value;
      case 'rankine':
        return value * (5/9);
      case 'reaumur':
        return (value * 1.25) + 273.15;
      case 'delisle':
        return 373.15 - (value * (2/3));
      case 'newton':
        return (value * (100/33)) + 273.15;
      case 'romer':
        return ((value - 7.5) * (40/21)) + 273.15;
      case 'gas_mark':
        // Approximate conversion
        let celsius = 0;
        switch(value) {
          case 0: celsius = 135; break;
          case 1: celsius = 149; break;
          case 2: celsius = 163; break;
          case 3: celsius = 177; break;
          case 4: celsius = 191; break;
          case 5: celsius = 204; break;
          case 6: celsius = 218; break;
          case 7: celsius = 232; break;
          case 8: celsius = 246; break;
          case 9: celsius = 260; break;
          case 10: celsius = 274; break;
          default: celsius = 150 + (value * 14); // rough approximation for any other value
        }
        return celsius + 273.15;
      case 'planck':
        // Planck temperature is about 1.416784(16)×10^32 K
        return value * 1.416784e32;
      case 'electron':
        // 1 eV ≈ 11,604.5 K
        return value * 11604.5;
      case 'thermocouple_j':
        // Simplified approximation - actual thermocouples have non-linear responses
        return (value * 20) + 293.15; // Very rough conversion, actual J-type needs lookup tables
      case 'thermocouple_k':
        return (value * 25) + 293.15; // Very rough conversion, actual K-type needs lookup tables
      case 'thermocouple_t':
        return (value * 25) + 293.15; // Very rough conversion, actual T-type needs lookup tables
      case 'oven_low':
        // Typical oven low is about 120°C
        return 393.15; // 120°C to K
      case 'oven_medium':
        // Typical oven medium is about 180°C
        return 453.15; // 180°C to K
      case 'oven_hot':
        // Typical oven hot is about 220°C
        return 493.15; // 220°C to K
      case 'oven_very_hot':
        // Typical very hot oven is about 250°C
        return 523.15; // 250°C to K
      case 'wedgwood':
        // Wedgwood scale - highly approximate. Originally based on clay contraction
        return (value * 72.25) + 823.15; // Very approximate
      case 'leiden':
        // Historical scale used for cryogenics, approximating here
        return 273.15 - (value * 0.5); // Approximate
      case 'hooke':
        // Robert Hooke's temperature scale, very approximate
        return (value * (5/9)) + 273.15; // Highly simplified
      case 'dalton':
        // John Dalton's scale, approximating
        return (value * (5/6)) + 273.15; // Approximate
      case 'fahrenheit_original':
        // Original Fahrenheit used slightly different reference points
        return ((value + 460) * (5/9)); // Approximate
      case 'solar_core':
        // Solar core is about 15 million K
        return value * 15000000;
      case 'supernova':
        // Supernova temperatures can reach billions of K
        return value * 1000000000;
      case 'cmbr':
        // CMBR is about 2.725 K
        return value * 2.725;
      case 'absolute_hot':
        // Theoretical max temperature (Planck temperature)
        return value * 1.416784e32;
      case 'room_temp':
        // Standard room temperature is 20-22°C
        return 293.15; // 20°C in Kelvin
      default:
        return value; // Default to assuming it's already Kelvin
    }
  }
  
  // Convert from Kelvin to any unit
  function fromKelvin(value, unit) {
    switch(unit) {
      case 'celsius':
        return value - 273.15;
      case 'fahrenheit':
        return (value * (9/5)) - 459.67;
      case 'kelvin':
        return value;
      case 'rankine':
        return value * (9/5);
      case 'reaumur':
        return (value - 273.15) * 0.8;
      case 'delisle':
        return (373.15 - value) * (3/2);
      case 'newton':
        return (value - 273.15) * (33/100);
      case 'romer':
        return ((value - 273.15) * (21/40)) + 7.5;
      case 'gas_mark':
        // Convert to Celsius first
        const celsius = value - 273.15;
        
        // Approximate Gas Mark values
        if (celsius < 135) return 0;
        if (celsius < 149) return 1;
        if (celsius < 163) return 2;
        if (celsius < 177) return 3;
        if (celsius < 191) return 4;
        if (celsius < 204) return 5;
        if (celsius < 218) return 6;
        if (celsius < 232) return 7;
        if (celsius < 246) return 8;
        if (celsius < 260) return 9;
        if (celsius < 274) return 10;
        return Math.round((celsius - 150) / 14); // Approximate for higher values
        
      case 'planck':
        // Convert to Planck temperature units
        return value / 1.416784e32;
      case 'electron':
        // Convert to electron volts
        return value / 11604.5;
      case 'thermocouple_j':
        // Simplified J-type thermocouple response - very approximate
        return (value - 293.15) / 20; // Very rough conversion
      case 'thermocouple_k':
        // Simplified K-type thermocouple response
        return (value - 293.15) / 25; // Very rough conversion
      case 'thermocouple_t':
        // Simplified T-type thermocouple response
        return (value - 293.15) / 25; // Very rough conversion
      case 'oven_low':
        if (value < 373.15) return 0; // below low
        if (value <= 413.15) return 1; // standard low
        return 2; // above low
      case 'oven_medium':
        if (value < 433.15) return 0; // below medium
        if (value <= 473.15) return 1; // standard medium
        return 2; // above medium
      case 'oven_hot':
        if (value < 478.15) return 0; // below hot
        if (value <= 508.15) return 1; // standard hot
        return 2; // above hot
      case 'oven_very_hot':
        if (value < 508.15) return 0; // below very hot
        if (value <= 533.15) return 1; // standard very hot
        return 2; // above very hot
      case 'wedgwood':
        // Approximate conversion to Wedgwood scale
        return (value - 823.15) / 72.25; // Very approximate
      case 'leiden':
        // Approximate conversion to Leiden scale
        return (273.15 - value) * 2; // Approximate
      case 'hooke':
        // Approximate conversion to Hooke scale
        return (value - 273.15) * (9/5); // Highly simplified
      case 'dalton':
        // Approximate conversion to Dalton scale
        return (value - 273.15) * (6/5); // Approximate
      case 'fahrenheit_original':
        // Approximate conversion to original Fahrenheit
        return (value * (9/5)) - 460; // Approximate
      case 'solar_core':
        // Convert from Kelvin to solar core units
        return value / 15000000;
      case 'supernova':
        // Convert from Kelvin to supernova units
        return value / 1000000000;
      case 'cmbr':
        // Convert from Kelvin to CMBR units
        return value / 2.725;
      case 'absolute_hot':
        // Convert from Kelvin to theoretical absolute hot
        return value / 1.416784e32;
      case 'room_temp':
        // Room temperature comparison (where 1 is standard room temp)
        return value / 293.15;
      default:
        return value; // Default to returning Kelvin
    }
  }
  
  // Function to perform temperature conversion
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
    
    // For temperature, we first convert to kelvin then to target unit
    try {
      const kelvin = toKelvin(input, from);
      const result = fromKelvin(kelvin, to);
      
      // Check for NaN or Infinity
      if (isNaN(result) || !isFinite(result)) {
        resultText.textContent = "Conversion error - Please check the conversion";
        formulaText.textContent = "Temperature calculation error";
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
      localStorage.setItem('tempConverterHistory', JSON.stringify(conversionHistory));
      
      // Update history display
      displayHistory();
    } catch (e) {
      resultText.textContent = "Conversion error: " + e.message;
      formulaText.textContent = "Error in temperature calculation";
      resultDiv.classList.add('show');
    }
  }
  
  // Generate formula text for temperature conversions
  function generateFormulaText(fromUnit, toUnit, inputValue, result) {
    if (fromUnit === toUnit) {
      return `No conversion needed - units are the same`;
    }
    
    let formula = '';
    
    // Common temperature conversion formulas
    if (fromUnit === 'celsius' && toUnit === 'fahrenheit') {
      formula = `°F = (°C × 9/5) + 32 = (${inputValue} × 9/5) + 32 = ${result}`;
    } 
    else if (fromUnit === 'fahrenheit' && toUnit === 'celsius') {
      formula = `°C = (°F - 32) × 5/9 = (${inputValue} - 32) × 5/9 = ${result}`;
    }
    else if (fromUnit === 'celsius' && toUnit === 'kelvin') {
      formula = `K = °C + 273.15 = ${inputValue} + 273.15 = ${result}`;
    }
    else if (fromUnit === 'kelvin' && toUnit === 'celsius') {
      formula = `°C = K - 273.15 = ${inputValue} - 273.15 = ${result}`;
    }
    else if (fromUnit === 'fahrenheit' && toUnit === 'kelvin') {
      formula = `K = (°F + 459.67) × 5/9 = (${inputValue} + 459.67) × 5/9 = ${result}`;
    }
    else if (fromUnit === 'kelvin' && toUnit === 'fahrenheit') {
      formula = `°F = (K × 9/5) - 459.67 = (${inputValue} × 9/5) - 459.67 = ${result}`;
    }
    else if (fromUnit === 'celsius' && toUnit === 'rankine') {
      formula = `°R = (°C + 273.15) × 9/5 = (${inputValue} + 273.15) × 9/5 = ${result}`;
    }
    else if (fromUnit === 'rankine' && toUnit === 'celsius') {
      formula = `°C = (°R × 5/9) - 273.15 = (${inputValue} × 5/9) - 273.15 = ${result}`;
    }
    else if (fromUnit === 'fahrenheit' && toUnit === 'rankine') {
      formula = `°R = °F + 459.67 = ${inputValue} + 459.67 = ${result}`;
    }
    else if (fromUnit === 'rankine' && toUnit === 'fahrenheit') {
      formula = `°F = °R - 459.67 = ${inputValue} - 459.67 = ${result}`;
    }
    else if (fromUnit === 'celsius' && toUnit === 'reaumur') {
      formula = `°Ré = °C × 4/5 = ${inputValue} × 4/5 = ${result}`;
    }
    else if (fromUnit === 'reaumur' && toUnit === 'celsius') {
      formula = `°C = °Ré × 5/4 = ${inputValue} × 5/4 = ${result}`;
    }
    else if (fromUnit === 'celsius' && toUnit === 'delisle') {
      formula = `°De = (100 - °C) × 3/2 = (100 - ${inputValue}) × 3/2 = ${result}`;
    }
    else if (fromUnit === 'delisle' && toUnit === 'celsius') {
      formula = `°C = 100 - (°De × 2/3) = 100 - (${inputValue} × 2/3) = ${result}`;
    }
    else if (fromUnit === 'celsius' && toUnit === 'newton') {
      formula = `°N = °C × 33/100 = ${inputValue} × 33/100 = ${result}`;
    }
    else if (fromUnit === 'newton' && toUnit === 'celsius') {
      formula = `°C = °N × 100/33 = ${inputValue} × 100/33 = ${result}`;
    }
    else if (fromUnit === 'celsius' && toUnit === 'romer') {
      formula = `°Rø = (°C × 21/40) + 7.5 = (${inputValue} × 21/40) + 7.5 = ${result}`;
    }
    else if (fromUnit === 'romer' && toUnit === 'celsius') {
      formula = `°C = (°Rø - 7.5) × 40/21 = (${inputValue} - 7.5) × 40/21 = ${result}`;
    }
    else {
      // For more complex or less common conversions, we show the intermediate step
      const kelvinValue = toKelvin(inputValue, fromUnit).toFixed(2);
      formula = `First convert ${unitNames[fromUnit]} to Kelvin: ${inputValue} ${unitNames[fromUnit]} = ${kelvinValue} K<br>`;
      formula += `Then convert Kelvin to ${unitNames[toUnit]}: ${kelvinValue} K = ${result} ${unitNames[toUnit]}`;
    }
    
    return formula;
  }
  
  // Function to display history
  function displayHistory() {
    historyList.innerHTML = '';
    
    if (conversionHistory.length === 0) {
      const emptyMessage = document.createElement('div');
      emptyMessage.className = 'temp-converter-history-empty';
      emptyMessage.textContent = 'No conversion history yet';
      historyList.appendChild(emptyMessage);
      return;
    }
    
    conversionHistory.forEach((item, index) => {
      const historyItem = document.createElement('div');
      historyItem.className = 'temp-converter-history-item';
      
      // Create history item content
      const itemContent = document.createElement('div');
      itemContent.className = 'temp-converter-history-content';
      
      const conversion = document.createElement('div');
      conversion.className = 'temp-converter-history-conversion';
      conversion.innerHTML = `${item.from} <span class="unit">${item.fromUnit}</span> → ${item.to} <span class="unit">${item.toUnit}</span>`;
      
      const date = document.createElement('div');
      date.className = 'temp-converter-history-date';
      date.textContent = item.date;
      
      itemContent.appendChild(conversion);
      itemContent.appendChild(date);
      
      // Create reuse button
      const reuseBtn = document.createElement('button');
      reuseBtn.className = 'temp-converter-history-reuse';
      reuseBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/><path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/></svg>';
      reuseBtn.title = 'Reuse this conversion';
      
      reuseBtn.addEventListener('click', function() {
        // Set from and to units
        fromUnitSelected.textContent = getUnitByCode(item.fromCode).name;
        fromUnitSelected.dataset.value = item.fromCode;
        
        toUnitSelected.textContent = getUnitByCode(item.toCode).name;
        toUnitSelected.dataset.value = item.toCode;
        
        // Set input value
        inputValue.value = item.from;
        
        // Perform conversion with new values
        performConversion();
        
        // Scroll back to top for easy viewing
        document.querySelector('.temp-converter-card').scrollIntoView({ behavior: 'smooth' });
      });
      
      historyItem.appendChild(itemContent);
      historyItem.appendChild(reuseBtn);
      
      historyList.appendChild(historyItem);
    });
  }
  
  // Function to clear history
  function clearHistory() {
    conversionHistory = [];
    localStorage.removeItem('tempConverterHistory');
    displayHistory();
  }
});
  </script>
</body>
</html>