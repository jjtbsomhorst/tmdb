<?php

declare(strict_types=1);

namespace Kerox\Tmdb\Tests\Api;

use Kerox\Tmdb\Tmdb;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

class CompaniesTest extends TestCase
{
    protected Tmdb $tmdb;

    public function setUp(): void
    {
        $this->tmdb = new Tmdb(getenv('TMDB_API_TOKEN'), new Psr18Client());
    }

    public function testGetById()
    {
        $response = $this->tmdb->companies()->get(20);

        self::assertSame(200, $response->getStatusCode());
        self::assertNotEmpty($response->getBody()->getContents());
    }

    public function testGetAlternativeNameById()
    {
        $response = $this->tmdb->companies()->alternativeNames(20);

        self::assertSame(200, $response->getStatusCode());
        self::assertNotEmpty($response->getBody()->getContents());
    }

    public function testGetImagesById()
    {
        $response = $this->tmdb->companies()->images(20);

        self::assertSame(200, $response->getStatusCode());
        self::assertNotEmpty($response->getBody()->getContents());
    }
}