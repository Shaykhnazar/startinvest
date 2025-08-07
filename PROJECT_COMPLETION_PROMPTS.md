# Startinvest.uz Project Completion Prompts

Based on the comprehensive analysis of the current project state, here are structured prompts to complete the Startinvest.uz platform using Claude Code.

## 🚨 CRITICAL PRIORITY: Investment System Core

### Prompt 1: Complete Investment Model and Core Functionality

```
I'm working on a Laravel-based startup investment platform called Startinvest.uz. The Investment model at app/Models/Investment.php is currently completely empty, which breaks the core functionality of the platform.

Please:

1. **Complete the Investment model** with:
   - Proper fillable fields (startup_id, investor_id, investment_stage_id, amount, equity_percentage, status, invested_at, expected_return, actual_return, exit_date)
   - Relationships to Startup, Investor, User, and InvestmentStage models
   - Scopes for filtering by status, amount ranges, dates
   - Methods for calculating ROI, profit/loss, investment duration
   - Proper casting for dates and decimal amounts

2. **Create InvestmentController** with complete CRUD operations:
   - Index with filtering and pagination
   - Show with detailed investment information
   - Store with validation and business logic
   - Update for investment modifications
   - Destroy with proper cleanup
   - API endpoints for frontend consumption

3. **Create investment-related database migrations** for:
   - investment_rounds table (for multiple funding rounds)
   - investment_documents table (for contracts, agreements)
   - roi_tracking table (for performance monitoring)

4. **Create InvestmentService** for business logic:
   - Investment processing and validation
   - ROI calculations
   - Investment status management
   - Notification triggers for investment events

The platform connects entrepreneurs with investors, so this investment tracking system is absolutely critical. Please ensure all relationships are properly defined and the code follows Laravel best practices.
```

### Prompt 2: Build Investment Frontend Interface

```
I need to create the frontend interface for the investment system in my Startinvest.uz platform (Laravel + Vue 3 + Inertia.js + Element Plus).

Currently missing:

1. **Investment Dashboard Page** (resources/js/Pages/Investment/Dashboard.vue):
   - Overview of all investments with charts
   - Investment performance metrics
   - Portfolio value tracking
   - Recent investment activity

2. **Investment Creation Form** (resources/js/Pages/Investment/Create.vue):
   - Multi-step investment form
   - Startup selection with search
   - Investment amount and equity calculation
   - Terms and conditions
   - Document upload capability

3. **Investment Detail Page** (resources/js/Pages/Investment/Show.vue):
   - Investment information display
   - Performance tracking charts
   - Document management
   - Communication with startup
   - ROI calculations and projections

4. **Investment List Page** (resources/js/Pages/Investment/Index.vue):
   - Filterable investment list
   - Sorting by various criteria
   - Status indicators
   - Bulk operations

5. **Investment Components**:
   - InvestmentCard.vue (for investment summaries)
   - InvestmentChart.vue (for performance visualization)
   - InvestmentForm.vue (reusable investment form)
   - ROICalculator.vue (investment calculator)

6. **Investment Composables** (resources/js/Composables/):
   - useInvestment.js for investment operations
   - usePortfolio.js for portfolio management
   - useROI.js for ROI calculations

Please use Element Plus components, follow Vue 3 Composition API patterns, integrate with existing Pinia stores, and ensure proper TypeScript typing. The investment system should integrate seamlessly with the existing startup and user systems.
```

## 🔥 HIGH PRIORITY: Investor Profile System

### Prompt 3: Complete Investor Profile Management

