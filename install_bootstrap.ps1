# PowerShell script to install Bootstrap dependencies and build assets
Write-Host "Installing Bootstrap and related dependencies..."
npm install bootstrap
npm install @popperjs/core
npm install bootstrap-icons
Write-Host "Running npm build..."
npm run dev
Write-Host "Installation and build completed successfully!"
