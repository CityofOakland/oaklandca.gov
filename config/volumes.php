<?php

return [
  'projects' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'projects'
  ],
  'headers' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'headers'
  ],
  'portraits' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'portraits'
  ],
  'news' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'news'
  ],
  'events' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'events'
  ],
  'data' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'data'
  ],
  'documents' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'documents'
  ],
  'seo' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'seo'
  ],
  'resources' => [
    'hasUrls' => true,
    'url' => getenv('S3_URL'),
    'bucket' => getenv('S3_BUCKET'),
    'region' => getenv('S3_REGION'),
    'subfolder' => 'resources'
  ],
];
