<?php
$file = "test.csv";
function analyse_file($file, $capture_limit_in_kb = 10) {
    // capture starting memory usage
    $output['peak_mem']['start']    = memory_get_peak_usage(true);

    // log the limit how much of the file was sampled (in Kb)
    $output['read_kb']                 = $capture_limit_in_kb;
    
    // read in file
    $fh = fopen($file, 'r');
        $contents = fread($fh, ($capture_limit_in_kb * 1024)); // in KB
    fclose($fh);
    
    // specify allowed field delimiters
    $delimiters = array(
        'comma'     => ',',
        'semicolon' => ';',
        'tab'         => "\t",
        'pipe'         => '|',
        'colon'     => ':'
    );
    
    // specify allowed line endings
    $line_endings = array(
        'rn'         => "\r\n",
        'n'         => "\n",
        'r'         => "\r",
        'nr'         => "\n\r"
    );
    
    // loop and count each line ending instance
    foreach ($line_endings as $key => $value) {
        $line_result[$key] = substr_count($contents, $value);
    }
    
    // sort by largest array value
    asort($line_result);
    
    // log to output array
    $output['line_ending']['results']     = $line_result;
    $output['line_ending']['count']     = end($line_result);
    $output['line_ending']['key']         = key($line_result);
    $output['line_ending']['value']     = $line_endings[$output['line_ending']['key']];
    $lines = explode($output['line_ending']['value'], $contents);
    
    // remove last line of array, as this maybe incomplete?
    array_pop($lines);
    
    // create a string from the legal lines
    $complete_lines = implode(' ', $lines);
    
    // log statistics to output array
    $output['lines']['count']     = count($lines);
    $output['lines']['length']     = strlen($complete_lines);
    
    // loop and count each delimiter instance
    foreach ($delimiters as $delimiter_key => $delimiter) {
        $delimiter_result[$delimiter_key] = substr_count($complete_lines, $delimiter);
    }
    
    // sort by largest array value
    asort($delimiter_result);
    
    // log statistics to output array with largest counts as the value
    $output['delimiter']['results']     = $delimiter_result;
    $output['delimiter']['count']         = end($delimiter_result);
    $output['delimiter']['key']         = key($delimiter_result);
    $output['delimiter']['value']         = $delimiters[$output['delimiter']['key']];
    
    // capture ending memory usage
    $output['peak_mem']['end'] = memory_get_peak_usage(true);
    return $output;
}
?>

