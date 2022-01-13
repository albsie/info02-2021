<?php

return array(
    'home' => [
      'path' => 'src/pages/guest/home.php',
      'auth' => false,
      'role' => 0
      ],
      'contact' => [
        'path' => 'src/pages/guest/contact.php',
        'auth' => false,
        'role' => 0
        ],
    'signup' => [
      'path' => 'src/pages/auth/signup.php',
      'auth' => false,
      'role' => 0
      ],
    'signin' => [
      'path' => 'src/pages/auth/signin.php',
      'auth' => false,
      'role' => 0
      ],
    'signout' => [
      'path' => 'src/pages/auth/signout.php',
      'auth' => true,
      'role' => 1
      ],
        // must be the last inserd
    'errorPage' => [
      'path' => 'src/pages/error.php',
      'auth' => false,
      'role' => 0
      ]
);
