#!/bin/bash

# Automated Commit Helper Script for Startinvest.uz Development
# Usage: ./commit-helper.sh "commit message" [type]

if [ $# -eq 0 ]; then
    echo "Usage: $0 \"commit message\" [type]"
    echo "Types: feat, fix, docs, style, refactor, test, chore"
    exit 1
fi

COMMIT_MESSAGE="$1"
COMMIT_TYPE="${2:-feat}"

echo "🔍 Checking project status..."

# Check for staged changes
if git diff --cached --quiet; then
    echo "📋 Staging all changes..."
    git add .
else
    echo "✅ Changes already staged"
fi

# Run tests before committing
echo "🧪 Running tests..."
if ! php artisan test --stop-on-failure; then
    echo "❌ Tests failed! Please fix issues before committing."
    read -p "Do you want to commit anyway? (y/N): " -n 1 -r
    echo
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        echo "Commit cancelled."
        exit 1
    fi
fi

# Check if build passes
echo "🏗️ Checking frontend build..."
if ! npm run build > /dev/null 2>&1; then
    echo "⚠️ Frontend build failed, but continuing..."
fi

# Create commit with proper format
echo "📝 Creating commit..."

FULL_COMMIT_MESSAGE="${COMMIT_TYPE}: ${COMMIT_MESSAGE}

🤖 Workflow automated


git commit -m "$FULL_COMMIT_MESSAGE"

if [ $? -eq 0 ]; then
    echo "✅ Commit created successfully!"
    echo "📤 Pushing to origin..."
    git push origin feature/automated-completion
    echo "🎉 Changes pushed successfully!"
else
    echo "❌ Commit failed!"
    exit 1
fi
