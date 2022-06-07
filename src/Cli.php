<?php

namespace Differ\Cli;

use Docopt;

function start(): string
{
    $doc = <<<DOC
    Generate diff
    
    Usage:
      gendiff.php (-h|--help)
      gendiff.php (-v|--version)
      gendiff.php [--format <fmt>] <firstFile> <secondFile>
    
    Options:
      -h --help                     Show this screen
      -v --version                  Show version
      --format <fmt>                Report format [default: stylish]
    DOC;

    $args = Docopt::handle($doc, ['version' => 'gendiff v: 0.0.1']);

}
