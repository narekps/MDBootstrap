<?php

namespace MDBootstrap;

use MDBootstrap\View\Helper\Navigation as NavigationHelper;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Module
 *
 * @package MDBootstrap
 */
class Module
{
    /**
     * @param \Zend\Mvc\MvcEvent $e
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $sm = $application->getServiceManager();

        $this->initNavigationHelpers($sm);
    }

    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $sm
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private function initNavigationHelpers(ServiceLocatorInterface $sm)
    {
        /** @var \Zend\View\Helper\Navigation\PluginManager $pm */
        $pm = $sm->get('ViewHelperManager')->get('Navigation')->getPluginManager();
        $pm->setAlias('MDBNavbar', NavigationHelper\Navbar::class);
        $pm->setFactory(NavigationHelper\Navbar::class, InvokableFactory::class);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
