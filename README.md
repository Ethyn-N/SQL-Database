# Project Overview

This project develops a web interface for managing the "Organic Food Shop" database, incorporating SQL database interactions through PHP. This README details the scripts and files included in the project, their organization, and usage instructions.

## Project Structure

### SQL Scripts

- `DDL.sql` - Contains the Data Definition Language commands for setting up the database schema, including tables and relationships.

### PHP Files

All PHP files are contained within the `php_item_demo` folder:
- `itemManagement.php` - Central interface for managing items, including adding, updating, deleting, and searching for items.
- `Database.php` - Manages the database connection.
- `Service.php` - Contains business logic for the application.
- `Item.php` - Defines the Item class based on the database schema.

## Setup Instructions

### Database Setup

1. Run `DDL.sql` on your SQL server to initialize the database schema.
2. Import data using the zip file `Phase2-Data_Updated.zip`.

### Data Import Instructions

To import data from the zip file into your database, follow these steps:

1. **Extract the Zip File:**
   - Extract the `Phase2-Data_Updated.zip` to a known location on your system.

2. **Import Data:**
   - Use phpMyAdmin or a similar tool to import the CSV files into your database. Navigate to the appropriate table, go to the "Import" tab, and select the CSV file corresponding to that table.

### Web Server Setup

- **Start XAMPP Services**: Before deploying, make sure that the Apache and MySQL services are started in the XAMPP control panel. This ensures that your server can process PHP files and handle the database.
- Deploy the `php_item_demo` folder to the root directory of your web server (e.g., Apache's `htdocs`). This folder contains all the necessary PHP files.
- Ensure `Database.php` within the `php_item_demo` folder is configured with the correct database access credentials.

### Accessing the Web Interface

- Open a web browser and navigate to `http://localhost/php_item_demo/itemManagement.php` to manage items through the unified interface.

## Usage

The `itemManagement.php` serves as a comprehensive tool for item management:

- **Add Item**: Fill in the item details and submit.
- **Update Item**: Provide the item ID along with any new values for the item's name or price to update.
- **Delete Item**: Submit the item ID of the item you wish to remove.
- **Search Item**: Enter the item ID or name to search and view matching items.

This interface streamlines all operations related to item management into a single, efficient web page, enhancing usability and management efficiency.

