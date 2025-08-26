<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Service Categories
    |--------------------------------------------------------------------------
    |
    | Categorías para usar en filtros/menús. Mantengo el id "all" para la UI.
    |
    */

    'service_categories' => [
        ['id' => 'all',          'name' => 'All Services'],
        ['id' => 'drain',        'name' => 'Drain Services'],
        ['id' => 'installation', 'name' => 'Installation'],
        ['id' => 'repair',       'name' => 'Repair Services'],
        ['id' => 'emergency',    'name' => 'Emergency'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Services Catalog
    |--------------------------------------------------------------------------
    |
    | Catálogo de servicios. La clave "icon" ahora es un slug/string para que
    | el front elija el componente/clase apropiada (por ejemplo, Heroicons).
    |
    */

    'services' => [
        [
            'id' => 'drain-unclog',
            'slug' => 'drain-unclog',
            'category' => 'drain',
            'icon' => 'wrench-screwdriver', // antes: WrenchScrewdriverIcon
            'title' => 'Drain Unclog',
            'shortDescription' => 'Professional drain cleaning for all types of blockages',
            'fullDescription' => 'Our expert drain cleaning service handles everything from minor clogs to major blockages in kitchen sinks, bathroom drains, and main sewer lines. We use advanced equipment including drain snakes, hydro-jetting, and video inspection to identify and clear blockages efficiently.',
            'price' => 'Starting at $89',
            'duration' => '30-60 minutes',
            'warranty' => '90 days',
            'includes' => [
                'Complete drain inspection',
                'Professional drain cleaning',
                'Blockage removal',
                'Flow testing',
                'Prevention recommendations',
            ],
            'image' => 'https://images.pexels.com/photos/8293726/pexels-photo-8293726.jpeg?auto=compress&cs=tinysrgb&w=800',
        ],
        [
            'id' => 'p-trap-replacement',
            'category' => 'installation',
            'icon' => 'cog',
            'title' => 'P-Trap Replacement',
            'shortDescription' => 'Expert P-trap installation and repair for all sink configurations.',
            'fullDescription' => 'P-trap replacement and installation for all sink configurations. Our licensed plumbers ensure proper installation to prevent sewer gas leaks and maintain optimal drainage. We work with all standard and custom P-trap configurations.',
            'price' => 'Starting at $125',
            'duration' => '45-90 minutes',
            'warranty' => '1 year',
            'includes' => [
                'Old P-trap removal',
                'New P-trap installation',
                'Proper alignment check',
                'Leak testing',
                'Clean-up service',
                // “1-year warranty” se añadirá automáticamente si no está aquí
            ],
            'image' => 'https://images.pexels.com/photos/8293809/pexels-photo-8293809.jpeg?auto=compress&cs=tinysrgb&w=800',

            // 👇 NUEVO: problemas comunes (issue/description/solution)
            'issues' => [
                [
                    'issue' => 'Sewer Gas Odors',
                    'description' => 'Damaged P-trap allows sewer gases to enter your home',
                    'solution' => 'Complete P-trap replacement with proper sealing',
                ],
                [
                    'issue' => 'Persistent Leaks',
                    'description' => 'Cracked or loose P-trap connections causing water damage',
                    'solution' => 'Professional installation with quality materials',
                ],
                [
                    'issue' => 'Frequent Clogs',
                    'description' => 'Old or damaged P-trap collecting debris and causing blockages',
                    'solution' => 'Modern P-trap design for better flow and maintenance',
                ],
            ],

            // 👇 NUEVO: señales para reemplazar (“When to Replace…”)
            'replace_when' => [
                'Persistent sewer gas odors',
                'Visible cracks or damage',
                'Frequent leaks at connections',
                'Corrosion or mineral buildup',
                'During sink replacement',
                'Age over 10-15 years',
            ],
        ],

        [
            'id' => 'faucet-install',
            'slug' => 'faucet-installation',
            'category' => 'installation',
            'icon' => 'wrench-screwdriver', // antes: WrenchScrewdriverIcon
            'title' => 'Faucet Installation',
            'shortDescription' => 'Complete faucet installation and upgrade services',
            'fullDescription' => 'Professional faucet installation service for kitchen and bathroom faucets. We handle all types including single-handle, double-handle, pull-out, and touchless faucets. Service includes removal of old faucet, installation of new unit, and testing.',
            'price' => 'Starting at $150',
            'duration' => '60-120 minutes',
            'warranty' => '1 year',
            'includes' => [
                'Old faucet removal',
                'New faucet installation',
                'Water line connections',
                'Leak testing',
                'Operation demonstration',
            ],
            'image' => 'https://images.pexels.com/photos/6195125/pexels-photo-6195125.jpeg?auto=compress&cs=tinysrgb&w=800',
        ],
        [
            'id' => 'leak-repair',
            'slug' => 'leak-repair',
            'category' => 'repair',
            'icon' => 'shield-check', // antes: ShieldCheckIcon
            'title' => 'Leak Repair',
            'shortDescription' => 'Fast leak detection and repair to prevent water damage',
            'fullDescription' => 'Comprehensive leak detection and repair service using advanced equipment to locate and fix leaks quickly. We handle pipe leaks, joint leaks, fixture leaks, and hidden leaks behind walls or under slabs.',
            'price' => 'Starting at $95',
            'duration' => '30-180 minutes',
            'warranty' => '1 year',
            'includes' => [
                'Leak detection service',
                'Damage assessment',
                'Professional repair',
                'Pressure testing',
                'Prevention advice',
            ],
            'image' => 'https://images.pexels.com/photos/8447817/pexels-photo-8447817.jpeg?auto=compress&cs=tinysrgb&w=800',
        ],
        [
            'id' => 'toilet-seal',
            'slug' => 'toilet-seal-change',
            'category' => 'repair',
            'icon' => 'cog', // antes: CogIcon
            'title' => 'Toilet Seal Change',
            'shortDescription' => 'Professional toilet seal replacement and maintenance',
            'fullDescription' => 'Complete toilet seal replacement service including wax ring replacement, flange repair, and toilet reinstallation. We ensure proper sealing to prevent leaks and odors while maintaining optimal toilet function.',
            'price' => 'Starting at $110',
            'duration' => '60-90 minutes',
            'warranty' => '1 year',
            'includes' => [
                'Toilet removal',
                'Old seal removal',
                'New wax ring installation',
                'Toilet reinstallation',
                'Leak testing',
            ],
            'image' => 'https://images.pexels.com/photos/6195125/pexels-photo-6195125.jpeg?auto=compress&cs=tinysrgb&w=800',
        ],
        [
            'id' => 'garbage-disposal',
            'slug' => 'garbage-disposal-installation',
            'category' => 'installation',
            'icon' => 'wrench-screwdriver', // antes: WrenchScrewdriverIcon
            'title' => 'Garbage Disposal Installation',
            'shortDescription' => 'Complete garbage disposal installation and setup',
            'fullDescription' => 'Professional garbage disposal installation service including electrical connections, plumbing connections, and proper mounting. We install all major brands and provide operation instructions and maintenance tips.',
            'price' => 'Starting at $175',
            'duration' => '90-120 minutes',
            'warranty' => '1 year',
            'includes' => [
                'Old unit removal (if applicable)',
                'New disposal installation',
                'Electrical connections',
                'Plumbing connections',
                'Operation demonstration',
            ],
            'image' => 'https://images.pexels.com/photos/8293726/pexels-photo-8293726.jpeg?auto=compress&cs=tinysrgb&w=800',
        ],
    ],

];
