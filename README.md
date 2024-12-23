# Laravel Project: Incident Mapping and Visualization

## Project Overview
This project is a Laravel-based application for managing and visualizing incident data. It allows users to input incidents, associate them with specific geographical locations, and display these incidents on an interactive map. The map provides two visualization options:
1. Marker-based visualization for individual incidents.
2. Interactive choropleth map for aggregated incident data by region.

---

## Features
### 1. Incident Management (CRUD)
- Add, edit, view, and delete incidents.
- Store information including:
  - Location name
  - Region name
  - Latitude and longitude
  - Description of the incident

### 2. Interactive Map Visualization
- **Marker-based Map:**
  - Displays individual incidents as markers on the map.
  - Clicking a marker shows the incident's details.
- **Choropleth Map:**
  - Highlights regions based on the number of incidents.
  - Uses a color gradient to indicate incident density.
  - Clicking on a region shows the total number of incidents.

### 3. Local Database with SQLite
- All incident data is stored locally in an SQLite database.
- Dummy data includes various incidents in and around Bandung, Indonesia.

---

## Setup and Installation

### Prerequisites
1. PHP >= 8.1
2. Composer
3. Laravel >= 10.x
4. SQLite
5. A web browser

### Installation Steps
1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <project-directory>
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Configure the `.env` file:
   - Set database connection to SQLite:
     ```env
     DB_CONNECTION=sqlite
     DB_DATABASE=/full/path/to/database.sqlite
     ```
   - Create the SQLite database file if it doesn't exist:
     ```bash
     touch database/database.sqlite
     ```
4. Run migrations:
   ```bash
   php artisan migrate
   ```
5. Seed dummy data (optional):
   ```bash
   php artisan tinker
   ```
   Paste the following code to add dummy data:
   ```php
   use App\Models\Incident;

   $dummyData = [
       [
           'location_name' => 'Alun-Alun Bandung',
           'region_name' => 'Bandung',
           'latitude' => -6.921273,
           'longitude' => 107.607891,
           'description' => 'Sering terjadi pencopetan saat malam hari.',
       ],
       [
           'location_name' => 'Stasiun Bandung',
           'region_name' => 'Bandung',
           'latitude' => -6.914744,
           'longitude' => 107.609810,
           'description' => 'Kasus kehilangan barang di sekitar area parkir.',
       ],
       [
           'location_name' => 'Cihampelas Walk',
           'region_name' => 'Bandung',
           'latitude' => -6.893554,
           'longitude' => 107.610116,
           'description' => 'Beberapa laporan penipuan di sekitar tempat parkir.',
       ],
       [
           'location_name' => 'Pasar Baru Trade Center',
           'region_name' => 'Bandung',
           'latitude' => -6.916325,
           'longitude' => 107.602433,
           'description' => 'Sering terjadi pencurian di dalam pasar.',
       ],
       [
           'location_name' => 'Gedung Sate',
           'region_name' => 'Bandung',
           'latitude' => -6.902515,
           'longitude' => 107.618583,
           'description' => 'Beberapa laporan perampokan saat malam hari.',
       ],
   ];

   foreach ($dummyData as $data) {
       Incident::create($data);
   }
   ```
6. Serve the application:
   ```bash
   php artisan serve
   ```
7. Access the application in your browser:
   ```
   http://127.0.0.1:8000
   ```

---

## Current Progress
1. **CRUD Implementation**: Fully functional.
2. **Interactive Maps**:
   - Markers for individual incidents.
   - Choropleth map for visualizing incident density.
3. **Dummy Data**: Seeded with locations in and around Bandung.
4. **SQLite Database**: Configured and operational.

---

## Next Steps
1. Enhance the UI and UX of the application.
2. Add filtering options for incidents based on region or date.
3. Implement user authentication and authorization for managing incidents.
4. Explore offline map functionality.
5. Optimize for mobile devices.

---

## Technical Stack
- **Backend**: Laravel 10.x
- **Database**: SQLite
- **Frontend**: HTML, CSS, Leaflet.js
- **Mapping**: Leaflet.js with OpenStreetMap tiles

---

## License
This project is open-source and licensed under the [MIT License](LICENSE).

