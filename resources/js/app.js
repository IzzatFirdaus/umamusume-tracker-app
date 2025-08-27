// Import Bootstrap JS (use CommonJS require to avoid Babel 'sourceType: module' parse error)
const bootstrap = require('bootstrap/dist/js/bootstrap.bundle');

// Main JS entry for Uma Musume Race Planner (MYDS compliant)
console.log('Uma Musume Planner JS loaded');

// MYDS Accessibility: Focus ring for keyboard navigation
document.addEventListener('keydown', function(e) {
	if (e.key === 'Tab') {
		document.body.classList.add('user-is-tabbing');
	}
});
document.addEventListener('mousedown', function() {
	document.body.classList.remove('user-is-tabbing');
});

// MYDS: Skip to content link
const skipLink = document.createElement('a');
skipLink.href = '#main-content';
skipLink.className = 'skip-link';
skipLink.textContent = 'Skip to main content';
skipLink.setAttribute('aria-label', 'Skip to main content');
document.body.prepend(skipLink);

// Initialize Bootstrap components
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize all popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
});
