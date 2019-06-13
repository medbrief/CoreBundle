<?php

namespace MedBrief\CoreBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use \Twig\Extension\AbstractExtension;
use \Twig\TwigFunction;

/**
 * Class MedBriefEntityHelperExtension
 *
 * Registers a custom Twig function called get_entity_helper() which returns the Entity Helper object for the given
 * entity
 *
 * @package MedBrief\CoreBundle\Twig
 */
class MedBriefEntityHelperExtension extends AbstractExtension
{
	/**
	 * @var ContainerInterface
	 */
    protected $_serviceContainer;

	/**
	 * MedBriefEntityHelperExtension constructor.
	 *
	 * @param ContainerInterface $sc
	 */
    public function __construct(ContainerInterface $sc)
    {
        $this->_serviceContainer = $sc;
    }

    public function getFunctions()
    {
        return array(
            
            new TwigFunction('get_entity_helper', array($this, 'getEntityHelper')),
        );
    }

    /**
     * Returns th Entity Helper for a given entity
     *
     * @param $entity
     * @return mixed
     */
    public function getEntityHelper($entity){
        return $this->_serviceContainer->get('mb_core.entity_helper_factory')->getEntityHelper($entity);
    }
}