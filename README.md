# Startinvest.uz 🚀

**Startinvest.uz** is a comprehensive online platform connecting entrepreneurs, developers, and investors to foster startup development and investment opportunities.

## About the Platform

Startinvest.uz bridges the gap between innovative ideas and capital investment, providing a complete ecosystem for startup development from concept to funding.

### Key Features

- **💡 Idea Sharing**: Share and discover innovative startup concepts
- **👥 Team Building**: Connect with developers, designers, and project managers
- **💰 Investment Matching**: Connect startups with potential investors
- **🏗️ MVP Development**: Tools and resources for building minimum viable products
- **📊 Progress Tracking**: Monitor startup development and investment metrics
- **💬 Real-time Communication**: Built-in chat system for team collaboration
- **🌐 Multi-language Support**: Available in English, Russian, and Uzbek
- **📱 Social Integration**: Automated publishing to Instagram, LinkedIn, and Telegram

### User Roles

- **💭 Idea Owners**: Users who share concepts but need implementation partners
- **👨‍💻 Development Team**: Programmers, designers, project managers, and team leads
- **💼 Investors**: Companies, entrepreneurs, and business owners seeking investment opportunities
- **🏢 Startups**: Teams with MVP-ready projects seeking funding

## Tech Stack

### Backend
- **Framework**: Laravel 11 (PHP 8.2+)
- **Database**: MySQL/PostgreSQL
- **Admin Panel**: Laravel Orchid
- **Real-time**: Laravel Reverb + WebSockets
- **Authentication**: Laravel Breeze + Socialite (Google, LinkedIn)
- **Testing**: Pest PHP

### Frontend
- **Framework**: Vue 3 with Composition API
- **SPA**: Inertia.js (eliminates need for separate API)
- **State Management**: Pinia with persistence
- **UI Components**: Element Plus
- **Styling**: Tailwind CSS + Preline UI
- **Build Tool**: Vite
- **Internationalization**: Laravel Vue i18n


## Prerequisites

### System Requirements
- **PHP**: 8.2 or higher
- **Node.js**: v20.15.1 (recommended)
- **Composer**: Latest version
- **Database**: MySQL 8.0+ or PostgreSQL 13+

### Node.js Setup
```bash
nvm install v20.15.1
nvm use v20.15.1
nvm alias default v20.15.1
```

## Installation & Setup

### 1. Clone the Repository
```bash
git clone <repository-url>
cd startinvest
```

### 2. Backend Setup
```bash
# Install PHP dependencies
composer install

# Copy environment configuration
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure database credentials in .env file
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=startinvest
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# Run database migrations
php artisan migrate

# Seed database with initial data
php artisan db:seed

# Create storage link
php artisan storage:link
```

### 3. Frontend Setup
```bash
# Install Node.js dependencies
npm install

# Build assets for development
npm run dev

# Or build for production
npm run build
```

## Development Workflow

### Starting the Development Environment
```bash
# Terminal 1: Start Laravel development server
php artisan serve

# Terminal 2: Start Vite development server (for hot reload)
npm run dev

# Terminal 3: Start WebSocket server (for real-time features)
php artisan reverb:start
```

### Database Operations
```bash
# Create new migration
php artisan make:migration create_table_name

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Fresh migration with seeding
php artisan migrate:fresh --seed
```

### Laravel Orchid Admin Panel
Access the admin panel at `/admin` after running:
```bash
# Create admin user
php artisan orchid:admin admin admin@example.com password
```

## Testing

### Running Tests
```bash
# Run all tests
php artisan test

# Run tests with coverage
php artisan test --coverage

# Run specific test file
php artisan test --filter InstaProfileTrackBotServiceTest

# Run feature tests only
php artisan test tests/Feature

# Run unit tests only  
php artisan test tests/Unit
```

### Writing Tests
Tests are located in the `tests/` directory and use **Pest PHP** framework for expressive syntax.

## Key Artisan Commands

### Application Management
```bash
# Clear application cache
php artisan cache:clear

# Clear configuration cache
php artisan config:clear

# Clear view cache
php artisan view:clear

# Queue workers (for background jobs)
php artisan queue:work
```

### Social Media Integration
```bash
# Publish startup to social media
php artisan startup:publish {startup_id}

# Check Instagram profiles (scheduled command)
php artisan instagram:check-profiles
```

## Project Structure

### Backend Architecture
```
app/
├── Http/Controllers/     # Request handling
├── Models/              # Eloquent models
├── Services/            # Business logic
├── Jobs/                # Background jobs
├── Notifications/       # Email/SMS notifications
├── Orchid/             # Admin panel screens
└── Providers/          # Service providers
```

### Frontend Architecture
```
resources/js/
├── Pages/              # Route-based page components
├── Components/         # Reusable Vue components
├── Layouts/            # Application layouts
├── Composables/        # Composition API logic
├── Stores/             # Pinia state management
└── Services/           # API communication
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License.

