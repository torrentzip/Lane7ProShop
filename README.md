# Lane 7 Pro Shop

A small bowling pro shop web app with a product catalog and a shopping cart. Built for the SDC310L course project.

## Project Summary

### Project Description
Lane 7 Pro Shop is a PHP and MySQL web application. Customers browse a text catalog of 6 bowling products, add items to a cart, change quantities, and check out. The cart page shows each item's total, a 5% tax, 10% shipping and handling, and the order total.

### Project Tasks
- **Task 1: Plan the project**
  - Break the work into weekly tasks in the project plan
- **Task 2: Create the infrastructure**
  - Design the lane7_shop database and products table, and load the product data
  - Set up the page framework and GitHub repository
- **Task 3: Add database support**
  - Read products with PHP and mysqli prepared statements
  - Store the cart in the session with add, remove and quantity controls
- **Task 4: Apply MVC**
  - Split the code into model, view and controller folders
- **Task 5: Finalize and test**
  - Add tax, shipping, order total and check out
  - Test the app and write the test description

### Project Skills Learned
- PHP and MySQL with prepared statements
- Session-based shopping cart logic
- MVC architecture
- Git and GitHub (branches, pull requests, tags)
- Planning and testing

### Language Used
- **PHP**: application logic
- **MySQL**: product data
- **HTML and CSS**: pages and styling

### Development Process Used
- Weekly phases with a project plan, a feature branch for the MVC refactor, and a tag at the end of each phase

### Notes
- Requires XAMPP with Apache and MySQL running.
- Import database/lane7_shop.sql in phpMyAdmin, then open http://localhost/Lane7ProShop/index.php.
- The app connects as ecpi_user to the lane7_shop database.

### Link to Project
[Lane 7 Pro Shop Repository](https://github.com/torrentzip/Lane7ProShop)