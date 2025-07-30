# Pressure Converter

![Pressure Converter Screenshot](screenshots/pressure-converter-main.png)
![Conversion Result](screenshots/pressure-converter-result.png)

A comprehensive web-based pressure unit converter that supports over 30 different pressure units across multiple categories including SI units, Imperial/US units, meteorological units, and more.

## Author
**Piyush Kumar**

## Features

- **30+ Pressure Units**: Convert between Pascal, Bar, PSI, Atmosphere, Torr, mmHg, and many more
- **Organized Categories**: Units grouped by SI, Imperial/US, Meteorological, Technical, Vacuum & Low Pressure, and Other units
- **Search Functionality**: Quickly find specific units with the built-in search feature
- **Conversion History**: Track your recent conversions with persistent storage
- **Scientific Notation**: Option for very large or small numbers
- **Customizable Precision**: Choose decimal places from 0 to 10
- **Responsive Design**: Works seamlessly on desktop and mobile devices
- **Formula Display**: Shows the conversion formula used for educational purposes

## Supported Unit Categories

- **SI Units**: Pascal, Kilopascal, Megapascal, Gigapascal, Bar, Millibar
- **Imperial/US Units**: PSI, KSI, PSF, Inch Mercury, Inch Water
- **Meteorological**: Atmosphere, Torr, mmHg, cmH₂O, Hectopascal
- **Technical**: Technical Atmosphere, kgf/cm², N/m², kN/m²
- **Vacuum & Low Pressure**: Microbar, Micropascal, Millitorr, Micron Mercury
- **Other Units**: Barye, Pieze, Exapascal, Dyne/cm²

## Usage

1. Open `pressure-converter.html` in your web browser
2. Select the "From" unit using the dropdown menu
3. Select the "To" unit for conversion
4. Enter the value you want to convert
5. Choose decimal places for precision
6. Click "Convert" to see the result
7. View conversion history and reuse previous conversions

## Technical Details

- Pure HTML, CSS, and JavaScript - no external dependencies
- Local storage for conversion history persistence
- Responsive design with modern CSS Grid and Flexbox
- Custom dropdown components with search functionality
- High-precision calculations using base unit conversion (Pascal)

## File Structure

```
pressure-converter.html    # Main application file
```

## Browser Compatibility

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## License

This project is open source and available under the MIT License.
