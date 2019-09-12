<?php
/**
 * Site URL Rules
 *
 * You can define custom site URL rules here, which Craft will check in addition
 * to any routes you’ve defined in Settings → Routes.
 *
 * See http://www.yiiframework.com/doc-2.0/guide-runtime-routing.html for more
 * info about URL rules.
 *
 * In addition to Yii’s supported syntaxes, Craft supports a shortcut syntax for
 * defining template routes:
 *
 *     'blog/archive/<year:\d{4}>' => ['template' => 'blog/_archive'],
 *
 * That example would match URIs such as `/blog/archive/2012`, and pass the
 * request along to the `blog/_archive` template, providing it a `year` variable
 * set to the value `2012`.
 */

return [
  'boards-commissions/related-to/<section>/<slug>' => ['template' => 'boards-commissions'],
  'boards-commissions/<slug>/meetings' => ['template' => 'boards-commissions/_meetings'],
  'documents/related-to/<section>/<slug>' => ['template' => 'documents'],
  'events/related-to/<section>/<slug>' => ['template' => 'events'],
  'meetings/related-to/<section>/<slug>' => ['template' => 'meetings'],
  'news/related-to/<section>/<slug>' => ['template' => 'news'],
  'projects/related-to/<section>/<slug>' => ['template' => 'projects'],
  'resources/related-to/<section>/<slug>' => ['template' => 'resources'],
  'services/related-to/<section>/<slug>' => ['template' => 'services'],
  'topics/related-to/<section>/<slug>' => ['template' => 'topics'],
  'api' => 'graphql/api'
];
