@extends('layouts.app')
@section('content')
<div class="container">
  <h1 class="mb-3">Uma Musume Race Planner Guide</h1>
  <div class="mb-4">
    <p class="lead">Welcome to the Uma Musume Race Planner! This guide will help you get started, explain all features, and offer tips for optimizing your trainees' careers.</p>
  </div>

  <h2 class="mt-4">Getting Started</h2>
  <ol>
    <li>Log in or open the app homepage.</li>
    <li>Review your existing plans or create a new plan using the <strong>New Plan</strong> button in the navbar.</li>
    <li>Fill in race details, trainee name, career stage, and other attributes.</li>
    <li>Save your plan to begin tracking progress.</li>
  </ol>

  <h2 class="mt-4">Main Features</h2>
  <ul>
    <li><strong>Plans Dashboard:</strong> View all your race plans, stats, and recent activity. Each plan card shows trainee name, race, class, career stage, and stat bars for Speed, Stamina, Power, Guts, and Wit.</li>
    <li><strong>Plan Details:</strong> Click <em>Details</em> on any plan to see full attributes, grades, skills, goals, predictions, and turn-by-turn breakdowns.</li>
    <li><strong>Quick Stats Panel:</strong> See total, active, and finished plans at a glance.</li>
    <li><strong>Recent Activity:</strong> Track your latest actions and updates.</li>
    <li><strong>Autosuggest:</strong> Use autosuggest fields to quickly find skills, races, or goals when creating or editing plans.</li>
    <li><strong>Export:</strong> Export any plan as JSON or text for sharing or backup.</li>
    <li><strong>Guide Page:</strong> Access this guide anytime from the navbar.</li>
  </ul>

  <h2 class="mt-4">How to Use</h2>
  <ol>
    <li><strong>Create a Plan:</strong> Click <em>New Plan</em>, enter details, and save. Use autosuggest for quick entry.</li>
    <li><strong>Track Progress:</strong> Update plan attributes, skills, and goals as your trainee advances.</li>
    <li><strong>Review Stats:</strong> Use stat bars and badges to compare trainees and optimize builds.</li>
    <li><strong>Export Data:</strong> Use the <em>Export</em> button to download plan data for analysis or sharing.</li>
    <li><strong>Use the Guide:</strong> Refer to this page for tips and troubleshooting.</li>
  </ol>

  <h2 class="mt-4">Tips & Best Practices</h2>
  <ul>
    <li>Use <strong>autosuggest</strong> to avoid typos and ensure consistent skill/goal naming.</li>
    <li>Regularly update your plans to reflect progress and new skills acquired.</li>
    <li>Compare stat bars to identify strengths and weaknesses in your trainees.</li>
    <li>Export plans before major changes for backup.</li>
    <li>Use badges and grades to quickly assess plan quality.</li>
  </ul>

  <h2 class="mt-4">Troubleshooting</h2>
  <ul>
    <li>If you see a blank page or error, try refreshing or clearing your browser cache.</li>
    <li>For server errors, ensure your database is running and `.env` settings are correct.</li>
    <li>If assets (CSS/JS) don’t load, check your <code>public</code> folder and webserver config.</li>
    <li>For missing data, verify your plan and attribute entries.</li>
    <li>Contact the developer via <a href="https://github.com/IzzatFirdaus/uma_musume_race_planner" target="_blank">GitHub</a> for bug reports or feature requests.</li>
  </ul>

  <h2 class="mt-4">Credits & Legal</h2>
  <ul>
    <li>This planner is a fan-made tool and is not affiliated with Cygames or the Uma Musume franchise.</li>
    <li>All trademarks and rights belong to their respective owners.</li>
    <li>See the footer for official links and social media.</li>
  </ul>
</div>
@endsection
