<?php
class Kwf_Assets_Dependency_Filter_BabelJs
{
    public static function build($sourceFile)
    {
        $babel = getcwd()."/".VENDOR_PATH."/bin/node ".dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/node_modules/babel-cli/bin/babel.js';
        $cmd = "$babel ";
        $cmd .= "--minified ";
        $cmd .= "--no-babelrc ";
        $cmd .= "--source-maps inline ";
        $cmd .= "--presets es2015 ";
        $cmd .= "--plugins transform-runtime ";
        $cmd .= escapeshellarg($sourceFile);
        $cmd .= " 2>&1";
        $out = array();
        putenv("NODE_PATH=".getcwd()."/".KWF_PATH."/node_modules".PATH_SEPARATOR.getcwd()."/".KWF_PATH);
        exec($cmd, $out, $retVal);
        putenv("NODE_PATH=");

        if ($retVal) {
            throw new Kwf_Exception("babel failed: ".implode("\n", $out));
        }
        $contents = implode("\n", $out);
        return Kwf_SourceMaps_SourceMap::createFromInline($contents);
    }
}
