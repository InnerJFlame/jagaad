<?php

declare(strict_types=1);

$excludes = [
    'vendor',
];

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude($excludes);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP70Migration' => true,
        '@PHP70Migration:risky' => true,
        '@PHP71Migration' => true,
        '@PHP71Migration:risky' => true,
        '@PHP73Migration' => true,
        '@PHPUnit60Migration:risky' => true,
        '@PHPUnit75Migration:risky' => true,
        'concat_space' => ['spacing' => 'one'],
        'binary_operator_spaces' => [
            'default' => 'single_space',
            'operators' => [
                '=>' => 'align_single_space_minimal',
                '=' => null,
            ]
        ],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'no_superfluous_phpdoc_tags' => false,
        'yoda_style' => false,
        'phpdoc_order' => false,
        'is_null' => false,
        'php_unit_fqcn_annotation' => false,
        'native_function_invocation' => false,
    ])
    ->setFinder($finder);
