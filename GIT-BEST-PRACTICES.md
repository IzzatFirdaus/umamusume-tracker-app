# Git Best Practices

This document collects recommended Git workflows, commit conventions, PR & review checklists, CI guidance, and repository maintenance tips tailored for small-to-medium teams working on this project.

Keep this short and practical. Use it as a checklist for everyday work.

---

## Goals

- Keep history readable and useful.
- Reduce merge pain and conflicts.
- Ensure code quality through reviews and CI.
- Avoid committing secrets and large binaries.

---

## Basic workflow (recommended)

1. Pull latest changes from the protected base branch (usually `main`) before starting work.
2. Create a short-lived feature branch for each task/issue.
3. Make small, focused commits with clear messages (see Commit messages below).
4. Push the branch to the remote and open a Pull Request (PR) targeting `main` (or the agreed integration branch).
5. Add reviewers, run CI, address feedback, and squash/rebase if requested.
6. Merge using the agreed merge strategy (see Merge policy).

Benefits: isolated work, easy review, and smaller merge contexts.

---

## Branch naming conventions

Use predictable branch names so intent is immediately clear.

- feature/&lt;short-description&gt; — new feature or UI change (e.g., `feature/stat-bars`)
- fix/&lt;short-description&gt; — bugfix (e.g., `fix/energy-bar-calculation`)
- chore/&lt;short-description&gt; — chores like dependency bumps or CI changes
- docs/&lt;short-description&gt; — docs-only changes
- hotfix/&lt;short-description&gt; — urgent fixes normally applied to a release branch

Keep names lowercase, use hyphens, and keep them short.

---

## Commit messages (clear, actionable)

Follow a convention such as Conventional Commits. This helps tooling, changelogs, and clarity.

Format:

```text
<type>(<scope?>): <short summary>

Optional longer description that explains WHY the change was made and any trade-offs.

Footer: references to issues, breaking changes, or migration notes.
```

Common types:

- feat: a new feature
- fix: a bug fix
- docs: documentation only changes
- chore: changes to build process or auxiliary tools
- refactor: code changes that neither fix a bug nor add a feature
- test: adding or changing tests
- perf: performance improvements

Examples:

```text
feat(plan): add colored stat bars to plan cards

The new stat bars use CSS custom properties and a small helper to set width.

Refs: #123
```

```text
fix(skill): correct SP calculation rounding bug

Previously rounding produced -1 SP in some situations; now uses Math.max(0, ...).
```

Guidelines:

- Keep the subject line ≤ 72 characters when possible.
- Use imperative mood ("Add", "Fix", not "Added"/"Fixed").
- Include issue/PR numbers in the footer when relevant.

---

## Pull Request / Code Review checklist

Before requesting review:

- [ ] Branch is pushed to remote and targeting the correct base branch.
- [ ] Commits are squashed or logically grouped and messages are clear.
- [ ] Code compiles and basic local checks pass (lint, build, unit tests).
- [ ] New features have basic tests (unit/feature) where applicable.
- [ ] No sensitive secrets or config values committed (.env excluded).
- [ ] PR description explains intent, design decisions, and testing steps.

Reviewers should check:

- [ ] Behavior: Does the change do what it says? Manual sanity test steps included?
- [ ] Correctness: Edge cases and error handling covered?
- [ ] Tests: Are there tests covering new behavior or changes? Are existing tests still passing?
- [ ] Style: Coding style, consistent naming, no commented-out code.
- [ ] Security: No credentials, tokens, or personal data added.
- [ ] Performance: Any obvious perf regressions?
- [ ] Accessibility: Keyboard & screen-reader accessibility for UI changes.

When merging:

- Prefer fast-forward/squash merges for small teams to keep history linear
- Use merge commits for long-running branches or where the history of intermediate merges matters

---

## Merge policy

Pick one policy and apply it consistently across the repo.

- Trunk-based / GitHub Flow (recommended for small teams):
  - PRs merged into `main` when approvals & CI pass.
  - Use squash merge for small features to keep `main` history compact.

- Git Flow (for release-managed projects):
  - Use `develop` for integration, create `release/*` and `hotfix/*` branches as needed.

Avoid force-pushing shared branches unless coordinating with reviewers.

---

## Rebase vs Merge

- Rebase keeps a linear history but rewrites commits — safe for local or feature branches that only you push.
- Merge preserves the exact chronological history and merge commits — safer for shared branches.

Rule of thumb:

- Rebase local work before opening a PR or to clean up commits.
- Do not rebase public branches that other people use without coordination.

---

## Continuous Integration (CI)

CI should run on every PR and protect the base branch.

CI jobs should include at minimum:

- Static analysis / linting
- Unit tests
- Build (compile assets) to ensure no build-time regressions
- Optional: basic integration or smoke tests

Fail fast. Enforce required checks on protected branches (e.g., `main`).

---

## Code ownership and protected branches

- Protect `main` (and any release branches) with branch protection rules: require PRs, require a minimum number of reviewers, require passing CI.
- Use CODEOWNERS to auto-request reviewers for changes in particular directories (optional but useful).

---

## Tests

- Prefer automated tests (unit, feature, end-to-end) for logic-critical code.
- Keep tests fast and deterministic; avoid heavy flakiness.
- Run relevant tests locally before pushing.

---

## Security: secrets & credentials

- Never commit secrets (`.env`, API keys, passwords). Use `.gitignore` and a `.env.example` template.
- Use environment variables, secret managers (CI secret storage), or OS-level stores.
- If secrets are accidentally committed, rotate the secret immediately and force-remove it from history (bfg/git filter-repo), then inform stakeholders.

---

## Large files / binary assets

- Avoid committing large binaries to Git. Use Git LFS if binaries are required.
- Store user uploads or generated files outside the repository (e.g., cloud storage, `uploads/` which should be gitignored).

---

## Release tagging & changelogs

- Use annotated tags for releases (e.g., `v1.2.0`).
- Maintain a changelog (manually or via release notes derived from commit messages). Conventional Commits can help automate release notes.

---

Useful commands & patterns (examples)

Fetch latest and rebase your feature branch on top of `main`:

```powershell
git checkout main
git pull origin main
git checkout feature/my-branch
git rebase main
```

Create a clean feature branch:

```powershell
git checkout -b feature/short-description
```

Squash commits interactively before pushing (clean history):

```powershell
git rebase -i HEAD~5
```

Undo local changes (safe):

```powershell
git restore --staged <file>    # unstage
git restore <file>            # discard working-tree changes
```

Remove a file from history (sensitive accidental commit): use specialized tools like `git filter-repo` or `bfg` and rotate keys.

---

## Git hooks & automation

- Add pre-commit hooks to run quick linters or tests (use Husky or simple Git hooks) to catch issues early.
- Use CI to run the full test matrix.

---

## Maintenance & housekeeping

- Keep `main` deployable:
  - No broken builds, regression tests must pass.
- Periodically tidy branches: delete merged branches locally and remotely.
  - `git fetch --prune` and remove stale local branches.
- Audit repo for large files and secrets periodically.

---

## When something goes wrong

- If you introduced a bug: revert the commit or open an urgent hotfix branch and PR.
- If you committed a secret: rotate the secret immediately and purge history.
- If CI fails after merge: revert merge and fix in a new branch.

---

## Further reading / references

- [Git documentation](https://git-scm.com/doc)
- [Pro Git book](https://git-scm.com/book/en/v2)
- [Conventional Commits](https://www.conventionalcommits.org/)

---

Keep this file updated as your team's practices evolve. Small, consistent habits prevent many painful problems later.
