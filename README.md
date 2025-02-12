# Car SAW (Simple Additive Weighting)

## Project Description
Car SAW is a web-based application that utilizes the Simple Additive Weighting (SAW) method to help users select the best car based on predefined criteria. This project is designed to provide a simple yet effective solution for multi-criteria decision-making.

## Key Features
- Input car data along with its criteria (price, performance, fuel consumption, etc.).
- Define weight for each criterion according to user preferences.
- Calculate SAW values to determine the best car.
- Display ranking results of cars based on SAW scores.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Framework**: Laravel

## Installation
Follow these steps to run this project locally:

1. **Clone this repository:**
   ```bash
   git clone https://github.com/zhubailee/car-saw.git
   ```

2. **Navigate to the project directory:**
   ```bash
   cd car-saw
   ```

3. **Configure the database:**
   - Create a new database in MySQL named `car_saw` (or any preferred name).
   - Import the SQL file located in the `database` folder into the created database.

4. **Set up database connection:**
   - Open the database configuration file in your project folder (e.g., `application/config/database.php` if using CodeIgniter).
   - Update the following settings according to your local configuration:
     ```php
     'hostname' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'car_saw',
     ```

5. **Run the local server:**
   - If using XAMPP or LAMP, move the project folder to the `htdocs` directory or your server's directory.
   - Access the project in your browser at `http://localhost/car-saw`.

## Usage
1. Enter car data and its criteria values on the input page.
2. Define weights for each criterion based on your priorities.
3. Click the "Process" button to calculate the SAW scores.
4. View the ranking results based on the highest scores.

## Folder Structure
```
car-saw/
├── application/     # Folder for backend files (if using CodeIgniter)
├── assets/          # Folder for frontend files such as CSS, JS, and images
├── database/        # Folder for SQL files (database schema)
├── system/          # Folder for the system (if using a framework)
└── index.php        # Application entry point
```

## Contribution
Contributions are welcome! Please create a **Pull Request** for major changes or open an **Issue** to discuss ideas or bugs.

### How to Contribute
1. Fork this repository.
2. Create a new feature branch:
   ```bash
   git checkout -b your-feature
   ```
3. Commit your changes:
   ```bash
   git commit -m 'Add feature X'
   ```
4. Push to your branch:
   ```bash
   git push origin your-feature
   ```
5. Open a Pull Request.

## License
This project is licensed under the [MIT License](LICENSE).

---

Developed with ❤️ by [Zhubailee](https://github.com/zhubailee).
