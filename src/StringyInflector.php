<?php

namespace StringyInflector;

use Stringy\Stringy;

class StringyInflector extends Stringy
{
    /**
     *
     * Returns the string with the first letter of each word capitalized,
     * except for when the word is a name which shouldn't be capitalized.
     *
     * @return Stringy Object with $str capitalized
     */
    public function capitalizePersonalName()
    {
        $stringy = $this->collapseWhitespace();
        $stringy->str = $this->capitalizePersonalNameByDelimiter($stringy->str, ' ');
        $stringy->str = $this->capitalizePersonalNameByDelimiter($stringy->str, '-');
        return $stringy;
    }

    /**
     * @param string $word
     * @return string
     */
    private function capitalizeWord($word)
    {
        $encoding = $this->getEncoding();
        $firstCharacter = mb_substr($word, 0, 1, $encoding);
        $restOfWord = mb_substr($word, 1, null, $encoding);
        $firstCharacterUppercased = mb_strtoupper($firstCharacter, $encoding);
        return $firstCharacterUppercased . $restOfWord;
    }
    /**
     * @param string $names
     * @param string $delimiter
     * @return string
     */
    private function capitalizePersonalNameByDelimiter($names, $delimiter)
    {
        $names = explode($delimiter, $names);
        $encoding = $this->getEncoding();

        $specialCases = array(
            'names' => array(
                'ab',
                'af',
                'al',
                'and',
                'ap',
                'bint',
                'binte',
                'da',
                'de',
                'del',
                'den',
                'der',
                'di',
                'dit',
                'ibn',
                'la',
                'mac',
                'nic',
                'of',
                'ter',
                'the',
                'und',
                'van',
                'von',
                'y',
                'zu'
            ),
            'prefixes' => array(
                'al-',
                "d'",
                'ff',
                "l'",
                'mac',
                'mc',
                'nic'
            )
        );

        foreach ($names as $key => $name) {
            if (in_array($name, $specialCases['names'])) {
                continue;
            }
            $continue = false;
            if ($delimiter == '-') {
                foreach ($specialCases['names'] as $beginning) {
                    if (mb_strpos($name, $beginning, null, $encoding) === 0) {
                        $continue = true;
                    }
                }
            }
            foreach ($specialCases['prefixes'] as $beginning) {
                if (mb_strpos($name, $beginning, null, $encoding) === 0) {
                    $continue = true;
                }
            }
            if ($continue) {
                continue;
            }
            $names[$key] = $this->capitalizeWord($name);
        }
        $names = implode($delimiter, $names);
        return $names;
    }
}
