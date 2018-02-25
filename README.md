# MDBootstrap

MDBootstrap module for Zend Framework

##Navbar helper

Navigation config:

````php
return [
    'navigation'      => [
        'default' => [
            [
                'label' => 'Home',
                'route' => 'home',
                'class' => 'nav-item', // applied to <li> element
            ],
            [
                'label' => 'About',
                'route' => 'about',
                'class' => 'nav-item',
            ],
        ],
        // other menues
    ],
    'service_manager' => [
        'factories' => [
            'navigation'         => \Zend\Navigation\Service\DefaultNavigationFactory::class,
            'abstract_factories' => [
                \Zend\Navigation\Service\NavigationAbstractServiceFactory::class,
            ],
        ],
    ],
];
````
Render navbar:

````php
$menu = $this->navigation('Zend\Navigation\Default')->MDBNavbar();
$menu->setClassToAItem('nav-link') // applied to <a> element
      ->setUlClass('navbar-nav mr-auto')
      ->setAddClassToListItem(true)
      ->setLiActiveClass('active');
````
