<?php
// https://imager-x.spacecat.ninja/usage/named-transforms.html#named-transforms
return [
  'heroImage' => [
    'displayName' => 'Hero Image',
    'transforms' => [
      ['width' => 600],
      ['width' => 1800],
    ],
    'defaults' => [
      'ratio' => 16 / 9,
      'jpegQuality' => 80
    ],
    'configOverrides' => [
      'fillTransforms' => true,
      'fillInterval' => 300,
    ]
  ],
  'listThumbnail' => [
    'displayName' => 'List Thumbnail',
    'transforms' => [
      ['width' => 200],
      ['width' => 400],
      ['width' => 600],
    ],
    'defaults' => [
      'ratio' => 4 / 3,
      'format' => 'jpg'
    ]
  ]
];
