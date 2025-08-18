#!/bin/sh

# Wait for the PHP container to be ready
echo "Waiting for PHP container..."
sleep 10

# Install npm dependencies
npm install

# Generate types
cd /var/www && php artisan wayfinder:generate

# Start the development server
npm run dev
