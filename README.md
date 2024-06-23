# Gallery MVC PHP Project

## Project Description
This site is an online gallery, where everyone can create an account and load their photos to publish.
They can also like photos, edit, delete, and download.

## Installation Instructions
1. Clone the repository
```sh
git clone https://github.com/inaangelok/Gallery.git

```
## Create the database
1. Create Database
   * You can just open your MySQL client or phpMyAdmin.
   * Run the following command to create a database named gallery with utf8_general_ci encoding:

```sql
CREATE DATABASE gallery CHARACTER SET utf8 COLLATE utf8_general_ci;
```
2. Import SQL File
   * Navigate to the directory where you cloned the repository.
   * Locate the gallery.sql file.
   * Import the gallery.sql file into the gallery database

## Configure Server Settings
1. Domain Setup
   * Create a domain (or a subdomain) on your server.
   * Point the domain to the public folder of your cloned repository.

2. Server Requirements:
   * Ensure your server is running PHP 8.0.
   * Ensure your server is running MySQL 8.0-8.1.
   * Ensure necessary PHP extensions like mysqli, pdo_mysql, and gd are enabled.

     
## Set Up Environment Variables
1. Reset database information:
   * Open the vendor/mode/Model.php file and set up your database settings:
    ```php
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'gallery';
    
    ```

## Open the Application
1. Open a web browser.
2. Navigate to the domain you set up in the server settings:
   ```sh
   http://your-created-domain/

   ```
3. You should see the home page of your Gallery MVC PHP application.

## Troubleshooting
1. **Database Connection Issues:** Double-check your database credentials
2. **Permission Issues:** Ensure the public directory and its subdirectories have the appropriate permissions.
3. **Missing Extensions:** Verify that all required PHP extensions are enabled.

## Navigation
1. Home page
   
   You can redirect to the home page by clicking the Logo "Gallery" or typing
   ```sh
    HTTP://your-domain/front/home
   ```
   
   ![Home page](https://github.com/inaangelok/Gallery/blob/main/Screenshots/Screenshot%202024-06-22%20202135.png)
   
   Here is the same page after authentification
   
   ![Home Page Registered](https://github.com/inaangelok/Gallery/blob/main/Screenshots/Screenshot%202024-06-22%20202238.png?raw=true)

3. Other pages

   Here is the navigation structure for other pages:
   ### Header
   
      * Login/Logout
      * My photos
      * Wishlist
  
   ### Footer
   
      * Login and Register/Logout
      * Add Photo
      * My Photos
      * Wishlist
      * Blank Pages without href
  
  ## Screenshots

  There are also screenshots of every page in the Screenshots/ folder.

## Summary

Feel free to ask if you need further clarification or have additional questions!

