#!/bin/bash

# Startinvest.uz Development Automation Setup Script
# This script sets up the automated development workflow

echo "🚀 Setting up automated development workflow for Startinvest.uz..."

# Set git commit template
echo "📝 Setting up git commit message template..."
git config commit.template .gitmessage

# Configure git for automation
echo "⚙️ Configuring git settings..."
git config user.name "Claude Code Development"
git config user.email "development@startinvest.uz"

# Create feature branch for automated development
echo "🌿 Creating feature branch for automated development..."
git checkout -b feature/automated-completion 2>/dev/null || git checkout feature/automated-completion
git push -u origin feature/automated-completion 2>/dev/null || echo "Branch already exists on remote"

# Create backup tag
echo "💾 Creating backup tag..."
git tag "backup-$(date +%Y%m%d-%H%M%S)" || echo "Tag creation failed or already exists"

# Verify development environment
echo "🔍 Verifying development environment..."

# Check PHP and Composer
if ! command -v php &> /dev/null; then
    echo "❌ PHP not found. Please install PHP 8.2+"
    exit 1
fi

if ! command -v composer &> /dev/null; then
    echo "❌ Composer not found. Please install Composer"
    exit 1
fi

# Check Node.js and npm
if ! command -v node &> /dev/null; then
    echo "❌ Node.js not found. Please install Node.js v20.15.1"
    exit 1
fi

if ! command -v npm &> /dev/null; then
    echo "❌ npm not found. Please install npm"
    exit 1
fi

# Install dependencies if needed
echo "📦 Checking dependencies..."
if [ ! -d "vendor" ]; then
    echo "Installing PHP dependencies..."
    composer install
fi

if [ ! -d "node_modules" ]; then
    echo "Installing Node.js dependencies..."
    npm install
fi

# Run initial tests
echo "🧪 Running initial tests..."
php artisan test --stop-on-failure || echo "⚠️ Some tests failed - continuing anyway"

# Build assets to verify everything works
echo "🏗️ Building assets..."
npm run build || echo "⚠️ Asset build failed - continuing anyway"

echo "✅ Automated development workflow setup complete!"
echo ""
echo "📋 Next steps:"
echo "1. Review PROJECT_COMPLETION_PROMPTS.md for development phases"
echo "2. Review AUTOMATED_DEVELOPMENT_WORKFLOW.md for execution instructions"
echo "3. Start with Phase 1: Critical Investment System"
echo ""
echo "🤖 Ready for automated development with me!"
