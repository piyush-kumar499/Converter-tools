<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Weight & Mass Converter</title>
  <style>
    .weight-converter-root {
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
  --border-radius: 10px;
  --input-radius: 8px;
  --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
  --card-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.01);
  --transition: all 0.3s ease;
}

.weight-converter-root * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
}

.weight-converter-wrapper {
  background-color: var(--background-color);
  color: var(--text-color);
  line-height: 1.6;
  padding: 0;
  max-width: 900px;
  margin: 0 auto;
}

.weight-converter-title {
  text-align: center;
  margin-bottom: 2rem;
  color: var(--text-color);
  font-weight: 700;
  font-size: 2.2rem;
  position: relative;
  padding-bottom: 1rem;
}

.weight-converter-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 4px;
  background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
  border-radius: 2px;
}

.weight-converter-card {
  background-color: var(--card-color);
  border-radius: var(--border-radius);
  box-shadow: var(--card-shadow);
  padding: 2rem;
  margin-bottom: 2rem;
  border: 1px solid var(--border-color);
}

.weight-converter-form-group {
  margin-bottom: 1.5rem;
  position: relative;
}

.weight-converter-label {
  display: block;
  margin-bottom: 0.75rem;
  font-weight: 600;
  color: var(--text-color);
  font-size: 0.95rem;
}

.weight-converter-input {
  width: 100%;
  padding: 0.9rem 1rem;
  border: 1px solid var(--border-color);
  border-radius: var(--input-radius);
  font-size: 1rem;
  transition: var(--transition);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  color: var(--text-color);
}

.weight-converter-input:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
}

.weight-converter-input-group {
  display: flex;
  gap: 1.5rem;
  margin-bottom: 1.5rem;
}

.weight-converter-input-group > div {
  flex: 1;
}

.weight-converter-btn {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  color: white;
  border: none;
  border-radius: var(--input-radius);
  padding: 1rem 1.5rem;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
  width: 100%;
  box-shadow: 0 4px 6px rgba(63, 55, 201, 0.15);
  letter-spacing: 0.5px;
  position: relative;
  overflow: hidden;
}

.weight-converter-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: all 0.6s ease;
}

.weight-converter-btn:hover {
  background: linear-gradient(135deg, var(--primary-hover), var(--secondary-color));
  transform: translateY(-2px);
  box-shadow: 0 6px 12px rgba(63, 55, 201, 0.2);
}

.weight-converter-btn:hover::before {
  left: 100%;
}

.weight-converter-btn:active {
  transform: translateY(0);
}

.weight-converter-result {
  margin-top: 1.5rem;
  padding: 1.25rem;
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

.weight-converter-result.show {
  display: block;
}

.weight-converter-result p {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--text-color);
}

.weight-converter-formula {
  font-size: 0.9rem;
  color: var(--text-light);
  margin-top: 0.75rem;
  padding-top: 0.75rem;
  border-top: 1px dashed var(--border-color);
}

.weight-converter-history {
  margin-top: 2rem;
  background-color: var(--card-color);
  border-radius: var(--border-radius);
  box-shadow: var(--card-shadow);
  padding: 1.5rem;
  border: 1px solid var(--border-color);
}

.weight-converter-history-title {
  margin-bottom: 1rem;
  color: var(--text-color);
  font-weight: 600;
  border-bottom: 2px solid var(--border-color);
  padding-bottom: 0.75rem;
  position: relative;
}

.weight-converter-history-title::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 60px;
  height: 2px;
  background-color: var(--primary-color);
}

.weight-converter-history-list {
  max-height: 300px;
  overflow-y: auto;
  padding-right: 0.5rem;
  margin-bottom: 1rem;
  scrollbar-width: thin;
  scrollbar-color: var(--primary-color) var(--border-color);
}

.weight-converter-history-list::-webkit-scrollbar {
  width: 6px;
}

.weight-converter-history-list::-webkit-scrollbar-track {
  background: var(--border-color);
  border-radius: 10px;
}

.weight-converter-history-list::-webkit-scrollbar-thumb {
  background-color: var(--primary-color);
  border-radius: 10px;
}

.weight-converter-history-item {
  padding: 1rem;
  border-bottom: 1px solid var(--border-color);
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  transition: var(--transition);
  border-radius: 6px;
}

.weight-converter-history-item:hover {
  background-color: rgba(67, 97, 238, 0.05);
  transform: translateX(5px);
}

