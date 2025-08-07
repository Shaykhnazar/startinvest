# Automated Development Workflow for Startinvest.uz

This document outlines how to use Claude Code to systematically complete the Startinvest.uz project with automatic git commits after each development step.

## 🔄 Automated Workflow Strategy

### Phase-Based Development with Auto-Commits

Each development phase will:
1. **Execute specific prompts** from PROJECT_COMPLETION_PROMPTS.md
2. **Automatically commit changes** with descriptive messages
3. **Run tests** to verify functionality
4. **Document progress** and create tagged releases

## 🚀 Getting Started

### 1. Initial Setup Commands

Run these commands to prepare your development environment:

```bash
# Ensure clean working directory
git status

# Create development branch for automated changes
git checkout -b feature/automated-completion
git push -u origin feature/automated-completion

# Set up git configuration for consistent commits
git config user.name "Automated Development"
git config user.email "development@startinvest.uz"
```

### 2. Pre-Development Checklist

Before starting automated development:

- [ ] Backup current code: `git tag backup-$(date +%Y%m%d)`
- [ ] Ensure database is backed up
- [ ] Verify development environment is working
- [ ] Run existing tests: `php artisan test`
- [ ] Check Laravel logs are clear

## 📋 Automated Execution Plan

### Phase 1: Critical Investment System (Weeks 1-2)

#### Step 1.1: Complete Investment Model
**Prompt**: Use Prompt 1 from PROJECT_COMPLETION_PROMPTS.md

**Auto-commit Instructions for Claude Code**:
```
After implementing the Investment model, controller, and related components, please create a git commit with the following approach:

1. Check git status to see all changed files
2. Add all relevant files to staging
3. Create commit with this message format:

"feat: implement core investment system

- Complete Investment model with relationships and business logic
- Add InvestmentController with full CRUD operations  
- Create investment-related database migrations
- Implement InvestmentService for business logic
- Add proper validation and error handling
"

4. Run tests to ensure nothing is broken
5. If tests pass, proceed to next step
6. If tests fail, fix issues and amend the commit
```

#### Step 1.2: Build Investment Frontend
**Prompt**: Use Prompt 2 from PROJECT_COMPLETION_PROMPTS.md

**Auto-commit Instructions**:
```
After implementing the investment frontend components:

1. Add all new Vue components and composables
2. Commit with message:

"feat: add investment frontend interface

- Create Investment Dashboard with charts and metrics
- Add Investment Creation Form with validation
- Implement Investment Detail Page with performance tracking
- Build Investment List Page with filtering
- Add investment-related Vue components and composables
- Integrate with existing Pinia stores and Element Plus
"

3. Test frontend functionality manually
4. Run `npm run build` to ensure no build errors
```

### Phase 2: Investor Profile System (Weeks 3-4)

#### Step 2.1: Complete Investor Profile Management
**Prompt**: Use Prompt 3 from PROJECT_COMPLETION_PROMPTS.md

**Auto-commit Instructions**:
```
After enhancing the investor system:

Commit message:
"feat: enhance investor profile management system

- Expand Investor model with comprehensive fields and relationships
- Update database migrations for investor preferences and portfolio tracking
- Complete InvestorController with full CRUD operations
- Implement InvestorService for profile management and analytics
- Add investment matching algorithms and recommendation engine

"
```

#### Step 2.2: Build Investor Dashboard
**Prompt**: Use Prompt 4 from PROJECT_COMPLETION_PROMPTS.md

**Auto-commit Instructions**:
```
After creating investor frontend components:

Commit message:
"feat: build comprehensive investor dashboard and portfolio management

- Create Investor Dashboard with portfolio analytics and charts
- Add Investor Profile pages and directory
- Implement Portfolio Management with performance tracking
- Build Investment Opportunity discovery interface
- Add investor-specific Vue components and composables
- Integrate portfolio visualization with charts library

"
```

### Phase 3: Financial Tracking System (Weeks 5-6)

#### Step 3.1: Implement Startup Financial Tracking
**Prompt**: Use Prompt 5 from PROJECT_COMPLETION_PROMPTS.md

**Auto-commit Instructions**:
```
After implementing financial tracking:

Commit message:
"feat: implement comprehensive startup financial tracking

- Enhance Startup model with financial fields and calculations
- Create FundingRound, FinancialRecord, and Valuation models
- Add financial tracking database migrations
- Implement FinancialController with analytics endpoints
- Build FinancialService for calculations and health assessment

"
```

#### Step 3.2: Build Financial Management Frontend
**Prompt**: Use Prompt 6 from PROJECT_COMPLETION_PROMPTS.md

