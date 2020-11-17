<?php

/**
 * @copyright Copyright (c) PutYourLightsOn
 */

/**
 * Blitz config.php
 *
 * This file exists only as a template for the Blitz settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'blitz.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [
  '*' => [
    // With this setting enabled, Blitz will log detailed messages to `storage/logs/blitz.log`.
    //'debug' => false,

    // With this setting enabled, Blitz will begin caching pages according to the included/excluded URI patterns. Disable this setting to prevent Blitz from caching any new pages.
    'cachingEnabled' => true,

    // The URI patterns to include in caching. Set `siteId` to a blank string to indicate all sites.
    'includedUriPatterns' => [
      ['siteId' => 1, 'uriPattern' => '',],
      ['siteId' => 1, 'uriPattern' => '^departments$',],
      ['siteId' => 1, 'uriPattern' => '^departments/police$',],
      ['siteId' => 1, 'uriPattern' => '^services/pay-a-parking-ticket$',],
      ['siteId' => 1, 'uriPattern' => '^services$',],
      ['siteId' => 1, 'uriPattern' => '^topics/parking$',],
      ['siteId' => 1, 'uriPattern' => '^services/apply-for-city-of-oakland-and-port-of-oakland-jobs$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/alameda-county-regresses-to-purple-tier-prompting-changes-in-allowed-activities$',],
      ['siteId' => 1, 'uriPattern' => '^topics/city-of-oakland-community-toy-drive$',],
      ['siteId' => 1, 'uriPattern' => '^departments/planning-and-building$',],
      ['siteId' => 1, 'uriPattern' => '^departments/department-of-parks-recreation-and-youth-development$',],
      ['siteId' => 1, 'uriPattern' => '^services/report-a-crime-online$',],
      ['siteId' => 1, 'uriPattern' => '^services/oak311$',],
      ['siteId' => 1, 'uriPattern' => '^topics/covid-19$',],
      ['siteId' => 1, 'uriPattern' => '^topics/permits$',],
      ['siteId' => 1, 'uriPattern' => '^departments/oakland-city-council$',],
      ['siteId' => 1, 'uriPattern' => '^services/police-reports-and-documents$',],
      ['siteId' => 1, 'uriPattern' => '^resources/planning-and-building-forms-planning-and-building-applications$',],
      ['siteId' => 1, 'uriPattern' => '^topics/rent-adjustment-program$',],
      ['siteId' => 1, 'uriPattern' => '^resources/police-incident-data$',],
      ['siteId' => 1, 'uriPattern' => '^topics/oakwifi$',],
      ['siteId' => 1, 'uriPattern' => '^resources/zoning-map$',],
      ['siteId' => 1, 'uriPattern' => '^departments/media-center$',],
      ['siteId' => 1, 'uriPattern' => '^services/abandoned-vehicles$',],
      ['siteId' => 1, 'uriPattern' => '^services/online-permit-center$',],
      ['siteId' => 1, 'uriPattern' => '^staff$',],
      ['siteId' => 1, 'uriPattern' => '^departments/fire$',],
      ['siteId' => 1, 'uriPattern' => '^topics/street-sweeping$',],
      ['siteId' => 1, 'uriPattern' => '^services/business-tax-applications-1$',],
      ['siteId' => 1, 'uriPattern' => '^officials/libby-schaaf$',],
      ['siteId' => 1, 'uriPattern' => '^services/contest-a-parking-ticket$',],
      ['siteId' => 1, 'uriPattern' => '^topics/parking-meters$',],
      ['siteId' => 1, 'uriPattern' => '^departments/finance-department$',],
      ['siteId' => 1, 'uriPattern' => '^topics/reimagining-public-safety$',],
      ['siteId' => 1, 'uriPattern' => '^services/view-city-council-meeting-schedule-agendas-minutes-and-video$',],
      ['siteId' => 1, 'uriPattern' => '^services/report-crime$',],
      ['siteId' => 1, 'uriPattern' => '^departments/public-works$',],
      ['siteId' => 1, 'uriPattern' => '^resources/learn-more-about-lions-pool-at-dimond-park$',],
      ['siteId' => 1, 'uriPattern' => '^resources/street-sweeping-schedule-map$',],
      ['siteId' => 1, 'uriPattern' => '^resources/city-of-oakland-service-modifications-suspensions-closures-in-response-to-alameda-county-public-health-order-to-shelter-in-place$',],
      ['siteId' => 1, 'uriPattern' => '^departments/department-of-housing-and-community-development$',],
      ['siteId' => 1, 'uriPattern' => '^topics/planning-and-building-codes$',],
      ['siteId' => 1, 'uriPattern' => '^topics/job-opportunities$',],
      ['siteId' => 1, 'uriPattern' => '^topics/work-for-oakland-police-department$',],
      ['siteId' => 1, 'uriPattern' => '^news/related-to/departments/police$',],
      ['siteId' => 1, 'uriPattern' => '^topics/secondary-units$',],
      ['siteId' => 1, 'uriPattern' => '^departments/department-of-human-resources-management$',],
      ['siteId' => 1, 'uriPattern' => '^events/virtual-job-fair-healthcare$',],
      ['siteId' => 1, 'uriPattern' => '^resources/sidewalk-certification-faq$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/planning-building-department-response-to-shelter-in-place$',],
      ['siteId' => 1, 'uriPattern' => '^topics/planning-code-zoning-map-and-general-plan$',],
      ['siteId' => 1, 'uriPattern' => '^topics/measure-ff-and-measure-z$',],
      ['siteId' => 1, 'uriPattern' => '^resources/coronavirus-2019-covid-19-business-and-worker-resources$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/city-of-oakland-strengthens-street-sweeping-efforts-with-resumed-parking-management-starting-nov-9$',],
      ['siteId' => 1, 'uriPattern' => '^services/apply-for-a-business-license-online$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions/police-commission$',],
      ['siteId' => 1, 'uriPattern' => '^calendar$',],
      ['siteId' => 1, 'uriPattern' => '^services/apply-renew-residential-parking-permit$',],
      ['siteId' => 1, 'uriPattern' => '^resources/can-the-crime-be-reported-online$',],
      ['siteId' => 1, 'uriPattern' => '^topics/planning-and-building-permit-fees$',],
      ['siteId' => 1, 'uriPattern' => '^resources/oakland-crime-statistics$',],
      ['siteId' => 1, 'uriPattern' => '^topics/cannabis-permits$',],
      ['siteId' => 1, 'uriPattern' => '^topics/parking-tickets$',],
      ['siteId' => 1, 'uriPattern' => '^projects/oakland-slow-streets$',],
      ['siteId' => 1, 'uriPattern' => '^topics/first-time-homebuyer-mortgage-assistance-program-map$',],
      ['siteId' => 1, 'uriPattern' => '^resources/request-a-plan-or-permit-retrieval$',],
      ['siteId' => 1, 'uriPattern' => '^services/towed-vehicles$',],
      ['siteId' => 1, 'uriPattern' => '^services/look-up-your-city-council-district-and-representative$',],
      ['siteId' => 1, 'uriPattern' => '^resources/learn-more-about-allowable-rent-increases$',],
      ['siteId' => 1, 'uriPattern' => '^resources/enroll-in-employee-benefits$',],
      ['siteId' => 1, 'uriPattern' => '^services/register-with-isupplier$',],
      ['siteId' => 1, 'uriPattern' => '^resources/rent-adjustment-program-guide-and-information-sheets$',],
      ['siteId' => 1, 'uriPattern' => '^topics/building-inspections$',],
      ['siteId' => 1, 'uriPattern' => '^topics/joaquin-miller-park$',],
      ['siteId' => 1, 'uriPattern' => '^services/view-updates-and-announcements-from-rent-adjustment-program$',],
      ['siteId' => 1, 'uriPattern' => '^topics/allowable-rent-increases$',],
      ['siteId' => 1, 'uriPattern' => '^services/schedule-your-building-inspection$',],
      ['siteId' => 1, 'uriPattern' => '^resources/vehicle-collision-reports$',],
      ['siteId' => 1, 'uriPattern' => '^officials/lynette-gibson-mcelhaney$',],
      ['siteId' => 1, 'uriPattern' => '^departments/economic-and-workforce-development$',],
      ['siteId' => 1, 'uriPattern' => '^resources$',],
      ['siteId' => 1, 'uriPattern' => '^topics/elections$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/city-of-oakland-cbos-awarded-28-2-million-grant-for-transformative-east-oakland-projects$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/business$',],
      ['siteId' => 1, 'uriPattern' => '^resources/emergency-moratorium-on-residential-rent-increases-and-evictions$',],
      ['siteId' => 1, 'uriPattern' => '^officials$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/oakland-police-department-investigating-officer-involved-shooting-and-crime-spree-in-oakland$',],
      ['siteId' => 1, 'uriPattern' => '^services/apply-for-building-permits-online$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/police$',],
      ['siteId' => 1, 'uriPattern' => '^resources/oaklands-moratorium-on-residential-and-commercial-evictions$',],
      ['siteId' => 1, 'uriPattern' => '^resources/register-for-alarm-permit$',],
      ['siteId' => 1, 'uriPattern' => '^documents/oaklands-minimum-wage-posters$',],
      ['siteId' => 1, 'uriPattern' => '^meetings/police-commission-november-12-2020$',],
      ['siteId' => 1, 'uriPattern' => '^resources/street-sweeping-holidays$',],
      ['siteId' => 1, 'uriPattern' => '^projects/fy-2019-2020-budget-process-1$',],
      ['siteId' => 1, 'uriPattern' => '^departments/city-administrator$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/reminder-city-of-oakland-continues-services-to-support-economic-recovery-restores-parking-meter-operations-and-time-limit-parking-enforcement-citywide-effective-july-6$',],
      ['siteId' => 1, 'uriPattern' => '^departments/city-clerk$',],
      ['siteId' => 1, 'uriPattern' => '^officials/sheng-thao$',],
      ['siteId' => 1, 'uriPattern' => '^services/find-affordable-housing-developers$',],
      ['siteId' => 1, 'uriPattern' => '^officials/rebecca-kaplan$',],
      ['siteId' => 1, 'uriPattern' => '^meetings/reimagining-public-safety-task-force-meeting$',],
      ['siteId' => 1, 'uriPattern' => '^resources/business-use-of-streets-and-sidewalks-initiative$',],
      ['siteId' => 1, 'uriPattern' => '^services/find-a-parks-and-recreation-location$',],
      ['siteId' => 1, 'uriPattern' => '^topics/sworn-officer-application-process-1$',],
      ['siteId' => 1, 'uriPattern' => '^officials/councilmember-dan-kalb$',],
      ['siteId' => 1, 'uriPattern' => '^topics/parks$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions/police-commission/meetings$',],
      ['siteId' => 1, 'uriPattern' => '^services/schedule-a-free-bulky-pickup$',],
      ['siteId' => 1, 'uriPattern' => '^topics/studio-one-arts-center$',],
      ['siteId' => 1, 'uriPattern' => '^resources/starting-a-business-in-oakland$',],
      ['siteId' => 1, 'uriPattern' => '^services/find-affordable-housing$',],
      ['siteId' => 1, 'uriPattern' => '^services/request-property-tax-special-assessment-exemption-or-refund$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/opd-has-recovered-nearly-540-guns-related-to-crimes-this-year-a-20-increase-over-the-same-time-last-year-still-violent-crime-is-on-the-rise$',],
      ['siteId' => 1, 'uriPattern' => '^topics/parking-permits$',],
      ['siteId' => 1, 'uriPattern' => '^topics/vacantpropertytax$',],
      ['siteId' => 1, 'uriPattern' => '^departments/human-services$',],
      ['siteId' => 1, 'uriPattern' => '^resources/apply-to-become-an-opd-officer$',],
      ['siteId' => 1, 'uriPattern' => '^documents$',],
      ['siteId' => 1, 'uriPattern' => '^resources/food-distribution-in-oakland$',],
      ['siteId' => 1, 'uriPattern' => '^officials/nikki-fortunato-bas$',],
      ['siteId' => 1, 'uriPattern' => '^resources/work-exempt-form-a-building-permit$',],
      ['siteId' => 1, 'uriPattern' => '^topics/cannabis-permit-process-step-by-step$',],
      ['siteId' => 1, 'uriPattern' => '^topics/street-sweeping-schedule-change$',],
      ['siteId' => 1, 'uriPattern' => '^documents/city-of-oakland-labor-union-memoranda-of-understanding$',],
      ['siteId' => 1, 'uriPattern' => '^departments/race-and-equity$',],
      ['siteId' => 1, 'uriPattern' => '^officials/noel-gallo$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/construction$',],
      ['siteId' => 1, 'uriPattern' => '^resources/covid-19-updates$',],
      ['siteId' => 1, 'uriPattern' => '^documents/vacant-property-tax-vpt-forms$',],
      ['siteId' => 1, 'uriPattern' => '^resources/great-plates-delivered-city-of-oakland$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/oakland-expands-free-testing-announces-new-walk-up-covid-19-testing-in-east-oakland$',],
      ['siteId' => 1, 'uriPattern' => '^resources/rent-and-income-limits-for-affordable-housing$',],
      ['siteId' => 1, 'uriPattern' => '^departments/transportation$',],
      ['siteId' => 1, 'uriPattern' => '^services/report-a-crime-in-person$',],
      ['siteId' => 1, 'uriPattern' => '^resources/salary-ordinance$',],
      ['siteId' => 1, 'uriPattern' => '^news/related-to/departments/fire$',],
      ['siteId' => 1, 'uriPattern' => '^services/request-public-records$',],
      ['siteId' => 1, 'uriPattern' => '^officials/loren-taylor$',],
      ['siteId' => 1, 'uriPattern' => '^resources/homebuyer-mortagage-assistance-program-map-brochures$',],
      ['siteId' => 1, 'uriPattern' => '^resources/minimum-wage-employer-information$',],
      ['siteId' => 1, 'uriPattern' => '^topics/affordable-housing-development$',],
      ['siteId' => 1, 'uriPattern' => '^services/abandoned-vehicles-and-towed-vehicles$',],
      ['siteId' => 1, 'uriPattern' => '^topics/coronavirus-aid-relief-and-economic-security-cares-act-funding$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/accessing-public-records$',],
      ['siteId' => 1, 'uriPattern' => '^topics/oaklandlovelife$',],
      ['siteId' => 1, 'uriPattern' => '^resources/learn-more-about-temescal-pool$',],
      ['siteId' => 1, 'uriPattern' => '^services/workforce-development-grant-program$',],
      ['siteId' => 1, 'uriPattern' => '^topics/inside-the-oakland-police-department$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/parking$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions$',],
      ['siteId' => 1, 'uriPattern' => '^resources/learn-more-about-visiting-joaquin-miller-park$',],
      ['siteId' => 1, 'uriPattern' => '^resources/list-of-holidays-2020$',],
      ['siteId' => 1, 'uriPattern' => '^topics/private-property-complaints--code-enforcement$',],
      ['siteId' => 1, 'uriPattern' => '^resources/find-a-police-area-or-beat$',],
      ['siteId' => 1, 'uriPattern' => '^departments/workplace-employment-standards$',],
      ['siteId' => 1, 'uriPattern' => '^services/finance-fees-starting-a-business-registering-rental-property-taxes-and-fees$',],
      ['siteId' => 1, 'uriPattern' => '^topics/boating$',],
      ['siteId' => 1, 'uriPattern' => '^search/legacy$',],
      ['siteId' => 1, 'uriPattern' => '^topics/police-data$',],
      ['siteId' => 1, 'uriPattern' => '^projects/2030ecap$',],
      ['siteId' => 1, 'uriPattern' => '^resources/davie-tennis-stadium$',],
      ['siteId' => 1, 'uriPattern' => '^resources/read-the-tenant-protection-ordinance$',],
      ['siteId' => 1, 'uriPattern' => '^services/curb-gutter-sidewalk-permit$',],
      ['siteId' => 1, 'uriPattern' => '^topics/building-plan-check$',],
      ['siteId' => 1, 'uriPattern' => '^topics/e-scooters$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions/police-and-fire-retirement-board$',],
      ['siteId' => 1, 'uriPattern' => '^meetings/november-18-2020-planning-commission-meeting$',],
      ['siteId' => 1, 'uriPattern' => '^resources/inside-the-oakland-police-department-opd$',],
      ['siteId' => 1, 'uriPattern' => '^topics/oakland-police-areas$',],
      ['siteId' => 1, 'uriPattern' => '^documents/rent-adjustment-program-forms-notices$',],
      ['siteId' => 1, 'uriPattern' => '^services/pay-business-taxes-and-fees-online$',],
      ['siteId' => 1, 'uriPattern' => '^teams/mayors-team$',],
      ['siteId' => 1, 'uriPattern' => '^services/attend-a-first-time-homebuyer-workshop$',],
      ['siteId' => 1, 'uriPattern' => '^topics/food-and-mobile-vending-permits$',],
      ['siteId' => 1, 'uriPattern' => '^topics/ssretrofit$',],
      ['siteId' => 1, 'uriPattern' => '^topics$',],
      ['siteId' => 1, 'uriPattern' => '^topics/aquatics$',],
      ['siteId' => 1, 'uriPattern' => '^topics/major-development-projects$',],
      ['siteId' => 1, 'uriPattern' => '^topics/oaklands-ceasefire-strategy$',],
      ['siteId' => 1, 'uriPattern' => '^documents/business-tax-information$',],
      ['siteId' => 1, 'uriPattern' => '^services/oakwifi$',],
      ['siteId' => 1, 'uriPattern' => '^resources/read-the-california-building-codes$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions/planning-commission$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions/planning-commission/meetings$',],
      ['siteId' => 1, 'uriPattern' => '^resources/real-estate-transfer-tax$',],
      ['siteId' => 1, 'uriPattern' => '^services/parking-ticket-payment-plan$',],
      ['siteId' => 1, 'uriPattern' => '^officials/larry-reid$',],
      ['siteId' => 1, 'uriPattern' => '^resources/designated-opportunity-zones$',],
      ['siteId' => 1, 'uriPattern' => '^services/file-for-a-certificate-of-exemption$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/oakland-police-department-identified-male-adult-connected-to-officer-involved-shooting$',],
      ['siteId' => 1, 'uriPattern' => '^resources/orders-related-to-covid-19$',],
      ['siteId' => 1, 'uriPattern' => '^resources/read-the-california-model-building-codes-2$',],
      ['siteId' => 1, 'uriPattern' => '^resources/read-the-just-cause-for-eviction-ordinance$',],
      ['siteId' => 1, 'uriPattern' => '^topics/oakland-business-assistance-center$',],
      ['siteId' => 1, 'uriPattern' => '^topics/rentals-and-reservations$',],
      ['siteId' => 1, 'uriPattern' => '^news/2019/oaklands-minimum-wage-goes-up-january-1-2020$',],
      ['siteId' => 1, 'uriPattern' => '^resources/obtain-a-zoning-permit$',],
      ['siteId' => 1, 'uriPattern' => '^resources/read-the-oakland-noise-ordinance$',],
      ['siteId' => 1, 'uriPattern' => '^services/apply-for-adopt-a-spot-online$',],
      ['siteId' => 1, 'uriPattern' => '^topics/morcom-rose-garden$',],
      ['siteId' => 1, 'uriPattern' => '^services/view-bid-and-rfp-rfq-opportunities$',],
      ['siteId' => 1, 'uriPattern' => '^topics/equity-program$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions/police-and-fire-retirement-board/meetings$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/city-of-oakland-receives-nearly-37m-in-cares-act-funding-5m-for-renters-homeowners$',],
      ['siteId' => 1, 'uriPattern' => '^services/register-for-parks-and-recreation-programs-classes-and-activities$',],
      ['siteId' => 1, 'uriPattern' => '^topics/recreation-centers-and-facilities$',],
      ['siteId' => 1, 'uriPattern' => '^topics/free-broadway-shuttle$',],
      ['siteId' => 1, 'uriPattern' => '^projects$',],
      ['siteId' => 1, 'uriPattern' => '^topics/oaklands-history-of-resistance-to-racism$',],
      ['siteId' => 1, 'uriPattern' => '^topics/become-an-equity-applicant-or-incuabtor$',],
      ['siteId' => 1, 'uriPattern' => '^topics/city-council-meeting-information$',],
      ['siteId' => 1, 'uriPattern' => '^documents/new-hire-benefit-enrollment-package$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/self-haul-bulky-drop-off-appointment-service-now-available-to-oaklanders-during-covid-19-suspension-of-bulky-pick-up-service$',],
      ['siteId' => 1, 'uriPattern' => '^news/related-to/topics/covid-19$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/report-a-problem$',],
      ['siteId' => 1, 'uriPattern' => '^services/report-nuisance$',],
      ['siteId' => 1, 'uriPattern' => '^topics/head-start$',],
      ['siteId' => 1, 'uriPattern' => '^services/obstruction-permit-traffic-control-plan-not-required$',],
      ['siteId' => 1, 'uriPattern' => '^services/spare$',],
      ['siteId' => 1, 'uriPattern' => '^resources/submit-an-application-for-flex-streets$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions/alameda-county-oakland-community-action-partnership-administrating-board$',],
      ['siteId' => 1, 'uriPattern' => '^resources/planning-building-services-quick-reference-guide$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/jobs$',],
      ['siteId' => 1, 'uriPattern' => '^services/rent-adjustment-program-fee$',],
      ['siteId' => 1, 'uriPattern' => '^news/2020/homicide-investigation-in-the-area-of-e-19th-street-and-23rd-avenue$',],
      ['siteId' => 1, 'uriPattern' => '^resources/keep-oakland-housed-covid-19-relief-financial-assistance$',],
      ['siteId' => 1, 'uriPattern' => '^services/apply-for-zoning-clearance-permit$',],
      ['siteId' => 1, 'uriPattern' => '^services/recreation-centers-and-facilities$',],
      ['siteId' => 1, 'uriPattern' => '^resources/emergency-paid-sick-leave-for-oakland-employees-during-the-novel-coronavirus-covid-19-pandemic-ordinance$',],
      ['siteId' => 1, 'uriPattern' => '^topics/east-oakland-sports-center$',],
      ['siteId' => 1, 'uriPattern' => '^topics/tree-services$',],
      ['siteId' => 1, 'uriPattern' => '^documents/opd-org-charts$',],
      ['siteId' => 1, 'uriPattern' => '^resources/planning-applications$',],
      ['siteId' => 1, 'uriPattern' => '^services/apply-new-passport$',],
      ['siteId' => 1, 'uriPattern' => '^services/non-development-related-tree-removal$',],
      ['siteId' => 1, 'uriPattern' => '^topics/capital-improvement-program$',],
      ['siteId' => 1, 'uriPattern' => '^meetings$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/housing$',],
      ['siteId' => 1, 'uriPattern' => '^services/apply-to-head-start$',],
      ['siteId' => 1, 'uriPattern' => '^resources/constructing-your-building$',],
      ['siteId' => 1, 'uriPattern' => '^resources/re-opening-resources$',],
      ['siteId' => 1, 'uriPattern' => '^services/file-a-property-owner-petition$',],
      ['siteId' => 1, 'uriPattern' => '^services/local-business-certification$',],
      ['siteId' => 1, 'uriPattern' => '^topics/sidewalks$',],
      ['siteId' => 1, 'uriPattern' => '^boards-commissions/public-ethics-commission$',],
      ['siteId' => 1, 'uriPattern' => '^services/category/property-owners$',],
      ['siteId' => 1, 'uriPattern' => '^services/plan-review$',],
      ['siteId' => 1, 'uriPattern' => '^topics/rent-a-boat$',],
    ],

    // The URI patterns to exclude from caching (overrides any matching patterns to include). Set `siteId` to a blank string to indicate all sites.
    //'excludedUriPatterns' => [
    //    [
    //        'siteId' => 1,
    //        'uriPattern' => 'pages/contact',
    //    ],
    //],

    // The storage type to use.
    //'cacheStorageType' => 'putyourlightson\blitz\drivers\storage\FileStorage',

    // The storage settings.
    //'cacheStorageSettings' => [
    //    'folderPath' => '@webroot/cache/blitz',
    //    'createGzipFiles' => false,
    //    'countCachedFiles' => true,
    //],

    // The storage type classes to add to the plugin’s default storage types.
    //'cacheStorageTypes' => [],

    // The warmer type to use.
    //'cacheWarmerType' => 'putyourlightson\blitz\drivers\warmers\GuzzleWarmer',

    // The warmer settings.
    //'cacheWarmerSettings' => ['concurrency' => 3],

    // The warmer type classes to add to the plugin’s default warmer types.
    //'cacheWarmerTypes' => [],

    // Custom site URIs to warm when either a site or the entire cache is warmed.
    //'customSiteUris' => [
    //    [
    //        'siteId' => 1,
    //        'uri' => 'pages/custom',
    //    ],
    //],

    // The purger type to use.
    //'cachePurgerType' => 'putyourlightson\blitz\drivers\purgers\CloudflarePurger',

    // The purger settings (zone ID keys are site UIDs).
    //'cachePurgerSettings' => [
    //    'zoneIds' => [
    //        'f64d4923-f64d4923-f64d4923' => [
    //            'zoneId' => '',
    //        ],
    //    ],
    //    'email' => '',
    //    'apiKey' => '',
    //    'warmCacheDelay' => '3',
    //],

    // The purger type classes to add to the plugin’s default purger types.
    //'cachePurgerTypes' => [
    //    'putyourlightson\blitzshell\ShellDeployer',
    //],

    // The deployer type to use.
    //'deployerType' => 'putyourlightson\blitz\drivers\deployers\GitDeployer',

    // The deployer settings (zone ID keys are site UIDs).
    //'deployerSettings' => [
    //    'gitRepositories' => [
    //        'f64d4923-f64d4923-f64d4923' => [
    //            'repositoryPath' => '@root/path/to/repo',
    //            'branch' => 'master',
    //            'remote' => 'origin',
    //        ],
    //    ],
    //    'commitMessage' => 'Blitz auto commit',
    //    'username' => '',
    //    'personalAccessToken' => '',
    //    'name' => '',
    //    'email' => '',
    //    'commandsBefore' => '',
    //    'commandsAfter' => '',
    //],

    // The deployer type classes to add to the plugin’s default deployer types.
    //'deployerTypes' => [
    //    'putyourlightson\blitzshell\ShellDeployer',
    //],

    // Whether the cache should automatically be cleared when elements are updated.
    //'clearCacheAutomatically' => true,

    // Whether the cache should automatically be warmed after clearing.
    //'warmCacheAutomatically' => true,

    // Whether the cache should automatically be refreshed after a global set is updated.
    //'refreshCacheAutomaticallyForGlobals' => true,

    // Whether the cache should be refreshed when an element is saved but unchanged.
    //'refreshCacheWhenElementSavedUnchanged' => false,

    // Whether the cache should be refreshed when an element is saved but not live.
    //'refreshCacheWhenElementSavedNotLive' => false,

    // Whether URLs with query strings should cached and how.
    // - `0`: Do not cache URLs with query strings
    // - `1`: Cache URLs with query strings as unique pages
    // - `2`: Cache URLs with query strings as the same page
    //'queryStringCaching' => 0,

    // The query string parameters to exclude when determining if and how a page should be cached.
    //'excludedQueryStringParams' => ['gclid', 'fbclid'],

    // An API key that can be used to clear, flush, warm, or refresh expired cache through a URL (min. 16 characters).
    //'apiKey' => '',

    // A path to the `bin` folder that should be forced.
    //'binPath' => '',

    // Whether elements should be cached in the database.
    //'cacheElements' => true,

    // Whether element queries should be cached in the database.
    //'cacheElementQueries' => true,

    // The amount of time after which the cache should expire (if not 0). See [[ConfigHelper::durationInSeconds()]] for a list of supported value types.
    //'cacheDuration' => 0,

    // Element types that should not be cached (in addition to the defaults).
    //'nonCacheableElementTypes' => [
    //    'putyourlightson\campaign\elements\ContactElement',
    //],

    // Source ID attributes for element types (in addition to the defaults).
    //'sourceIdAttributes' => [
    //    'putyourlightson\campaign\elements\CampaignElement' => 'campaignTypeId',
    //],

    // The integrations to initialise.
    //'integrations' => [
    //    'putyourlightson\blitz\drivers\integrations\FeedMeIntegration',
    //    'putyourlightson\blitz\drivers\integrations\SeomaticIntegration',
    //],

    // The value to send in the cache control header.
    //'cacheControlHeader' => 'public, s-maxage=31536000, max-age=0',

    // Whether an `X-Powered-By: Blitz` header should be sent.
    //'sendPoweredByHeader' => true,

    // Whether the "cached on" and "served by" timestamp comments should be appended to the cached output.
    // - `false`: Do not append any comments
    // - `true`: Append all comments
    // - `2`: Append "cached on" comment only
    // - `3`: Append "served by" comment only
    //'outputComments' => true,

    // The priority to give the refresh cache job (the lower the number, the higher the priority). Set to `null` to inherit the default priority.
    //'refreshCacheJobPriority' => 10,

    // The priority to give driver jobs (the lower the number, the higher the priority). Set to `null` to inherit the default priority.
    //'driverJobPriority' => 100,

    // The time in seconds to wait for mutex locks to be released.
    //'mutexTimeout' => 1,

    // The paths to executable shell commands.
    //'commands' => [
    //    'git' => '/usr/bin/git',
    //],

    // The name of the JavaScript event that will trigger a script inject.
    //'injectScriptEvent' => 'DOMContentLoaded',
  ],
  'dev' => [
    'cachingEnabled' => false,
  ],
];
