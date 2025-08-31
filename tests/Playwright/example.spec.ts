import { test, expect } from '@playwright/test';

test.describe('Basic Application Tests', () => {
  test('should load the home page', async ({ page }) => {
    await page.goto('/');
    
    // Check if the page loads successfully
    await expect(page).toHaveTitle(/UmaMusume/);
    
    // Verify the page is accessible
    await expect(page.locator('body')).toBeVisible();
  });

  test('should have proper page structure', async ({ page }) => {
    await page.goto('/');
    
    // Check for common elements that should be present
    await expect(page.locator('html')).toBeVisible();
    await expect(page.locator('body')).toBeVisible();
    // Note: head element is not visible in the viewport, so we check it exists instead
    await expect(page.locator('head')).toBeAttached();
  });

  test('should handle 404 pages gracefully', async ({ page }) => {
    // Navigate to a non-existent page
    const response = await page.goto('/non-existent-page');
    
    // Should return 404 status
    expect(response?.status()).toBe(404);
  });
});