```
The Startinvest.uz platform has basic investor functionality but lacks comprehensive investor profile management. The Investor model at app/Models/Investor.php is minimal with only user_id and contacts fields.

Please:

1. **Enhance the Investor model** with:
   - Additional fields: company_name, investment_focus, portfolio_size, risk_profile, minimum_investment, maximum_investment, preferred_industries, investment_stage_preference
   - Proper relationships to investments, industries, investment stages
   - Methods for portfolio analytics and investment history
   - Scopes for filtering by investment preferences

2. **Update database migrations** to add missing investor fields:
   - Investment preferences and criteria
   - Portfolio tracking fields
   - Risk assessment fields
   - Investment history metadata

3. **Complete InvestorController** with full CRUD operations:
   - Public investor directory (index)
   - Investor profile display (show)
   - Profile creation and editing (for authenticated users)
   - Investment history and portfolio management
   - Search and filtering functionality

4. **Create InvestorService** for:
   - Profile management logic
   - Investment matching algorithms
   - Portfolio analytics calculations
   - Investment recommendation engine

5. **Create investor profile pages**:
   - Public investor directory
   - Individual investor profiles
   - Investor dashboard with portfolio overview
   - Investment preferences management

The goal is to create a comprehensive investor management system that allows investors to create detailed profiles, track their investments, and connect with startups that match their investment criteria.
```

### Prompt 4: Build Investor Frontend Dashboard

```
I need to create a comprehensive investor dashboard and profile management system for Startinvest.uz (Vue 3 + Element Plus + Inertia.js).

Please create:

1. **Investor Dashboard** (resources/js/Pages/Investor/Dashboard.vue):
   - Portfolio overview with charts and metrics
   - Investment performance tracking
   - Investment opportunities feed
   - Recent activity timeline
   - Portfolio diversification analysis

2. **Investor Profile Pages**:
   - InvestorProfile.vue (public profile display)
   - InvestorEdit.vue (profile editing form)
   - InvestorDirectory.vue (public investor directory)

3. **Portfolio Management** (resources/js/Pages/Portfolio/):
   - Portfolio/Index.vue (portfolio overview)
   - Portfolio/Performance.vue (detailed analytics)
   - Portfolio/Holdings.vue (current investments)
   - Portfolio/History.vue (investment history)

4. **Investment Opportunity Pages**:
   - Opportunities/Index.vue (browse opportunities)
   - Opportunities/Show.vue (detailed opportunity view)
   - Opportunities/Filter.vue (advanced filtering)

5. **Investor Components**:
   - InvestorCard.vue (investor profile cards)
   - PortfolioChart.vue (portfolio visualization)
   - InvestmentOpportunity.vue (opportunity cards)
   - InvestorProfileForm.vue (profile editing form)
   - PortfolioSummary.vue (portfolio statistics)

6. **Composables**:
   - useInvestorProfile.js
   - usePortfolioAnalytics.js
   - useInvestmentOpportunities.js

Please ensure the investor dashboard provides comprehensive portfolio management, investment tracking, and opportunity discovery features. Use modern charts library for data visualization and maintain consistency with the existing design system.
```

## 💰 HIGH PRIORITY: Financial Tracking System

### Prompt 5: Implement Startup Financial Tracking

```
The Startinvest.uz platform needs comprehensive financial tracking for startups. Currently, the Startup model lacks financial data tracking capabilities.

Please:

1. **Enhance Startup model** with financial tracking:
   - Add fields for revenue, expenses, profit_loss, burn_rate, runway_months, valuation, funding_goal
   - Create relationships to funding rounds and financial records
   - Add methods for financial calculations (burn rate, runway, growth rate)
   - Implement scopes for financial filtering

2. **Create new models**:
   - FundingRound.php (for tracking multiple funding rounds)
   - FinancialRecord.php (for monthly/quarterly financial data)
   - Valuation.php (for startup valuation history)

3. **Create financial tracking migrations**:
   - funding_rounds table
   - financial_records table
   - valuations table
   - Update startups table with financial fields

4. **Create FinancialController**:
   - CRUD operations for financial records
   - Funding round management
   - Financial analytics endpoints
   - Financial reporting functionality

5. **Create FinancialService** for:
   - Financial calculations (burn rate, runway, growth metrics)
   - Valuation tracking and updates
   - Financial health assessment
   - Investment readiness scoring

6. **Add financial validation rules** in Form Requests:
   - Financial data validation
   - Funding round validation
   - Investment amount validation

This financial tracking system is crucial for investors to make informed decisions and for startups to track their progress and fundraising needs.
```

### Prompt 6: Build Financial Management Frontend

