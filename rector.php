<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
//        __DIR__ . '/src'
    ]);
    $parameters->set(Option::PHP_VERSION_FEATURES,  \Rector\Core\ValueObject\PhpVersion::PHP_73);


    // Define what rule sets will be applied
    $containerConfigurator->import(SetList::PHP_73);



    // get services (needed for register a single rule)
     $services = $containerConfigurator->services();

    // register a single rule
    $services->set(\Rector\TypeDeclaration\Rector\FunctionLike\ReturnTypeDeclarationRector::class);
//     $services->set(TypehintR::class);
};
