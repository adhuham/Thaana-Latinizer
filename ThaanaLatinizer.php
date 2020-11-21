<?php
/*
 * Thaana Latinizer - Converts Thaana characters into latin
 * 
 * Revised 2020
 *
 * @author     Mohamed Adhuham
 * @copyright  2016 (c) All rights reserved.
 * @license    Released under MIT License (http://opensource.org/licenses/mit-license.php)
*/

class ThaanaLatinizer
{
  
    private $thaanaAkuru        = array("ހ", "ށ", "ނ", "ރ", "ބ", "ޅ", "ކ", "އ", "ވ", "މ", "ފ", "ދ", "ތ", "ލ", "ގ", "ޏ", "ސ", "ޑ", "ޒ", "ޓ", "ޔ", "ޕ", "ޖ", "ޗ");
    
    private $thaanaThikiAkuru   = array("ޙ", "ޚ", "ޜ", "ޢ", "ޣ", "ޥ", "ޛ", "ޘ", "ޠ", "ޡ", "ޞ", "ޟ", "ޝ", "ޤ");
    
    private $thaanaPunctuations = array(")", "(", "؛", ":", "،", ".", "؟", "!");

    private $thaanaDiacritics   = array("ަ", "ާ", "ި", "ީ", "ު", "ޫ", "ެ", "ޭ", "ޮ", "ޯ", "އް", "ސް", "ން", "ތް", "ށް", "އައް", "އަށް");
    
    private $thaanaSenSuffix    = array("އެވެ");
    
    
    private $latinAkuru         = array("h", "sh", "n", "r", "b", "lh", "k", "", "v", "m", "f", "dh", "th", "l", "g", "y", "s", "d", "z", "t", "y", "p", "j", "ch");
    
    private $latinThikiAkuru    = array("h", "kh", "z", "", "gh", "v", "z", "s", "th", "z", "s", "z", "sh", "g");
    
    private $latinPunctuations  = array(")", "(", ";", ":", ",", ".", "?", "!");
    
    private $latinDiacritics    = array("a", "aa", "i", "ee", "u", "oo", "e", "ey", "o", "oa", "h", "s", "n", "iy", "h", " ah", " ah");
    
    private $latinSenSuffix     = array(" eve");
    
    private $charMap = array();
    
    
    public function __construct()
    {
        $this->buildMap();
    }
    

    public function latinize($str)
    {
        
        $latinized = strtr($str $this->buildMap());
        $latinized = $this->trimExtra($latinized);

        return $latinized;
    }
    
    private function buildMap()
    {
    
        // merge all of thaana and latin arrays into one single array
        $thaanaMerged = array_merge(
            $this->thaanaAkuru,
            $this->thaanaThikiAkuru,
            $this->thaanaPunctuations,
            $this->thaanaDiacritics,
            $this->thaanaSenSuffix
        );
    
        
        $latinMerged = array_merge(
            $this->latinAkuru,
            $this->latinThikiAkuru,
            $this->latinPunctuations,
            $this->latinDiacritics,
            $this->latinSenSuffix
        );

        
        $this->charMap = array_combine($thaanaMerged, $latinMerged);
    }
    
    private function trimExtra($str)
    {
        $removeMap = array_merge(
            $this->thaanaAkuru,
            $this->thaanaThikiAkuru,
            $this->thaanaDiacritics,
            $this->thaanaSenSuffix,
            array( "ް" )
        );
        
        return str_replace($removeMap, "", $str);
    }
}