```
I need to create financial management interfaces for the Startinvest.uz platform. This should include startup financial tracking, funding round management, and financial analytics.

Please create:

1. **Startup Financial Dashboard** (resources/js/Pages/Startup/Financial/):
   - Financial/Dashboard.vue (financial overview with charts)
   - Financial/Records.vue (financial records management)
   - Financial/FundingRounds.vue (funding round tracking)
   - Financial/Projections.vue (financial projections and forecasting)

2. **Financial Management Components**:
   - FinancialMetrics.vue (key financial indicators)
   - BurnRateChart.vue (burn rate visualization)
   - RevenueChart.vue (revenue tracking)
   - FundingRoundCard.vue (funding round display)
   - FinancialForm.vue (financial data entry)
   - ValuationTracker.vue (valuation history)

3. **Financial Analytics Pages**:
   - Analytics/Financial.vue (comprehensive financial analytics)
   - Analytics/Performance.vue (performance metrics)
   - Analytics/Benchmarks.vue (industry benchmarking)

4. **Financial Composables**:
   - useFinancialMetrics.js (financial calculations)
   - useFundingRounds.js (funding round management)
   - useFinancialCharts.js (chart data processing)
   - useValuation.js (valuation tracking)

5. **Financial Forms and Modals**:
   - FinancialRecordModal.vue (add/edit financial records)
   - FundingRoundModal.vue (funding round creation)
   - ValuationModal.vue (valuation updates)

Please include comprehensive financial charts using Chart.js or similar, proper form validation, and ensure all financial calculations are accurate. The interface should be intuitive for startups to track their financial health and for investors to assess investment opportunities.
```

## 📊 MEDIUM PRIORITY: Analytics and Reporting

### Prompt 7: Build Analytics and Reporting System

```
Startinvest.uz needs comprehensive analytics and reporting for platform administrators, investors, and startup founders.

Please create:

1. **Analytics Models and Database**:
   - PlatformMetrics model for platform-wide statistics
   - UserAnalytics model for user behavior tracking
   - InvestmentAnalytics model for investment performance
   - Create analytics tables with proper indexing

2. **AnalyticsController** with endpoints for:
   - Platform overview statistics
   - Investment performance reports
   - User engagement metrics
   - Startup success rates
   - Revenue and growth tracking

3. **AnalyticsService** for:
   - Data aggregation and calculation
   - Trend analysis
   - Comparative analytics
   - Performance benchmarking
   - Report generation

4. **Admin Analytics Dashboard**:
   - Platform health metrics
   - User acquisition and retention
   - Investment flow analysis
   - Revenue tracking
   - System performance metrics

5. **Investor Analytics**:
   - Portfolio performance analysis
   - Investment ROI tracking
   - Risk assessment reports
   - Market opportunity analysis

6. **Startup Analytics**:
   - Growth metrics dashboard
   - Financial performance tracking
   - Investor interest analytics
   - Funding progress reports

Please implement proper data visualization with charts, export functionality for reports, and ensure analytics data is updated in real-time or near real-time.
```

### Prompt 8: Create Advanced Search and Filtering

```
The Startinvest.uz platform needs advanced search and filtering capabilities for startups, investors, and investment opportunities.

Please implement:

1. **Advanced Search Backend**:
   - SearchController with advanced filtering logic
   - SearchService for complex search algorithms
   - Elasticsearch integration (optional but recommended)
   - Search indexing for better performance

2. **Search Models and Scopes**:
   - Add search scopes to Startup, Investor, and other models
   - Implement full-text search capabilities
   - Add filtering by multiple criteria simultaneously

3. **Frontend Search Components**:
   - AdvancedSearchModal.vue (comprehensive search interface)
   - SearchFilters.vue (filtering sidebar)
   - SearchResults.vue (search results display)
   - SavedSearches.vue (save and manage searches)

4. **Search Features**:
   - Multi-criteria filtering (industry, location, funding stage, etc.)
   - Saved searches and alerts
   - Auto-suggestions and typeahead
   - Search result ranking and relevance
   - Export search results

5. **Search Composables**:
   - useAdvancedSearch.js
   - useSearchFilters.js
   - useSavedSearches.js

Ensure search is fast, accurate, and provides relevant results. Include proper indexing for database performance and consider implementing search analytics to improve search algorithms over time.
```

## 🔐 MEDIUM PRIORITY: Enhanced Security and Permissions

