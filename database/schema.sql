CREATE DATABASE IF NOT EXISTS cms
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE cms;

CREATE TABLE IF NOT EXISTS pages (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title      VARCHAR(255) NOT NULL,
    slug       VARCHAR(255) NOT NULL UNIQUE,
    body       TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pages (title, slug, body) VALUES
    ('Home',    'home',    'Welcome to our website.'),
    ('About',   'about',   'We are a small company.'),
    ('Contact', 'contact', 'Reach us at hello@example.com.')
ON DUPLICATE KEY UPDATE title = VALUES(title);