.weight-converter-history-item:last-child {
  border-bottom: none;
}

.weight-converter-history-item span {
  font-weight: 500;
}

.weight-converter-history-item small {
  color: var(--text-light);
  font-size: 0.8rem;
}

.weight-converter-clear-history {
  margin-top: 1rem;
  color: #e74c3c;
  background: none;
  border: 1px solid #e74c3c;
  padding: 0.65rem 1.25rem;
  cursor: pointer;
  border-radius: var(--input-radius);
  font-size: 0.9rem;
  transition: var(--transition);
  display: block;
  width: 100%;
  font-weight: 500;
}

.weight-converter-clear-history:hover {
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
  padding: 0.9rem 1rem;
  border: 1px solid var(--border-color);
  border-radius: var(--input-radius);
  background-color: white;
  cursor: pointer;
  font-size: 1rem;
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
  font-size: 1.2rem;
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
  max-height: 300px;
  overflow-y: auto;
  display: none;
  box-shadow: var(--box-shadow);
  margin-top: 5px;
  scrollbar-width: thin;
  scrollbar-color: var(--primary-color) var(--border-color);
}

.custom-dropdown-options::-webkit-scrollbar {
  width: 6px;
}

.custom-dropdown-options::-webkit-scrollbar-track {
  background: var(--border-color);
  border-radius: 10px;
}

.custom-dropdown-options::-webkit-scrollbar-thumb {
  background-color: var(--primary-color);
  border-radius: 10px;
}

.custom-dropdown-option {
  padding: 0.75rem 1rem;
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
  padding: 0.75rem 1rem;
  background-color: #f1f5f9;
  font-weight: 600;
  color: var(--text-color);
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.custom-dropdown-search {
  padding: 0.75rem;
  position: sticky;
  top: 0;
  background-color: white;
  border-bottom: 1px solid var(--border-color);
  z-index: 10;
}

.custom-dropdown-search input {
  width: 100%;
  padding: 0.65rem 0.85rem;
  border: 1px solid var(--border-color);
  border-radius: var(--input-radius);
  font-size: 0.9rem;
}

.custom-dropdown-search input:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
}

.error-message {
  color: var(--error-color);
  font-size: 0.85rem;
  margin-top: 0.5rem;
  display: none;
  font-weight: 500;
  animation: shake 0.4s linear;
}

@keyframes shake {
  0%, 100% {transform: translateX(0);}
  20%, 60% {transform: translateX(-5px);}
  40%, 80% {transform: translateX(5px);}
}