### Prompt 9: Implement Role-Based Access Control

```
The Startinvest.uz platform needs comprehensive role-based access control and advanced security features.

Please implement:

1. **Role and Permission System**:
   - Create Role and Permission models (using Spatie Laravel Permission or similar)
   - Define roles: Admin, Investor, Entrepreneur, Moderator, Contributor
   - Create permission-based middleware
   - Implement resource-based permissions

2. **Enhanced Security Middleware**:
   - Two-factor authentication
   - IP-based access control
   - Rate limiting for sensitive operations
   - API key management for external integrations

3. **Data Privacy and Protection**:
   - GDPR compliance features
   - Data export and deletion tools
   - Privacy settings management
   - Audit logging for sensitive operations

4. **Investment-Specific Security**:
   - KYC (Know Your Customer) verification
   - Accredited investor verification
   - Investment limits and controls
   - Transaction security and logging

5. **Admin Security Tools**:
   - User activity monitoring
   - Security alert system
   - Suspicious activity detection
   - Account verification management

Please ensure all security implementations follow best practices, include proper logging, and maintain user experience while enhancing security.
```

## 💳 MEDIUM PRIORITY: Payment Processing Integration

### Prompt 10: Integrate Payment Processing System

```
Startinvest.uz needs a secure payment processing system for handling investments and platform fees.

Please implement:

1. **Payment Integration**:
   - Integrate with Stripe, PayPal, or similar payment processor
   - Create Payment model for transaction tracking
   - Implement secure payment processing workflows
   - Add support for multiple currencies

2. **Payment Components**:
   - PaymentForm.vue (secure payment input)
   - PaymentHistory.vue (transaction history)
   - PaymentMethods.vue (saved payment methods)
   - InvestmentPayment.vue (investment-specific payments)

3. **Payment Security**:
   - PCI DSS compliance measures
   - Secure token handling
   - Payment verification and confirmation
   - Fraud detection integration

4. **Financial Reconciliation**:
   - Payment reconciliation system
   - Automated accounting entries
   - Financial reporting integration
   - Tax calculation and reporting

5. **Payment Notifications**:
   - Payment confirmation emails
   - Failed payment notifications
   - Payment reminder system
   - Real-time payment status updates

Ensure all payment processing is secure, compliant with financial regulations, and provides clear audit trails for all transactions.
```

## 📱 LOW PRIORITY: Enhanced Features

### Prompt 11: Improve Social Media Integration

```
Enhance the existing social media integration in Startinvest.uz with advanced features and analytics.

Current state: Basic social media publishing exists for Instagram, LinkedIn, and Telegram.

Please enhance with:

1. **Social Media Analytics**:
   - Track engagement metrics
   - Monitor reach and impressions
   - Analyze audience demographics
   - Create social media performance reports

2. **Advanced Publishing Features**:
   - Scheduled posting
   - Content templates
   - Multi-platform campaigns
   - A/B testing for posts

3. **Social Media Monitoring**:
   - Brand mention tracking
   - Competitor analysis
   - Industry trend monitoring
   - Sentiment analysis

4. **Enhanced Integration**:
   - Additional platform support (Twitter, Facebook, TikTok)
   - Social media login improvements
   - Cross-platform content syndication
   - Social proof integration

This will help startups better leverage social media for marketing and investor engagement.
```

### Prompt 12: Implement Comprehensive Testing Suite

```
Create a comprehensive testing suite for the Startinvest.uz platform to ensure reliability and maintainability.

Currently missing: Most functionality lacks proper test coverage.

Please create:

1. **Unit Tests**:
   - Model tests with relationships and methods
   - Service class tests for business logic
   - Utility function tests
   - Validation rule tests

2. **Feature Tests**:
   - Authentication flow tests
   - Investment process tests
   - Startup management tests
   - API endpoint tests

3. **Integration Tests**:
   - Payment processing tests
   - Social media integration tests
   - Email notification tests
   - Database transaction tests

4. **Browser Tests** (using Laravel Dusk):
   - User registration and login flows
   - Investment creation workflow
   - Startup profile management
   - Admin panel functionality

5. **API Tests**:
   - All API endpoints
   - Authentication and authorization
   - Error handling and validation
   - Rate limiting tests

Please ensure tests cover critical user flows, edge cases, and error conditions. Implement proper test data seeding and cleanup, and ensure tests can run in CI/CD environments.
```

