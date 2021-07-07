<?php

$header = <<<EOF
@project Castor Psr Io
@link https://github.com/castor-labs/psr-io
@package castor/psr-io
@author Matias Navarro-Carter mnavarrocarter@gmail.com
@license MIT
@copyright 2021 CastorLabs Ltd

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        'declare_strict_types' => true,
        'header_comment' => ['header' => $header, 'comment_type' => 'PHPDoc'],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__.'/src')
            ->in(__DIR__.'/tests')
    )
;