.weight-converter-input.error {
  border-color: var(--error-color);
  box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

/* Responsive styles */
@media (max-width: 768px) {
  .weight-converter-wrapper {
    padding: 1.5rem;
  }

  .weight-converter-title {
    font-size: 1.75rem;
  }

  .weight-converter-input-group {
    flex-direction: column;
    gap: 1rem;
  }
  
  .weight-converter-card, 
  .weight-converter-history {
    padding: 1.5rem;
  }

  .weight-converter-history-item {
    flex-direction: column;
    align-items: flex-start;
  }

  .weight-converter-history-item small {
    margin-top: 0.5rem;
    width: 100%;
  }

  .weight-converter-btn {
    padding: 0.85rem 1.25rem;
  }
}

@media (max-width: 480px) {
  .weight-converter-wrapper {
    padding: 1rem;
  }
  
  .weight-converter-title {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
  }

  .weight-converter-card, 
  .weight-converter-history {
    padding: 1.25rem;
  }

  .weight-converter-label {
    font-size: 0.9rem;
  }

  .weight-converter-input, 
  .custom-dropdown-selected {
    padding: 0.75rem;
    font-size: 0.95rem;
  }
}
  </style>
</head>
<body>
  <div class="weight-converter-root">
    <div class="weight-converter-wrapper">
      <h1 class="weight-converter-title">Weight & Mass Converter</h1>
      <div class="weight-converter-card">
        <div class="weight-converter-input-group">
          <div class="weight-converter-form-group">
            <label class="weight-converter-label" for="from-unit">From</label>
            <div class="custom-dropdown" id="from-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="from-unit-selected">Kilograms (kg)</div>
              <div class="custom-dropdown-options">
                <div class="custom-dropdown-search">
                  <input type="text" placeholder="Search units...">
                </div>
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
          
          <div class="weight-converter-form-group">
            <label class="weight-converter-label" for="to-unit">To</label>
            <div class="custom-dropdown" id="to-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="to-unit-selected">Pounds (lb)</div>
              <div class="custom-dropdown-options">
                <div class="custom-dropdown-search">
                  <input type="text" placeholder="Search units...">
                </div>
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
        </div>
        
        <div class="weight-converter-input-group">
          <div class="weight-converter-form-group">
            <label class="weight-converter-label" for="input-value">Enter Value</label>
            <input type="number" class="weight-converter-input" id="input-value" step="any" placeholder="Enter a number">
            <div id="input-error" class="error-message">Please enter a valid number</div>
          </div>
          
          <div class="weight-converter-form-group">
            <label class="weight-converter-label" for="decimal-places">Decimal Places</label>
            <div class="custom-dropdown" id="decimal-dropdown">
              <div class="custom-dropdown-selected" tabindex="0" id="decimal-places-selected">2</div>
              <div class="custom-dropdown-options">
                <!-- Options will be populated by JavaScript -->
              </div>
            </div>
          </div>
        </div>
        
        <button id="convert-btn" class="weight-converter-btn">Convert</button>
        
        <div id="result" class="weight-converter-result">
          <p id="result-text"></p>
          <div id="formula" class="weight-converter-formula"></div>
        </div>
      </div>
      
      <div class="weight-converter-history">
        <h3 class="weight-converter-history-title">Conversion History</h3>
        <div id="history-list" class="weight-converter-history-list"></div>
        <button id="clear-history" class="weight-converter-clear-history">Clear History</button>
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
  let conversionHistory = JSON.parse(localStorage.getItem('weightConverterHistory')) || [];
  
  // Add error event listener
  inputValue.addEventListener('input', function() {
    const errorElement = document.getElementById('input-error');
    inputValue.classList.remove('error');
    errorElement.style.display = 'none';
  });

  // Organize units by categories
  const unitCategories = {
    'Metric': [
      { code: 'kg', name: 'Kilograms (kg)' },
      { code: 'g', name: 'Grams (g)' },
      { code: 'mg', name: 'Milligrams (mg)' },
      { code: 'µg', name: 'Micrograms (µg)' },
      { code: 'ng', name: 'Nanograms (ng)' },
      { code: 'pg', name: 'Picograms (pg)' },
      { code: 'fg', name: 'Femtograms (fg)' },
      { code: 'ag', name: 'Attograms (ag)' },
      { code: 'zg', name: 'Zeptograms (zg)' },
      { code: 'yg', name: 'Yoctograms (yg)' },
      { code: 't', name: 'Tonnes (t)' },
      { code: 'q', name: 'Quintals (q)' },
      { code: 'Mt', name: 'Megatonnes (Mt)' },
      { code: 'Gt', name: 'Gigatonnes (Gt)' },
      { code: 'Tt', name: 'Teratonnes (Tt)' },
      { code: 'Pt', name: 'Petatonnes (Pt)' }
    ],
    'Imperial & US': [
      { code: 'lb', name: 'Pounds (lb)' },
      { code: 'oz', name: 'Ounces (oz)' },
      { code: 'st', name: 'Stone (st)' },
      { code: 'ton', name: 'Short tons (ton)' },
      { code: 'long_ton', name: 'Long tons (long ton)' },
      { code: 'cwt', name: 'US hundredweight (cwt)' },
      { code: 'long_cwt', name: 'Imperial hundredweight (long cwt)' },
      { code: 'slug', name: 'Slugs (slug)' },
      { code: 'dr', name: 'Drams (dr)' },
      { code: 'gr', name: 'Grains (gr)' },
      { code: 'quarter', name: 'Quarter (quarter)' }
    ],
    'Precious Metals & Gems': [
      { code: 'troy_oz', name: 'Troy Ounces (tr oz)' },
      { code: 'troy_pound', name: 'Troy Pounds (tr lb)' },
      { code: 'carat', name: 'Carats (ct)' },
      { code: 'point_gem', name: 'Points (gem)' },
      { code: 'assay_ton', name: 'Assay Ton (AT)' },
      { code: 'mite', name: 'Mites (mite)' },
      { code: 'grain', name: 'Grains (grain)' },
      { code: 'pennyweight', name: 'Pennyweight (dwt)' }
    ],
    'Asian': [
      { code: 'jin', name: 'Jin/Catty (斤)' },
      { code: 'liang', name: 'Liang/Tael (两)' },
      { code: 'qian', name: 'Qian (钱)' },
      { code: 'kan', name: 'Kan (貫)' },
      { code: 'momme', name: 'Momme (匁)' },
      { code: 'tola', name: 'Tola (तोला)' },
      { code: 'seer', name: 'Seer (सेर)' },
      { code: 'dharni', name: 'Dharni (धारणी)' },
      { code: 'maund', name: 'Maund (मन)' }
    ],
    'Ancient & Historical': [
      { code: 'talent_greek', name: 'Greek Talent (τάλαντον)' },
      { code: 'mina_greek', name: 'Greek Mina (μνᾶ)' },
      { code: 'drachma', name: 'Drachma (δραχμή)' },
      { code: 'talent_roman', name: 'Roman Talent' },
      { code: 'libra', name: 'Roman Libra' },
      { code: 'uncia', name: 'Roman Uncia' },
      { code: 'shekel', name: 'Biblical Shekel' },
      { code: 'beqa', name: 'Biblical Beqa' },
      { code: 'gerah', name: 'Biblical Gerah' },
      { code: 'mina_hebrew', name: 'Hebrew Mina' },
      { code: 'talent_hebrew', name: 'Hebrew Talent' }
    ],
    'Physics & Astronomy': [
      { code: 'u', name: 'Atomic Mass Units (u)' },
      { code: 'Da', name: 'Dalton (Da)' },
      { code: 'planck_mass', name: 'Planck mass' },
      { code: 'earth_mass', name: 'Earth masses (M⊕)' },
      { code: 'solar_mass', name: 'Solar masses (M☉)' },
      { code: 'jupiter_mass', name: 'Jupiter masses (MJ)' },
      { code: 'electron_mass', name: 'Electron rest mass' },
      { code: 'proton_mass', name: 'Proton rest mass' },
      { code: 'neutron_mass', name: 'Neutron rest mass' }
    ],
    'Food & Cooking': [
      { code: 'metric_cup', name: 'Metric Cup (250ml water)' },
      { code: 'us_cup', name: 'US Cup (flour)' },
      { code: 'tbsp', name: 'Tablespoon (flour)' },
      { code: 'tsp', name: 'Teaspoon (flour)' },
      { code: 'uk_cup', name: 'UK Cup (flour)' },
      { code: 'stick_butter', name: 'Sticks of Butter' }
    ],
    'Commercial': [
      { code: 'bag_cement', name: 'Bag of Cement (94lb)' },
      { code: 'bag_coffee', name: 'Bag of Coffee (60kg)' },
      { code: 'bale_cotton', name: 'Bale of Cotton (480lb)' },
      { code: 'bale_wool', name: 'Bale of Wool (336lb)' },
      { code: 'keg_nail', name: 'Keg of Nails (100lb)' },
      { code: 'carat_pearl', name: 'Pearl Carats (200mg)' }
    ]
  };

  // Base conversion factors to grams (SI unit)
  const toGrams = {
    // Metric
    kg: 1000, // kilogram
    g: 1, // gram
    mg: 0.001, // milligram
    µg: 0.000001, // microgram
    ng: 1e-9, // nanogram
    pg: 1e-12, // picogram
    fg: 1e-15, // femtogram
    ag: 1e-18, // attogram
    zg: 1e-21, // zeptogram
    yg: 1e-24, // yoctogram
    t: 1000000, // tonne (metric ton)
    q: 100000, // quintal
    Mt: 1e9, // megatonne
    Gt: 1e12, // gigatonne
    Tt: 1e15, // teratonne
    Pt: 1e18, // petatonne
    
    // Imperial & US
    lb: 453.59237, // pound
    oz: 28.349523125, // ounce
    st: 6350.29318, // stone
    ton: 907184.74, // short ton (US)
    long_ton: 1016046.9088, // long ton (UK)
    cwt: 45359.237, // US hundredweight (100 lb)
    long_cwt: 50802.34544, // Imperial hundredweight (112 lb)
    slug: 14593.903, // slug (unit of mass in Imperial units)
    dr: 1.7718451953125, // dram
    gr: 0.06479891, // grain
    quarter: 12700.58636, // quarter (28 lb)
    
    // Precious Metals & Gems
    troy_oz: 31.1034768, // troy ounce
    troy_pound: 373.2417216, // troy pound
    carat: 0.2, // carat (metric)
    point_gem: 0.002, // point (gemstone, 1/100 carat)
    assay_ton: 29.1667, // assay ton
    mite: 0.003239946, // mite (1/20 grain)
    grain: 0.06479891, // grain (same as gr above)
    pennyweight: 1.55517384, // pennyweight (1/20 troy ounce)
    
    // Asian
    jin: 500, // jin/catty (modern Chinese)
    liang: 50, // liang/tael (modern Chinese)
    qian: 5, // qian (modern Chinese)
    kan: 3750, // kan (Japanese)
    momme: 3.75, // momme (Japanese)
    tola: 11.6638, // tola (South Asian)
    seer: 933.104, // seer (South Asian)
    dharni: 2332.76, // dharni (Nepal)
    maund: 37324.16, // maund (South Asian)
    
    // Ancient & Historical
    talent_greek: 26196, // Greek talent (Attic)
    mina_greek: 436.6, // Greek mina
    drachma: 4.366, // Greek drachma
    talent_roman: 32700, // Roman talent
    libra: 327, // Roman libra (pound)
    uncia: 27.25, // Roman uncia (ounce)
    shekel: 11.4, // Biblical shekel
    beqa: 5.7, // Biblical beqa
    gerah: 0.57, // Biblical gerah
    mina_hebrew: 570, // Hebrew mina
    talent_hebrew: 34200, // Hebrew talent
    
    // Physics & Astronomy
    u: (1.66053906660e-24), // atomic mass unit
    Da: (1.66053906660e-24), // Dalton (same as atomic mass unit)
    planck_mass: (2.176434e-8), // Planck mass (kg converted to g)
    earth_mass: (5.9722e27), // Earth mass in grams
    solar_mass: (1.989e33), // Solar mass in grams
    jupiter_mass: (1.898e30), // Jupiter mass in grams
    electron_mass: (9.1093837015e-28), // electron rest mass in grams
    proton_mass: (1.67262192369e-24), // proton rest mass in grams
    neutron_mass: (1.67492749804e-24), // neutron rest mass in grams
    
    // Food & Cooking
    metric_cup: 250, // Metric cup (based on water - 1g/ml)
    us_cup: 120, // US cup of flour (approx)
    tbsp: 7.5, // Tablespoon of flour (approx)
    tsp: 2.5, // Teaspoon of flour (approx)
    uk_cup: 140, // UK cup of flour (approx)
    stick_butter: 113, // Stick of butter (US)
    
    // Commercial
    bag_cement: 42638.5, // Bag of cement (94 lb)
    bag_coffee: 60000, // Bag of coffee (60 kg)
    bale_cotton: 217724, // Bale of cotton (480 lb)
    bale_wool: 152278, // Bale of wool (336 lb)
    keg_nail: 45359.2, // Keg of nails (100 lb)
    carat_pearl: 0.2 // Pearl carat (200 mg)
  };

  // Names for units (long form)
  const unitNames = {
    // Metric
    kg: "kilograms",
    g: "grams",
    mg: "milligrams",
    µg: "micrograms",
    ng: "nanograms",
    pg: "picograms",
    fg: "femtograms",
    ag: "attograms",
    zg: "zeptograms",
    yg: "yoctograms",
    t: "tonnes",
    q: "quintals",
    Mt: "megatonnes",
    Gt: "gigatonnes",
    Tt: "teratonnes",
    Pt: "petatonnes",
    
    // Imperial & US
    lb: "pounds",
    oz: "ounces",
    st: "stone",
    ton: "short tons",
    long_ton: "long tons",
    cwt: "US hundredweight",
    long_cwt: "Imperial hundredweight",
    slug: "slugs",
    dr: "drams",
    gr: "grains",
    quarter: "quarters",
    
    // Precious Metals & Gems
    troy_oz: "troy ounces",
    troy_pound: "troy pounds",
    carat: "carats",
    point_gem: "points",
    assay_ton: "assay tons",
    mite: "mites",
    grain: "grains",
    pennyweight: "pennyweight",
    
    // Asian
    jin: "jin/catty",
    liang: "liang/tael",
    qian: "qian",
    kan: "kan",
    momme: "momme",
    tola: "tola",
    seer: "seer",
    dharni: "dharni",
    maund: "maund",
    
    // Ancient & Historical
    talent_greek: "Greek talents",
    mina_greek: "Greek minas",
    drachma: "drachmas",
    talent_roman: "Roman talents",
    libra: "Roman libras",
    uncia: "Roman uncias",
    shekel: "Biblical shekels",
    beqa: "Biblical beqas",
    gerah: "Biblical gerahs",
    mina_hebrew: "Hebrew minas",
    talent_hebrew: "Hebrew talents",
    
    // Physics & Astronomy
    u: "atomic mass units",
    Da: "daltons",
    planck_mass: "Planck masses",
    earth_mass: "Earth masses",
    solar_mass: "Solar masses",
    jupiter_mass: "Jupiter masses",
    electron_mass: "electron rest masses",
    proton_mass: "proton rest masses",
    neutron_mass: "neutron rest masses",
    
    // Food & Cooking
    metric_cup: "metric cups",
    us_cup: "US cups",
    tbsp: "tablespoons",
    tsp: "teaspoons",
    uk_cup: "UK cups",
    stick_butter: "sticks of butter",
    
    // Commercial
    bag_cement: "bags of cement",
    bag_coffee: "bags of coffee",
    bale_cotton: "bales of cotton",
    bale_wool: "bales of wool",
    keg_nail: "kegs of nails",
    carat_pearl: "pearl carats"
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
    populateUnitDropdown(fromDropdown, 'kg');
    populateUnitDropdown(toDropdown, 'lb');
    
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
  
  // Function to perform conversion with high precision
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
    
    // For maximum precision, convert via base unit (grams)
    // input → grams → output
    const grams = input * toGrams[from];
    const result = grams / toGrams[to];
    
    // Check for NaN or Infinity
    if (isNaN(result) || !isFinite(result)) {
      resultText.textContent = "Conversion error - Please check the conversion factors";
      formulaText.textContent = "Make sure all units have proper conversion factors defined";
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
    localStorage.setItem('weightConverterHistory', JSON.stringify(conversionHistory));
    
    // Update history display
    displayHistory();
  }
  
  // Generate formula text
  function generateFormulaText(fromUnit, toUnit, inputValue, result) {
    if (fromUnit === toUnit) {
      return `No conversion needed - units are the same`;
    }
    
    // Direct conversion factor
    const conversionFactor = toGrams[toUnit] === 0 ? 0 : toGrams[fromUnit] / toGrams[toUnit];
    
    if (isNaN(conversionFactor) || !isFinite(conversionFactor)) {
      return `Conversion factor not available`;
    }
    
    return `${unitNames[toUnit] || toUnit} = ${unitNames[fromUnit] || fromUnit} × ${conversionFactor.toExponential(6)}`;
  }
  
  // Function to display history
  function displayHistory() {
    historyList.innerHTML = '';
    
    if (conversionHistory.length === 0) {
      const emptyItem = document.createElement('div');
      emptyItem.className = 'weight-converter-history-item';
emptyItem.textContent = 'No conversion history yet';
historyList.appendChild(emptyItem);
return;
}

conversionHistory.forEach((item) => {
  const historyItem = document.createElement('div');
  historyItem.className = 'weight-converter-history-item';
  historyItem.innerHTML = `
        <span>${item.from} ${item.fromUnit} = ${item.to} ${item.toUnit}</span>
        <small>${item.date}</small>
      `;
  
  // Add click event to use this conversion again
  historyItem.addEventListener('click', () => {
    // Set values in dropdowns
    const fromUnit = getUnitByCode(item.fromCode);
    const toUnit = getUnitByCode(item.toCode);
    
    if (fromUnit) {
      fromUnitSelected.textContent = fromUnit.name;
      fromUnitSelected.dataset.value = item.fromCode;
    }
    
    if (toUnit) {
      toUnitSelected.textContent = toUnit.name;
      toUnitSelected.dataset.value = item.toCode;
    }
    
    inputValue.value = item.from;
    performConversion();
  });
  
  historyList.appendChild(historyItem);
});
}

// Function to clear history
function clearHistory() {
  if (confirm('Are you sure you want to clear all conversion history?')) {
    conversionHistory = [];
    localStorage.removeItem('weightConverterHistory');
    displayHistory();
  }
}

// Helper function to safely compare floating point numbers
function areEqual(a, b, tolerance = 1e-10) {
  return Math.abs(a - b) < tolerance;
}
});
    </script> 
    </body>  
    </html>