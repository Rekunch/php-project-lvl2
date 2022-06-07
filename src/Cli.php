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

    $result = Docopt::handle($doc, array('version' => '0.0.1'));
    $diff = genDiff($result->args["<firstFile>"], $result->args["<secondFile>"], $result->args["--format"]);
    echo $diff;
    echo "\n";
}
