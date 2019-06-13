<?php

namespace MedBrief\CoreBundle\Form\Filter;

use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\TextFilterType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Lexik\Bundle\FormFilterBundle\Filter\FilterOperands;

/**
 * This is a generic search filter class which implements a text base search
 * filter on a 'search_index' field.  This Filter form can be used with any
 * QueryBuilder on an Entity that has a search_index field.
 */
class GeneralSearchIndexFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search_index', TextFilterType::class,
            array(
                // Making this filter perform a like '%term%' search
                'condition_pattern' => FilterOperands::STRING_CONTAINS,
                
                'label' => 'Search'
            )
        );
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }
}
