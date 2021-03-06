<?php

declare(strict_types=1);

namespace Rector\Website\GithubMagicLink\Tests\BodyFactory\PullRequestDescriptionFactory;

use Rector\Website\Demo\Tests\Helpers\DummyRectorRunFactory;
use Rector\Website\GetRectorKernel;
use Rector\Website\GithubMagicLink\BodyFactory\PullRequestDescriptionFactory;
use Symplify\PackageBuilder\Testing\AbstractKernelTestCase;

final class PullRequestDescriptionFactoryTest extends AbstractKernelTestCase
{
    private PullRequestDescriptionFactory $pullRequestDescriptionFactory;

    private DummyRectorRunFactory $dummyRectorRunFactory;

    protected function setUp(): void
    {
        $this->bootKernel(GetRectorKernel::class);
        $this->pullRequestDescriptionFactory = $this->getService(PullRequestDescriptionFactory::class);
        $this->dummyRectorRunFactory = new DummyRectorRunFactory();
    }

    public function test(): void
    {
        $rectorRun = $this->dummyRectorRunFactory->create();
        $pullRequestDescription = $this->pullRequestDescriptionFactory->create($rectorRun);

        $this->assertStringMatchesFormatFile(
            __DIR__ . '/Fixture/expected_pull_request_description.txt',
            $pullRequestDescription
        );
    }
}
