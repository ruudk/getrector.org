<?php

declare(strict_types=1);

namespace Rector\Website\GithubMagicLink\BodyFactory;

use Rector\Website\Demo\Entity\RectorRun;

/**
 * @see \Rector\Website\GithubMagicLink\Tests\BodyFactory\PullRequestDescriptionFactory\PullRequestDescriptionFactoryTest
 */
final class PullRequestDescriptionFactory
{
    public function create(RectorRun $rectorRun): string
    {
        $bodyLines = [];

        $bodyLines[] = '# Failing Test for ' . $rectorRun->getRectorShortClass();
        $bodyLines[] = 'Based on https://getrector.org/demo/' . $rectorRun->getId();

        $body = implode(PHP_EOL . PHP_EOL, $bodyLines);
        return $body . PHP_EOL;
    }
}
