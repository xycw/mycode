<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/2/26
 * Time: 上午10:08
 */
$farr = array(
    "/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU",
    "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
    "/select\b|insert\b|update\b|delete\b|drop\b|database\b|and\b|or\b|like\b|;|\"|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|dump/is"
);
$str = preg_replace($farr,'','123');
echo $str;
$str = strip_tags($str);

echo "Hello <b>world!</b>";