# Speed Converter

![Speed Converter Screenshot](https://github.com/piyush-kumar499/Converter-tools/blob/a5dd9ebfcf6e171a79bc44f7a7d024fcd1758b41/Speed%20Converter/IMG_20250730_152856.jpg)
![Conversion History](https://github.com/piyush-kumar499/Converter-tools/blob/a5dd9ebfcf6e171a79bc44f7a7d024fcd1758b41/Speed%20Converter/Screenshot_2025-07-30-15-28-20-47_40deb401b9ffe8e1df2f1cc5ba480b12.jpg)

A feature-rich web-based speed converter that supports 50+ speed units across 9 different categories, from everyday units like km/h and mph to specialized units like Mach numbers and animal speeds.

## Author
**Piyush Kumar**

## Features

- **50+ Speed Units**: Convert between metric, imperial, nautical, aviation, scientific, and even animal speeds
- **9 Unit Categories**: Organized into Metric, Imperial & US, Nautical, Aviation & Space, Physics & Scientific, Computer & Data Transfer, Sports & Recreation, Animal Speeds, and Historical units
- **Smart Search**: Find units quickly with the integrated search functionality
- **Conversion History**: Keep track of your conversions with persistent local storage
- **Educational Context**: Special notes for unique units like Mach numbers and speed of light
- **Precision Control**: Adjustable decimal places from 2 to 10
- **Responsive Design**: Optimized for all screen sizes
- **Formula Display**: Shows conversion formulas for learning purposes

## Supported Unit Categories

- **Metric**: km/h, m/s, cm/s, km/min, m/min, km/day, mm/s
- **Imperial & US**: mph, mi/min, ft/s, ft/min, in/s, in/min, mi/day, yd/h, yd/s
- **Nautical**: Knots, Nautical miles/h, Beaufort scale
- **Aviation & Space**: Mach number, Speed of light, KIAS, KCAS
- **Physics & Scientific**: Earth escape velocity, Orbital velocity, Sound speeds
- **Computer & Data Transfer**: Kbps, Mbps, Gbps, Tbps
- **Sports & Recreation**: Marathon pace, F1 speed, Sprinter speed, Cyclist speed
- **Animal Speeds**: Cheetah, Peregrine falcon, Sailfish, Horse, Human, Snail
- **Historical**: Camel caravan, Horse carriage, Ancient ship, Steam locomotive

## Usage

1. Open `speed-converter.html` in your web browser
2. Select source unit from the "From" dropdown
3. Select target unit from the "To" dropdown
4. Enter the speed value to convert
5. Adjust decimal places if needed
6. Click "Convert" to see the result
7. Browse conversion history and reuse previous conversions

## Special Features

### Educational Notes
The converter provides contextual information for special units:
- Mach numbers (varies with altitude and temperature)
- Speed of light (constant in vacuum)
- Data transfer rates (not physical speeds but included for comparison)
- Escape and orbital velocities

### High Precision Calculations
All conversions use meters per second as the base unit for maximum accuracy, ensuring precise results even for very large or small values.

## Technical Details

- Standalone HTML file with embedded CSS and JavaScript
- No external dependencies or internet connection required
- Local storage for persistent conversion history
- Modern responsive design with CSS custom properties
- Custom dropdown components with search and filtering
- High-precision floating-point calculations

## File Structure

```
speed-converter.html    # Complete application in single file
```

## Browser Support

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- Lightweight: ~50KB total file size
- Fast loading: Everything embedded in single file
- Smooth animations: CSS transitions and transforms
- Efficient search: Real-time filtering without lag

## License

This project is open source and available under the MIT License.
