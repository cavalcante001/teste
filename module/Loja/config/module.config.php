<?php
return [
    'service_manager' => [
        'factories' => [
            \Loja\V1\Rest\Cliente\ClienteResource::class => \Loja\V1\Rest\Cliente\ClienteResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'loja.rest.cliente' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/cliente[/:cliente_id]',
                    'defaults' => [
                        'controller' => 'Loja\\V1\\Rest\\Cliente\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'loja.rest.cliente',
        ],
    ],
    'zf-rest' => [
        'Loja\\V1\\Rest\\Cliente\\Controller' => [
            'listener' => \Loja\V1\Rest\Cliente\ClienteResource::class,
            'route_name' => 'loja.rest.cliente',
            'route_identifier_name' => 'cliente_id',
            'collection_name' => 'cliente',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Loja\V1\Rest\Cliente\ClienteEntity::class,
            'collection_class' => \Loja\V1\Rest\Cliente\ClienteCollection::class,
            'service_name' => 'Cliente',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Loja\\V1\\Rest\\Cliente\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Loja\\V1\\Rest\\Cliente\\Controller' => [
                0 => 'application/vnd.loja.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Loja\\V1\\Rest\\Cliente\\Controller' => [
                0 => 'application/vnd.loja.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Loja\V1\Rest\Cliente\ClienteEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'loja.rest.cliente',
                'route_identifier_name' => 'cliente_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Loja\V1\Rest\Cliente\ClienteCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'loja.rest.cliente',
                'route_identifier_name' => 'cliente_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'Loja\\V1\\Rest\\Cliente\\Controller' => [
            'input_filter' => 'Loja\\V1\\Rest\\Cliente\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Loja\\V1\\Rest\\Cliente\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\NotEmpty::class,
                        'options' => [],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'nome',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\EmailAddress::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'email',
            ],
        ],
    ],
];
