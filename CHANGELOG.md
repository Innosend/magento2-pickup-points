# Changelog

All notable changes to the `innosend/magento2-pickup-points` module are documented here.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [1.3.0] - 2026-11-02

### Changed

- Requires `innosend/magento2-integration` 1.3.0 or newer: the carrier lookup without the 301 lives there.
- The package version comes from the git tag; the `version` field is removed from `composer.json`.

### Fixed

- Allowed Carriers config field: a failed carrier lookup is cached for 15 minutes, so admin config pages no longer call the Innosend API (and wait for its timeout) on every load.
- Saving the Innosend API settings clears the cached carriers, so a newly entered API token is used right away.
- Checkout: changing the shipping address no longer reuses the coordinates and selected pickup point of the previous address (distances were calculated from the old address).
- Checkout: the "No pickup points found" message no longer shows the API URL. The URL is only returned in developer mode, and then logged to the browser console.
- Checkout: choosing the pickup point method now shows the nearest prefetched pickup point right away instead of the "Load pickup points" button. An address lookup that started while another request was running was skipped; it now runs when that request finishes.

## [1.1.1] – 2026-03-05

### Changed

- Version bump to 1.1.1; exact dependencies on `innosend/magento2-integration` 1.1.1 and `innosend/magento2-order-connector` 1.1.1.
- Pickup Points API: support both `zipcode` and `zip_code` in address response (DPD uses `zip_code`, GLS/PostNL/DHL use `zipcode`) so postcode is always available.

---

## [1.1.0] – 2026-03-02

### Changed

- `PickupPointRepository::getPickupPoints()` and `getPickupPointsByCoordinates()` now call `$apiClient->isEnabled()` instead of the removed `$apiClient->isPickupPointsEnabled()` – requires `innosend/magento2-integration` ≥ 1.1.0.
- All documentation rewritten to reflect the v1.1.0 single-token authentication model.

### Added

- Unit tests: `tests/Unit/Model/PickupPointRepositoryTest`
- Unit tests: `tests/Unit/Controller/Ajax/GetPickupPointsTest`
- `phpunit.xml` test runner configuration

### Removed

- Dependency on `$apiClient->isPickupPointsEnabled()` (method removed from `ClientInterface` in `magento2-integration` 1.1.0)

### Migration

Update `innosend/magento2-integration` to 1.1.0 first. No other changes required in this module.

---

## [1.0.3] - 2025-01-21

### Added
- Google Maps integration with AdvancedMarkerElement support
- Google Maps API key and Map ID configuration options
- Mobile map display toggle option
- Geocoding support with Google Maps Geocoding API and OpenStreetMap Nominatim fallback
- Pickup point information in PDF documents (invoices and shipments)
- Email template integration for pickup point data
- Admin order view with pickup point information display
- Guest checkout support via WebAPI endpoints
- REST API endpoints for pickup point data retrieval

### Changed
- Updated dependency on `innosend/magento2-integration` to require >= 1.0.0
- Updated dependency on `innosend/magento2-order-connector` to require >= 1.0.2
- Improved map rendering performance
- Enhanced mobile responsiveness

### Fixed
- Fixed map display issues on mobile devices
- Resolved pickup point selection persistence in quote
- Fixed extension attribute loading in order API responses
- Improved error handling for API failures

## [1.0.2] - 2024-XX-XX

### Added
- Initial release with core pickup points functionality
- OpenStreetMap/Leaflet integration
- Pickup point selection modal
- Extension attributes for quote and order
- AJAX endpoints for pickup point fetching
- Carrier filtering support
- Basic configuration options

### Changed
- N/A

### Fixed
- N/A

## [1.0.1] - 2024-XX-XX

### Added
- Initial beta release

### Changed
- N/A

### Fixed
- N/A

## [1.0.0] - 2024-XX-XX

### Added
- Initial release
