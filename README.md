# Urban Collection eCommerce Web App

Urban Collection is a web-based eCommerce platform designed to facilitate the online sale of clothing items. Developed 
using HTML, PHP, CSS, JavaScript, and JSON, the platform provides a seamless shopping experience for users. The web app 
was created by Austin and Jeff and includes key features such as product browsing, shopping cart management, and an about 
page for company details.

## Table of Contents
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [Web App Structure](#web-app-structure)
- [Usage](#usage)
- [Features](#features)
- [License](#license)
- [Authors](#authors)

## Technologies Used

- HTML: Structuring the webpages
- CSS: Styling and designing the user interface
- JavaScript: Adding interactivity and handling client-side logic
- PHP: Managing server-side processes and data handling
- JSON: Storing product details dynamically

## Project Structure
The project consists of the following files:

1. **index.php (Home Page)**: Serves as the landing page, displaying featured products and site navigation.
2. **shop.php (Shop Page)**: Displays the list of available clothing items, dynamically populated from a JSON file.
3. **cart.php (Cart Page)**: Manages the user's selected items for purchase.
4. **about.php (About Page)**: Provides details about the Urban Collection brand and its creators.
5. **styles.css**: Styles the web app with a modern and responsive design.
6. **index.js**: Handles client-side interactivity, including fetching and displaying product data.
7. **products.json**: Stores product details, including name, price, image, and description.
8. **server.php**: Handles backend operations related to cart management and order processing.

## Getting Started
### Prerequisites
Ensure you have the following installed:
- A web browser (Chrome, Firefox, Edge, etc.)
- A local server (e.g., XAMPP, WAMP, or MAMP) to run PHP files

### Installation
1. Download the project files.
2. Place the project folder in your local server's root directory (e.g., `htdocs` for XAMPP).
3. Start the local server and open the `index.html` file in a web browser.

## Web App Structure
The web app consists of five primary pages:

### Home Page
Provides an introduction to Urban Collection.
Features a banner showcasing new arrivals and discounts.
Includes navigation links to the Shop, Cart, Blog, and About pages.

### Shop Page
Displays a list of clothing items retrieved from a JSON file.
Users can view product details such as name, price, and images.
“Add to Cart” button for each item to enable selection for purchase.

### Cart Page

Shows the selected items added to the cart.
Provides an option to update or remove items.
Displays the total price and a checkout option.

### Blog Page
Features fashion-related articles, styling tips, and industry trends.
Users can read and comment on blog posts.
Encourages engagement with customers through fashion discussions.

### About Page
Provides background information on Urban Collection.
Details about the developers, Austin and Jeff.
Contact information for customer inquiries.

## Usage
To use the **Urban Collection** web app:
1. **Browse the Shop**: Navigate to the **Shop Page** to view available clothing items.
2. **Add to Cart**: Select products to add to the shopping cart.
3. **Manage Cart**: View, update, or remove items in the cart.
4. **Proceed to Checkout**: Complete the purchase process (future enhancement).

## Features
- **Dynamic Product Listing**: Items are retrieved from `products.json`.
- **Cart Management**: Users can add and remove items dynamically.
- **Responsive Design**: Optimized for different screen sizes.
- **PHP Integration**: Handles cart operations and potential backend enhancements.

## License
MIT License

Permission is granted to use, modify, and distribute this software under the MIT License.

## Authors
- **Austin**
- **Jeff**

For inquiries, contact: **support@urbancollection.com**