## 🚀 DEPLOYMENT AND OPTIMIZATION

### Prompt 13: Production Deployment Setup

```
Prepare Startinvest.uz for production deployment with proper optimization, monitoring, and deployment configuration.

Please set up:

1. **Production Configuration**:
   - Optimize Laravel configuration for production
   - Set up proper caching strategies
   - Configure queue workers for background jobs
   - Implement database optimization (indexes, queries)

2. **Docker Configuration**:
   - Create production-ready Dockerfiles
   - Set up docker-compose for multi-service deployment
   - Configure environment variables management
   - Set up container orchestration

3. **CI/CD Pipeline**:
   - GitHub Actions or similar CI/CD setup
   - Automated testing pipeline
   - Database migration automation
   - Asset compilation and optimization

4. **Monitoring and Logging**:
   - Application performance monitoring
   - Error tracking and reporting
   - Security monitoring
   - User analytics and tracking

5. **Backup and Recovery**:
   - Automated database backups
   - File storage backups
   - Disaster recovery procedures
   - Data retention policies

Ensure the production setup is scalable, secure, and maintainable for long-term operation.
```

---

## 📋 Execution Strategy

### Phase 1: Critical Foundation (Weeks 1-2)
Execute Prompts 1-2 (Investment System Core)

### Phase 2: Core Business Logic (Weeks 3-4)
Execute Prompts 3-4 (Investor Profile System)

### Phase 3: Financial Infrastructure (Weeks 5-6)
Execute Prompts 5-6 (Financial Tracking System)

### Phase 4: Analytics and Enhancement (Weeks 7-8)
Execute Prompts 7-8 (Analytics and Advanced Search)

### Phase 5: Security and Payments (Weeks 9-10)
Execute Prompts 9-10 (Security and Payment Processing)

### Phase 6: Polish and Deploy (Weeks 11-12)
Execute Prompts 11-13 (Enhanced Features and Deployment)

---

## 💡 Usage Instructions

1. **Start with Critical Priority prompts** - The investment system is completely broken and must be fixed first
2. **Execute prompts in order** - Later prompts may depend on earlier implementations
3. **Test thoroughly** after each major feature implementation
4. **Customize prompts** based on your specific requirements and preferences
5. **Add specific business rules** that may be unique to your platform

Each prompt is designed to be comprehensive and self-contained, providing Claude Code with enough context to implement robust, production-ready features that integrate seamlessly with the existing codebase.

---

## 🤖 AUTOMATED EXECUTION WITH CLAUDE CODE

### Quick Start Guide

1. **Setup Automation** (Run once):
   ```bash
   chmod +x development-scripts/*.sh
   ./development-scripts/setup-automation.sh
   ```

2. **Copy-Paste Ready Prompts**: Each phase in `EXECUTION_ROADMAP.md` contains ready-to-use prompts with automated commit instructions.

3. **Execute Systematically**: Follow the roadmap phases in order, each prompt will automatically:
   - Implement the required functionality
   - Run tests to verify implementation
   - Create descriptive git commits
   - Push changes to the feature branch

### Automated Commit Format

All prompts include these automated commit instructions:

```bash
AUTOMATED COMMIT INSTRUCTIONS:
After completing implementation:
1. Run `git status` and `php artisan test`
2. Add files: `git add .`
3. Create commit with formatted message
4. Push: `git push origin feature/automated-completion`
```

### Execution Order

Follow this strict order for optimal results:

**Phase 1**: Investment System Core (CRITICAL - Must fix first!)
**Phase 2**: Investor Profile System  
**Phase 3**: Financial Tracking System
**Phase 4**: Analytics and Search
**Phase 5**: Security and Payments
**Phase 6**: Testing and Deployment

### Complete Automation

The `EXECUTION_ROADMAP.md` file contains **12 copy-paste ready prompts** that will systematically complete the entire Startinvest.uz platform with automated git commits after each step.

🎯 **Result**: A fully functional investment platform with comprehensive features, proper testing, and production-ready deployment configuration.