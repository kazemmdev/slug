<?php

use Kazemmdev\Slug\Slug;
use function PHPUnit\Framework\assertEquals;

it('remove any underlines', function () {
    assertEquals(
        expected: 'sample-text',
        actual: Slug::handle('sample_text')
    );
});

it('replace none letter or digits by a dash', function () {
    assertEquals(
        expected: 'sample-text',
        actual: Slug::handle('sample text!!??')
    );
});

it('remove duplicate dashes', function () {
    assertEquals(
        expected: 'sample-text',
        actual: Slug::handle('sample--text')
    );
    assertEquals(
        expected: 'sample-text',
        actual: Slug::handle('sample---text')
    );
    assertEquals(
        expected: 'sample-text',
        actual: Slug::handle('sample-- -_text')
    );
});
it('lowercase any character if need', function () {
    assertEquals(
        expected: 'sample-text',
        actual: Slug::handle('SamPle-tExt')
    );
});
it('works in both rtl and ltr languages', function () {
    assertEquals(
        expected: 'sample-text',
        actual: Slug::handle('Sample text')
    );
    assertEquals(
        expected: 'عينة-النص',
        actual: Slug::handle('عينة النص')
    );
    assertEquals(
        expected: 'نمونه-متن',
        actual: Slug::handle('نمونه متن')
    );
});
it('remove phonetic arabic character', function () {
    assertEquals(
        expected: 'عينة-النص',
        actual: Slug::handle('عينةْ اًلنصٌ')
    );
});
it('can use different separator', function () {
    assertEquals(
        expected: 'sample+text',
        actual: Slug::handle('sample text', '+')
    );
});
