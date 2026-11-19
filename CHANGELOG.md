# Changelog

All notable changes to this theme are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.7.2] - 2026-11-19

### Fixed

- Map MoonShine ColorManager surface tokens (`--ms-cm-base-default`, `--ms-cm-base-text`,
  `--ms-cm-base-stroke`, `--ms-cm-body`) to Mushrooms CSS variables so third-party admin
  plugins (analytics dashboards, etc.) keep correct dark surfaces when they rely on
  `--ms-cm-*` fallbacks. Apps can still override `--mushrooms-*` (e.g. neutral palette layers).

## [1.7.1] - 2026-11-16

### Fixed

- Dark-theme toggle switches were nearly invisible: the track defaulted to
  `--color-base`, the same near-black as the panel behind it, so only the
  floating thumb showed. Off is now a mid-gray track with a muted outline and
  a light thumb; on keeps the lime accent with a dark thumb.
- Table headers used a translucent sidebar mix that read as muddy on the dark
  canvas. Headers are transparent and the table sits on the sidebar surface.
- Dashboard grids: tighter column gaps, and `col-span-*` children no longer
  overflow their tracks.

## [1.7.0] - 2026-11-11

### Added

- MoonShine 5 support while keeping MoonShine 4.8 compatibility
  (`moonshine/moonshine` `^4.8 || ^5.0`).

## [1.6.4] - 2026-11

- Allow `orchestra/testbench` `^11.0` in dev dependencies.
