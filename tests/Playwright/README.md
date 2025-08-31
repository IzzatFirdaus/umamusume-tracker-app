# Playwright E2E Testing

This directory contains end-to-end tests for the Laravel application using Playwright.

## Setup

Playwright is already configured in the project. The configuration can be found in `playwright.config.ts` at the root of the project.

## Running Tests

### Basic Commands

```bash
# Run all tests
npm run test:e2e

# Run tests with UI mode (interactive)
npm run test:e2e:ui

# Run tests in headed mode (see browser)
npm run test:e2e:headed

# Run tests in debug mode
npm run test:e2e:debug

# Show test report
npm run test:e2e:report
```

### Running Specific Tests

```bash
# Run a specific test file
npx playwright test example.spec.ts

# Run tests matching a pattern
npx playwright test --grep "home page"

# Run tests in a specific browser
npx playwright test --project=chromium
```

## Test Structure

- `example.spec.ts` - Basic application tests
- `laravel.spec.ts` - Laravel-specific testing patterns and examples

## Writing Tests

### Basic Test Structure

```typescript
import { test, expect } from '@playwright/test';

test.describe('Feature Name', () => {
  test('should do something', async ({ page }) => {
    await page.goto('/');
    await expect(page.locator('h1')).toContainText('Welcome');
  });
});
```

### Common Patterns for Laravel

#### Testing Forms

```typescript
test('should submit a form', async ({ page }) => {
  await page.goto('/contact');
  await page.fill('input[name="name"]', 'John Doe');
  await page.fill('input[name="email"]', 'john@example.com');
  await page.click('button[type="submit"]');
  
  await expect(page.locator('.alert-success')).toBeVisible();
});
```

#### Testing Authentication

```typescript
test('should login user', async ({ page }) => {
  await page.goto('/login');
  await page.fill('input[name="email"]', 'user@example.com');
  await page.fill('input[name="password"]', 'password');
  await page.click('button[type="submit"]');
  
  await expect(page).toHaveURL(/dashboard/);
});
```

#### Testing API Responses

```typescript
test('should handle API requests', async ({ page }) => {
  const response = await page.request.get('/api/data');
  expect(response.status()).toBe(200);
  
  const data = await response.json();
  expect(data).toBeDefined();
});
```

## Configuration

The Playwright configuration (`playwright.config.ts`) includes:

- **Base URL**: `http://localhost:8000` (Laravel's default development server)
- **Web Server**: Automatically starts `php artisan serve` before tests
- **Browsers**: Chromium, Firefox, and WebKit
- **Screenshots**: Taken on test failures
- **Videos**: Recorded on test failures
- **Traces**: Collected on first retry

## Best Practices

1. **Use descriptive test names** that explain what the test is checking
2. **Group related tests** using `test.describe()`
3. **Use page objects** for complex pages with many interactions
4. **Test user workflows** rather than individual components
5. **Use data attributes** for selectors when possible
6. **Handle async operations** properly with `await`
7. **Clean up test data** in `afterEach` or `afterAll` hooks

## Debugging

### Using Debug Mode

```bash
npm run test:e2e:debug
```

This opens Playwright Inspector where you can:
- Step through tests
- Inspect elements
- View network requests
- Debug test failures

### Using UI Mode

```bash
npm run test:e2e:ui
```

This provides an interactive interface to:
- Run tests individually
- View test results
- Debug failures
- Watch tests run in real-time

### Viewing Reports

```bash
npm run test:e2e:report
```

This opens the HTML report showing:
- Test results
- Screenshots
- Videos
- Traces
- Performance metrics

## CI/CD Integration

For continuous integration, the configuration automatically:
- Runs tests in headless mode
- Retries failed tests twice
- Uses a single worker to avoid conflicts
- Fails the build if `test.only` is left in code

## Troubleshooting

### Common Issues

1. **Port conflicts**: Ensure port 8000 is available for the Laravel server
2. **Database state**: Use database transactions or factories for test data
3. **Authentication**: Set up test users or use factories
4. **File uploads**: Use test files in the `tests/fixtures` directory

### Getting Help

- [Playwright Documentation](https://playwright.dev/docs/intro)
- [Laravel Testing Documentation](https://laravel.com/docs/testing)
- [Playwright API Reference](https://playwright.dev/docs/api/class-playwright)
