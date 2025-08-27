# Uma Musume Race Planner Frontend Fix

This guide will help you fix the frontend display issues in the Uma Musume Race Planner application.

## Issue

The frontend is not displaying properly because of missing dependencies and incorrect setup of Bootstrap and related libraries.

## Solution

Follow these steps to fix the frontend display issues:

1. **Install Required Dependencies**

   Run the following PowerShell script to install Bootstrap and its dependencies:

   ```powershell
   .\install_bootstrap.ps1
   ```

   This will install:
   - Bootstrap 5.3.2
   - Popper.js (required by Bootstrap)
   - Bootstrap Icons

2. **Build the Frontend Assets**

   The script will automatically run `npm run dev` to compile the frontend assets. This will:
   - Compile the SCSS to CSS
   - Compile the JavaScript
   - Generate the proper source maps
   - Version the assets

3. **Verify the Fix**

   After running the script, refresh your browser to see the properly styled frontend.

## Manual Fix (if the script doesn't work)

If the script doesn't work for any reason, follow these manual steps:

1. Install the dependencies:

   ```powershell
   npm install bootstrap @popperjs/core bootstrap-icons
   ```

2. Compile the assets:

   ```powershell
   npm run dev
   ```

3. If you still experience issues, try clearing the cache:

   ```powershell
   php artisan cache:clear
   php artisan view:clear
   php artisan route:clear
   php artisan config:clear
   ```

## Technical Details

The fix included:

1. Adding Bootstrap and its dependencies to package.json
2. Updating app.scss to import Bootstrap
3. Adding Bootstrap Icons CSS link to the app.blade.php layout
4. Importing Bootstrap JS in app.js and initializing Bootstrap components
5. Updating webpack.mix.js to properly handle the assets

If you need to make further changes to the styling, edit the resources/sass/app.scss file and recompile the assets using `npm run dev`.
