# Custom WordPress Theme Boilerplate
A modular, performance-focused WordPress starter theme designed for speed and scalability. This theme uses a clean separation of concerns, moving logic out of functions.php and into dedicated partials.

## 🚀 Key Features
Modular Architecture: Logic is organized within the /includes directory to keep functions.php lightweight.

Asset Minification: Optimized scripts/ and styles/ are minified into a production-ready /minified directory.

WooCommerce Ready: Includes shop.php for handling e-commerce integrations.

## 📂 Project Structure

```text
├── config/               # Build tool configurations and constants
├── includes/             # PHP Logic (Required by functions.php)
│   ├── menus.php         # Navigation menu registrations
│   ├── setup.php         # Theme setup and global hooks
│   ├── shop.php          # WooCommerce-specific functions
│   └── theme-support.php # Theme feature support (post-thumbnails, etc.)
├── scripts/              # Source JavaScript files
├── styles/               # Source CSS/Sass files
├── minified/             # Production-ready assets (JS/CSS)
├── footer.php            # Theme footer template
├── header.php            # Theme header template
├── functions.php         # Main entry point for theme logic
├── index.php             # Main template file
└── style.css             # Theme metadata and global styles
````

## 🛠️ Installation
Upload the theme folder to /wp-content/themes/.

Navigate to Appearance > Themes in the WordPress dashboard.

Activate the theme.