**Auto-commit Instructions**:
```
After creating financial management interface:

Commit message:
"feat: build startup financial management interface

- Create Financial Dashboard with comprehensive charts and metrics
- Add Financial Records and Funding Round management pages
- Implement financial analytics with performance visualization
- Build financial forms and validation components
- Add financial composables and chart integrations

"
```

## 🤖 Automated Commit Instructions Template

For each development step, include these instructions in your prompts to Claude Code:

```
IMPORTANT: After completing this implementation, please automatically commit the changes using the following process:

1. **Check Status**: Run `git status` to see all modified files
2. **Run Tests**: Execute `php artisan test` to ensure no regressions
3. **Add Files**: Stage all relevant files with `git add .`
4. **Commit Changes**: Create commit with descriptive message following this format:

```bash
git commit -m "$(cat <<'EOF'
[feat/fix/refactor]: [brief description]

[Detailed bullet points of changes made]
- [Change 1]
- [Change 2] 
- [Change 3]


EOF
)"
```

5. **Verify Commit**: Run `git log -1 --oneline` to confirm commit was created
6. **Push Changes**: Push to remote with `git push origin feature/automated-completion`

If any tests fail, please fix the issues and amend the commit before proceeding.
```

## 📊 Progress Tracking

### Automated Progress Documentation

After each major phase completion, Claude Code should:

1. **Create Phase Summary**: Document what was implemented
2. **Update Progress**: Mark completed prompts in PROJECT_COMPLETION_PROMPTS.md
3. **Create Git Tags**: Tag major milestones
4. **Generate Changelog**: Update project changelog

### Phase Completion Checklist Template

```bash
# After completing each phase
git tag -a "phase-1-investment-core" -m "Phase 1: Investment System Core completed"
git tag -a "phase-2-investor-profiles" -m "Phase 2: Investor Profile System completed"
git tag -a "phase-3-financial-tracking" -m "Phase 3: Financial Tracking System completed"
# ... etc

# Push tags
git push origin --tags
```

## 🔍 Quality Assurance Automation

### Automated Testing After Each Step

Include these commands in commit automation:

```bash
# Backend tests
php artisan test --coverage

# Frontend build test
npm run build

# Code quality checks (if configured)
./vendor/bin/pint --test
./vendor/bin/phpstan analyse

# Database migration test
php artisan migrate:fresh --seed --env=testing
```

### Rollback Strategy

If any step fails:

```bash
# Rollback to previous working state
git reset --hard HEAD~1

# Or rollback to specific tag
git reset --hard phase-1-investment-core
```

## 🚀 Deployment Automation

### Staging Environment Updates

After each phase completion:

```bash
# Deploy to staging
git push staging feature/automated-completion

# Run staging tests
# (Configure staging environment to run automated tests)
```

### Production Deployment Preparation

When all phases are complete:

```bash
# Create release branch
git checkout -b release/v1.0.0

# Merge all changes
git merge feature/automated-completion

# Create final release tag
git tag -a "v1.0.0" -m "Startinvest.uz v1.0.0 - Full platform implementation"

# Push everything
git push origin release/v1.0.0
git push origin --tags
```

## 💡 Usage Instructions

### For Each Development Session:

1. **Start with Phase Planning**:
   ```bash
   git checkout feature/automated-completion
   git pull origin feature/automated-completion
   ```

2. **Execute Prompts with Auto-Commit Instructions**:
   - Copy the relevant prompt from PROJECT_COMPLETION_PROMPTS.md
   - Add the automated commit instructions
   - Submit to Claude Code

3. **Monitor Progress**:
   - Check git log for commit history
   - Verify tests are passing
   - Review implemented functionality

4. **End of Session**:
   ```bash
   git push origin feature/automated-completion
   # Document progress in project notes
   ```

### Example Complete Prompt for Claude Code:

```
I'm implementing the investment system core for Startinvest.uz platform. Please execute the following:

[INSERT PROMPT 1 FROM PROJECT_COMPLETION_PROMPTS.md]

AUTOMATED COMMIT INSTRUCTIONS:
After completing this implementation, please automatically commit the changes using this process:

1. Run `git status` and `php artisan test` to verify everything is working
2. Add all files with `git add .`
3. Create commit with this exact message:

"feat: implement core investment system

- Complete Investment model with relationships and business logic
- Add InvestmentController with full CRUD operations  
- Create investment-related database migrations
- Implement InvestmentService for business logic
- Add proper validation and error handling

"

4. Push changes with `git push origin feature/automated-completion`
5. Confirm successful commit and proceed to report completion

Please execute this systematically and report any issues encountered during implementation or commit process.
```

This automated workflow ensures consistent progress tracking, proper version control, and systematic development completion of your Startinvest.uz platform! 🎯
