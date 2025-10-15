<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        '@PHP84Migration' => true,
        
        // Import statements
        'ordered_imports' => [
            'imports_order' => ['class', 'function', 'const'],
            'sort_algorithm' => 'alpha'
        ],
        'no_unused_imports' => true,
        'single_import_per_statement' => true,
        'group_import' => false,
        
        // Arrays
        'array_syntax' => ['syntax' => 'short'],
        'trailing_comma_in_multiline' => [
            'elements' => ['arrays', 'arguments', 'parameters']
        ],
        'whitespace_after_comma_in_array' => true,
        
        // Strings
        'single_quote' => true,
        'string_implicit_backslashes' => true,
        
        // Type hints
        'declare_strict_types' => true,
        'types_spaces' => ['space' => 'none'],
        'return_type_declaration' => ['space_before' => 'none'],
        
        // Classes
        'class_attributes_separation' => [
            'elements' => [
                'const' => 'one',
                'method' => 'one',
                'property' => 'one',
            ]
        ],
        'final_class' => false, // We use final explicitly where needed
        'visibility_required' => ['elements' => ['property', 'method', 'const']],
        
        // Functions
        'function_declaration' => ['closure_function_spacing' => 'one'],
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => false,
        ],
        
        // Control structures
        'no_superfluous_elseif' => true,
        'no_useless_else' => true,
        'simplified_if_return' => true,
        
        // PHPDoc
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_indent' => true,
        'phpdoc_no_empty_return' => true,
        'phpdoc_order' => true,
        'phpdoc_scalar' => true,
        'phpdoc_separation' => false,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_summary' => false,
        'phpdoc_trim' => true,
        'phpdoc_types' => true,
        'phpdoc_var_without_name' => true,
        
        // Whitespace
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_statement' => [
            'statements' => ['return', 'throw', 'try']
        ],
        'method_chaining_indentation' => true,
        'no_extra_blank_lines' => [
            'tokens' => [
                'extra',
                'throw',
                'use',
                'use_trait',
            ]
        ],
        'no_spaces_around_offset' => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_whitespace_in_blank_line' => true,
        
        // Operators
        'binary_operator_spaces' => ['default' => 'single_space'],
        'concat_space' => ['spacing' => 'one'],
        'not_operator_with_successor_space' => true,
        'operator_linebreak' => ['only_booleans' => true],
        
        // Casts
        'cast_spaces' => ['space' => 'none'],
        'lowercase_cast' => true,
        'short_scalar_cast' => true,
        
        // Miscellaneous
        'no_alternative_syntax' => true,
        'no_trailing_comma_in_singleline' => true,
        'no_unneeded_braces' => true,
        'no_useless_return' => true,
        'semicolon_after_instruction' => true,
        'single_line_comment_style' => ['comment_types' => ['hash']],
        'ternary_operator_spaces' => true,
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache');
