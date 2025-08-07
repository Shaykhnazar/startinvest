# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**Startinvest.uz** is a Laravel-based startup investment platform that connects entrepreneurs, developers, and investors. The platform allows users to share ideas, form teams, develop startups, and attract investment funding.

### Tech Stack
- **Backend**: Laravel 11 with PHP 8.2+
- **Frontend**: Vue 3 + Inertia.js with Vite
- **UI Framework**: Element Plus + Tailwind CSS + Preline UI
- **Database**: MySQL/PostgreSQL (Laravel migrations)
- **Admin Panel**: Laravel Orchid
- **Real-time**: Laravel Reverb + WebSockets
- **Testing**: Pest PHP
- **Localization**: Multi-language support (EN, RU, UZ)

## Development Commands

### Frontend Development
```bash
# Install dependencies
npm install

# Development server with hot reload
npm run dev

# Production build
npm run build
```

### Backend Development  
```bash
# Install PHP dependencies
composer install

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Start Laravel development server
php artisan serve

# Run Reverb WebSocket server
php artisan reverb:start
```

### Testing
```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter InstaProfileTrackBotServiceTest

# Run tests with coverage
php artisan test --coverage
```

## Architecture Overview

### Core Domain Models
- **User**: Platform users with roles (entrepreneurs, investors, contributors)
- **Startup**: Main startup projects with MVP status and investment tracking
- **Idea**: Initial project concepts that can evolve into startups
- **Investment**: Investment records linking investors to startups
- **BlogPost**: Content management for platform blog
- **ChatMessage**: Real-time messaging between users

### Key Service Classes
- **StartupService**: Core startup management logic
- **UserService**: User management and profile operations  
- **BlogPostService**: Content management
- **TelegramService**: Bot integration for notifications
- **Publisher Services**: Social media publishing (Instagram, LinkedIn, Telegram)
- **Translation Services**: Google Translate integration

### Frontend Architecture
- **Vue 3 Composition API** with TypeScript support
- **Inertia.js** for SPA-like experience without API endpoints
- **Pinia** for state management with persistence
- **Component Structure**:
  - `Pages/` - Route-based page components
  - `Components/` - Reusable UI components
  - `Layouts/` - Application layout wrappers
  - `Composables/` - Shared composition logic
  - `Stores/` - Pinia state management

### Authentication & Authorization
- Laravel Breeze with Socialite (Google, LinkedIn)
- Role-based permissions via Laravel Orchid
- Middleware for startup ownership verification
- Email verification required for dashboard access

### Key Features
- **Multilingual Content**: Spatie Translatable for startup/idea content
- **File Management**: Orchid Attachments for image/document uploads
- **Real-time Chat**: WebSocket-based messaging system
- **Social Media Integration**: Auto-publishing to Instagram, LinkedIn, Telegram
- **Admin Dashboard**: Orchid-based content management
- **Blog System**: Full CMS with categories and comments
- **Investment Tracking**: Status management and funding progress

### Database Design
- Soft deletes enabled for startups
- Translatable fields for multi-language content
- Pivot tables for many-to-many relationships (startup contributors, industries)
- Comprehensive migration history with proper indexing

### File Structure Notes
- **Models**: Located in `app/Models/` with proper relationships and scopes
- **Controllers**: Organized by feature areas (`Cabinet/`, `Auth/`, `Api/`)
- **Services**: Business logic abstraction in `app/Services/`
- **Jobs & Notifications**: Background processing and user communications
- **Resources**: API transformation layer for frontend consumption
- **Middleware**: Custom authorization and locale handling

## Development Guidelines

### Frontend Development
- Use Vue 3 Composition API with `<script setup>`
- Follow Element Plus component patterns for consistency
- Utilize Tailwind CSS for styling with Preline component library
- Implement proper TypeScript typing for composables
- Use Inertia.js form helpers for backend communication

### Backend Development
- Follow Laravel conventions for naming and structure
- Use Form Request classes for validation
- Implement proper relationship methods in models
- Use Laravel's built-in authorization features
- Write comprehensive tests for services and controllers

### Social Media Integration
- Publisher pattern implemented for extensible social media posting
- Instagram, LinkedIn, and Telegram publishers available
- Configuration managed through Laravel config files
- Job queues handle async social media publishing

### Testing Strategy
- Pest PHP for expressive test syntax
- Feature tests for HTTP endpoints
- Unit tests for service classes
- Database refresh between tests via RefreshDatabase trait