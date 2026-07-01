<?php

namespace App\Models;

use App\Database;

class Page
{
    public function __construct(
        public int $id,
        public string $title,
        public string $slug,
        public string $body,
    ) {
    }

    /**
     * Fetch all pages.
     *
     * @return Page[]
     */
    public static function all(): array
    {
        $rows = Database::connect()
            ->query('SELECT * FROM pages ORDER BY id')
            ->fetchAll();

        return array_map(fn (array $row) => self::fromRow($row), $rows);
    }

    /**
     * Fetch one page by its slug, or null if not found.
     */
    public static function findBySlug(string $slug): ?Page
    {
        $stmt = Database::connect()->prepare('SELECT * FROM pages WHERE slug = ?');
        $stmt->execute([$slug]);          // value passed separately = injection-safe
        $row = $stmt->fetch();

        return $row ? self::fromRow($row) : null;
    }

    /**
     * Build a Page object from a DB row.
     *
     * @param array<string, mixed> $row
     */
    private static function fromRow(array $row): Page
    {
        return new self(
            (int) $row['id'],
            $row['title'],
            $row['slug'],
            $row['body'],
        );
    }
}
