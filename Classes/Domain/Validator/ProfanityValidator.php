<?php

declare(strict_types=1);

namespace ChaptedTeam\Chapted\Domain\Validator;

use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

class ProfanityValidator extends AbstractValidator
{
    protected function isValid(mixed $value): void
    {
        // @todo Schimpfwörter Filter
    }
}
